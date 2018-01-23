<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property integer $id
 * @property string $name
 * @property string $avatar
 * @property string $img_url
 * @property integer $sorts
 * @property integer $start_at
 * @property integer $end_at
 * @property integer $status
 * @property integer $modified_at
 * @property integer $created_at
 */
class Banners extends \yii\db\ActiveRecord
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['sorts', 'start_at', 'end_at', 'status', 'modified_at', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['avatar', 'img_url','title','subtitle'], 'string', 'max' => 256],
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
            'title' => Yii::t('app', 'Title'),
            'subtitle' => Yii::t('app', 'Subtitle'),
            'avatar' => Yii::t('app', 'Avatar'),
            'img_url' => Yii::t('app', 'Img Url'),
            'sorts' => Yii::t('app', 'Sorts'),
            'start_at' => Yii::t('app', 'Start At'),
            'end_at' => Yii::t('app', 'End At'),
            'status' => Yii::t('app', 'Status'),
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
     * @return BannersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BannersQuery(get_called_class());
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
