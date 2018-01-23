<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course_schedule".
 *
 * @property integer $id
 * @property integer $course_id
 * @property integer $sorts
 * @property integer $status
 * @property integer $start_at
 * @property integer $end_at
 * @property integer $modified_at
 * @property integer $created_at
 */
class CourseSchedule extends \yii\db\ActiveRecord
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'sorts', 'status', 'start_at', 'end_at', 'modified_at', 'created_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'sorts' => Yii::t('app', 'Sorts'),
            'status' => Yii::t('app', 'Status'),
            'start_at' => Yii::t('app', 'Start At'),
            'end_at' => Yii::t('app', 'End At'),
            'modified_at' => Yii::t('app', 'Modified At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    public function beforeValidate(){
        if($this->start_at){
            if( !(( is_numeric($this->start_at) && (int)$this->start_at == $this->start_at )) ){
                $this->start_at = strtotime($this->start_at);
            }
        }
        if($this->end_at){
            if( !(( is_numeric($this->end_at) && (int)$this->end_at == $this->end_at )) ){
                $this->end_at = strtotime($this->end_at);
            }
        }
        return true;
    }

    public function beforeSave($insert)
    {
        if($insert){
            $this->created_at = time();
        }

        $this->modified_at = time();
        //strtotime();  format time to unix time
        return true;
    }

    /**
     * @inheritdoc
     * @return CourseScheduleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CourseScheduleQuery(get_called_class());
    }

    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'course_id']);
    }

    public function getStartAtString()
    {
        return ($this->start_at)? Yii::$app->formatter->asDate($this->start_at, 'php:Y/m/d H:i') : '';
    }

    public function getEndAtString()
    {
        return ($this->end_at)? Yii::$app->formatter->asDate($this->end_at, 'php:Y/m/d H:i') : '';
    }

    public static function getStatusesList()
    {
        return [
            self::STATUS_BLOCKED => Yii::t('app', 'inactive'),
            self::STATUS_ACTIVE => Yii::t('app', 'active'),
        ];
    }

    public function getStatusLabel()
    {
        return static::getStatusesList()[$this->status];
    }

    public static function getThisWeekCourse($limit=5)
    {
        $day = date('w');
        $week_start = strtotime( date('Y-m-d', strtotime('-'.$day.' days')) );
        $week_end = strtotime( date('Y-m-d', strtotime('+'.(6-$day).' days')) );
        $query = CourseSchedule::find();
        $query->where(['>', 'start_at', $week_start])->andWhere(['<=', 'start_at', $week_end]);
        // $query->joinWith('course');
        return $query->limit($limit)->active()->all();
    }
}
