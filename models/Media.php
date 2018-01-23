<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "media".
 *
 * @property integer $id
 * @property integer $target_id
 * @property integer $category
 * @property string $title
 * @property string $avatar_url
 * @property string $thumb_url
 * @property string $image_url
 * @property integer $sorts
 * @property integer $status
 * @property integer $modified_at
 * @property integer $created_at
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['target_id', 'category_id', 'sorts', 'status', 'modified_at', 'created_at'], 'integer'],
            [['title'], 'required'],
            [['title'], 'string', 'max' => 128],
            [['avatar_url', 'thumb_url', 'image_url'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'target_id' => Yii::t('app', 'Target ID'),
            'category_id' => Yii::t('app', 'Category'),
            'title' => Yii::t('app', 'Title'),
            'avatar_url' => Yii::t('app', 'Avatar Url'),
            'thumb_url' => Yii::t('app', 'Thumb Url'),
            'image_url' => Yii::t('app', 'Image Url'),
            'sorts' => Yii::t('app', 'Sorts'),
            'status' => Yii::t('app', 'Status'),
            'modified_at' => Yii::t('app', 'Modified At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
    public function beforeValidate($insert)
    {
        if($insert){
            if(!$this->title){
                $this->title = 'image title';
            }
        }
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
     * @return MediaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MediaQuery(get_called_class());
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
