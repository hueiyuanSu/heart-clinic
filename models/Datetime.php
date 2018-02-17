<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property integer $id
 * @property integer $time
 * @property integer $disease
 * @property integer $weekays
 */
class Datetime extends \yii\db\ActiveRecord
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datetime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date','time','is_selected','disease_id'], 'integer'],
            [['weekdays'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app','Date'),
            'time' => Yii::t('app','Time'),
            'weekdays' => Yii::t('app','Weekdays'),
            'is_selected' => Yii::t('app','Is Selected'),
            'disease_id' => Yii::t('app','Disease ID'),
        ];
    }

    // public function beforeSave($insert)
    // {
    //     if($insert){
    //         $this->create_date = time();
    //     }
    //     $this->update_date = time();
    //     //strtotime();  format time to unix time
    //     return true;
    // }

    public function getDisease(){
        return $this->hasMany(Disease::className(), ['id' => 'disease_id']);
    }



}
