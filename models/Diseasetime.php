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
class Diseasetime extends \yii\db\ActiveRecord
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diseasetime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['disease','weekdays'], 'integer'],
            [['time'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'time' => Yii::t('app','Time'),
            'disease' => Yii::t('app','Disease'),
            'weekdays' => Yii::t('app','Weekdays'),
        ];
    }

    public function getTime()
    {
         // Initialize it from 'quant' attribute
         if($this->time == null)
         {
               $this->time= explode(',', $this->time);
         }
         return $this->time;
    }

    public function setTime($value)
    {
         $this->time= $value;
    }



    // public function beforeValidate(){
    //     if(!is_numeric($this->reserve_date)){
    //         $this->reserve_date = strtotime($this->reserve_date);
    //     }
    //     if(!is_numeric($this->reserve_time)){
    //         $this->reserve_time = strtotime($this->reserve_time);
    //     }
    //     if(!$this->reserve_number){
    //         $this->reserve_number = time();
    //     }
    //     if(!$this->reserve_date && !$this->reserve_time){
    //         return false;
    //     }
    //     return true;
    // }
    // public function afterFind(){
    //     $this->reserve_date = Yii::$app->formatter->asTime($this->reserve_date, 'php:Y-m-d');
    //     $this->reserve_time = Yii::$app->formatter->asTime($this->reserve_time, 'php:H:i');
    //     return true;
    // }

    // public function beforeSave($insert)
    // {
    //     if($insert){
    //         $this->create_date = time();
    //     }
    //     $this->update_date = time();
    //     //strtotime();  format time to unix time
    //     return true;
    // }


    /**
     * @inheritdoc
     * @return BannersQuery the active query used by this AR class.
     */
}
