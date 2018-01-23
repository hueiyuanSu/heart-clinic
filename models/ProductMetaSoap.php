<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_meta_soap".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $bg_image
 * @property string $useage
 * @property string $weight
 * @property string $suitable
 * @property string $ingredient
 * @property string $expiration
 * @property string $warnings
 */
class ProductMetaSoap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_meta_soap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['useage', 'expiration', 'warnings'], 'string'],
            [['bg_image', 'weight', 'ingredient'], 'string', 'max' => 256],
            [['suitable'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'bg_image' => Yii::t('app', 'Bg Image'),
            'useage' => Yii::t('app', 'Useage'),
            'weight' => Yii::t('app', 'Weight'),
            'suitable' => Yii::t('app', 'Suitable'),
            'ingredient' => Yii::t('app', 'Ingredient'),
            'expiration' => Yii::t('app', 'Expiration'),
            'warnings' => Yii::t('app', 'Warnings'),
        ];
    }
}
