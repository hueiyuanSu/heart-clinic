<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property integer $id
 * @property string $category
 * @property string $content
 */
class Staticpage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staticpage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['version'],'integer'],
            [['category'], 'string', 'max' => 128],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app','Category'),
            'content' => Yii::t('app','Content'),
            'version' => Yii::t('app','Version'),
        ];
    }

    public function beforeSave($insert)
    {
        //strtotime();  format time to unix time
        return true;
    }

}
