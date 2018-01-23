<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category
 * @property string $description
 * @property string $keyword
 * @property string $content
 * @property integer $sorts
 * @property integer $status
 * @property string $avatar
 * @property string $bg_image
 * @property integer $modified_at
 * @property integer $created_at
 */
class News extends \yii\db\ActiveRecord
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['category_id', 'sorts', 'status', 'modified_at', 'created_at'], 'integer'],
            [['description', 'content'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['keyword','avatar','bg_image'], 'string', 'max' => 256],
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
            'content' => Yii::t('app', 'Content'),
            'sorts' => Yii::t('app', 'Sorts'),
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
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public function getMetaEvent()
    {
        return $this->hasOne(NewsMetaEvent::className(), ['news_id' => 'id']);
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
