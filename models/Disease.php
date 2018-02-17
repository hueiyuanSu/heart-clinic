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
class Disease extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disease';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
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



}
