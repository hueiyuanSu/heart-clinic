<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_meta_oil".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $name_en
 * @property string $bg_image
 * @property string $capacity
 * @property string $effects
 * @property string $effects_note
 * @property string $region
 * @property string $ingredient
 * @property string $feature
 * @property string $suggestion
 * @property string $warnings
 */
class ProductMetaOil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_meta_oil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['effects', 'suggestion', 'warnings'], 'string'],
            [['name_en', 'bg_image', 'effects_note', 'ingredient', 'feature'], 'string', 'max' => 256],
            [['capacity'], 'string', 'max' => 32],
            [['region'], 'string', 'max' => 128],
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
            'name_en' => Yii::t('app', 'Name En'),
            'bg_image' => Yii::t('app', 'Bg Image'),
            'capacity' => Yii::t('app', 'Capacity'),
            'effects' => Yii::t('app', 'Effects'),
            'effects_note' => Yii::t('app', 'Effects Note'),
            'region' => Yii::t('app', 'Region'),
            'ingredient' => Yii::t('app', 'Ingredient'),
            'feature' => Yii::t('app', 'Feature'),
            'suggestion' => Yii::t('app', 'Suggestion'),
            'warnings' => Yii::t('app', 'Warnings'),
        ];
    }
}
