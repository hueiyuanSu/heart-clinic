<?php

namespace app\models;
use app\models\CourseSchedule;
use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category
 * @property string $description
 * @property string $keyword
 * @property string $features
 * @property string $content
 * @property integer $sorts
 * @property integer $price
 * @property integer $status
 * @property string $avatar
 * @property string $bg_image
 * @property integer $modified_at
 * @property integer $created_at
 */
class Courses extends \yii\db\ActiveRecord
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['category_id', 'sorts', 'price', 'status', 'modified_at', 'created_at'], 'integer'],
            [['description', 'content'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['keyword', 'features','avatar','bg_image'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'category_id' => Yii::t('app', 'Category'),
            'description' => Yii::t('app', 'Description'),
            'keyword' => Yii::t('app', 'Keyword'),
            'features' => Yii::t('app', 'Features'),
            'content' => Yii::t('app', 'Content'),
            'sorts' => Yii::t('app', 'Sorts'),
            'price' => Yii::t('app', 'Price'),
            'status' => Yii::t('app', 'Status'),
            'avatar' => Yii::t('app', 'Avatar'),
            'bg_image' => Yii::t('app', 'Background Image'),
            'modified_at' => Yii::t('app', 'Modified At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
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
     * @return CategoyMetaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CoursesQuery(get_called_class());
    }
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public function getSchedules()
    {
        return $this->hasMany(CourseSchedule::className(), ['course_id' => 'id']);
    }
    public function getActiveSchedules()
    {
        return $this->hasMany(CourseSchedule::className(), ['course_id' => 'id'])->where(['status'=>1]);
    }

    public function getComingSchedule()
    {
        // return $this->hasOne(CourseSchedule::className(), ['course_id' => 'id'])->where(['status'=>1])->andWhere(['>=', 'start_at', time()])->orderby('start_at ASC');

        return CourseSchedule::find()->where(['status'=>1,'course_id'=>$this->id])->andWhere(['>=', 'start_at', time()])->orderby('start_at ASC')->one();
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
}
