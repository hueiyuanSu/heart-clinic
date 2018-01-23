<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property integer $id
 * @property integer $reserve_number
 * @property string $patient_name
 * @property string $patient_phone
 * @property integer $reserve_date
 * @property integer $reserve_time
 * @property integer $create_date
 * @property integer $update_date
 * @property string $remark
 */
class Reserve extends \yii\db\ActiveRecord
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserve';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_name','patient_phone'], 'required'],
            [['reserve_number', 'reserve_date','reserve_time', 'create_date', 'update_date'], 'integer'],
            [['disease'], 'string', 'max' => 128],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'patient_name' => Yii::t('app','Patient Name'),
            'patient_phone' => Yii::t('app','Patient Phone'),
            'reserve_number' => Yii::t('app','Reserve Number'),
            'reserve_date' => Yii::t('app','Reserve Date'),
            'reserve_time' => Yii::t('app','Reserve Time'),
            'create_at' => Yii::t('app','Create At'),
            'update_at' => Yii::t('app','Update At'),
            'remark' => Yii::t('app','Remark'),
            'disease' => Yii::t('app','Disease'),
        ];
    }

    public function beforeValidate(){
        if(!is_numeric($this->reserve_date)){
            $this->reserve_date = strtotime($this->reserve_date);
        }
        if(!is_numeric($this->reserve_time)){
            $this->reserve_time = strtotime($this->reserve_time);
        }
        if(!$this->reserve_number){
            $this->reserve_number = time();
        }
        if($this->reserve_date && $this->reserve_time){
            return false;
        }
        return true;
    }
    public function afterFind(){
        $this->reserve_date = Yii::$app->formatter->asTime($this->reserve_date, 'php:Y-m-d');
        $this->reserve_time = Yii::$app->formatter->asTime($this->reserve_time, 'php:H:i');
        return true;
    }

    public function beforeSave($insert)
    {
        if($insert){
            $this->create_date = time();
        }
        $this->update_date = time();
        //strtotime();  format time to unix time
        return true;
    }


    /**
     * @inheritdoc
     * @return BannersQuery the active query used by this AR class.
     */
}
