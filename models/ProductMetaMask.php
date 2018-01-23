<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_meta_mask".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $purpose
 * @property string $bg_image
 * @property string $capacity
 * @property string $useage
 * @property string $region
 * @property string $ingredient
 * @property string $madeoff
 * @property string $expiration
 * @property string $warnings
 */
class ProductMetaMask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_meta_mask';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['useage', 'warnings'], 'string'],
            [['purpose', 'bg_image', 'ingredient', 'madeoff'], 'string', 'max' => 256],
            [['capacity'], 'string', 'max' => 32],
            [['region', 'expiration'], 'string', 'max' => 128],
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
            'purpose' => Yii::t('app', 'Purpose'),
            'bg_image' => Yii::t('app', 'Bg Image'),
            'capacity' => Yii::t('app', 'Capacity'),
            'useage' => Yii::t('app', 'Useage'),
            'region' => Yii::t('app', 'Region'),
            'ingredient' => Yii::t('app', 'Ingredient'),
            'madeoff' => Yii::t('app', 'Madeoff'),
            'expiration' => Yii::t('app', 'Expiration'),
            'warnings' => Yii::t('app', 'Warnings'),
        ];
    }
}
