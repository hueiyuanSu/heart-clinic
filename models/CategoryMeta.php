<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_meta".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $sub_name
 * @property string $avatar
 * @property string $description
 * @property string $content
 */
class CategoryMeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['description', 'content'], 'string'],
            [['sub_name'], 'string', 'max' => 128],
            [['avatar'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'sub_name' => Yii::t('app', 'Sub Name'),
            'avatar' => Yii::t('app', 'Avatar'),
            'description' => Yii::t('app', 'Description'),
            'content' => Yii::t('app', 'Content'),
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
