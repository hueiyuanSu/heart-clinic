<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $sub_name
 * @property integer $category
 * @property integer $price
 * @property integer $sale_price
 * @property string $meta_type
 * @property string $description
 * @property string $keyword
 * @property string $content
 * @property integer $status
 * @property string $avatar
 * @property string $bg_image
 * @property integer $sorts
 * @property integer $modified_at
 * @property integer $created_at
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sub_name'], 'required'],
            [['category_id', 'price', 'sale_price', 'status', 'sorts', 'modified_at', 'created_at'], 'integer'],
            [['description', 'content'], 'string'],
            [['name', 'sub_name'], 'string', 'max' => 128],
            [['meta_type'], 'string', 'max' => 32],
            [['keyword', 'avatar','bg_image'], 'string', 'max' => 256],
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
            'sub_name' => Yii::t('app', 'Sub Name'),
            'category_id' => Yii::t('app', 'Category'),
            'price' => Yii::t('app', 'Price'),
            'sale_price' => Yii::t('app', 'Sale Price'),
            'meta_type' => Yii::t('app', 'Meta Type'),
            'description' => Yii::t('app', 'Description'),
            'keyword' => Yii::t('app', 'Keyword'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'avatar' => Yii::t('app', 'Avatar'),
            'bg_image' => Yii::t('app', 'Background Image'),
            'sorts' => Yii::t('app', 'Sorts'),
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
     * @return ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductsQuery(get_called_class());
    }
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public function getMeta()
    {
        switch($this->meta_type){
            case 'essential-oil':
                return $this->hasOne(ProductMetaOil::className(), ['product_id' => 'id']);
                break;
            case 'mask':
                return $this->hasOne(ProductMetaMask::className(), ['product_id' => 'id']);
                break;
            case 'soap':
                return $this->hasOne(ProductMetaSoap::className(), ['product_id' => 'id']);
                break;
        }
    }

    public static function findByCategory($category_id, $limit=3)
    {
        return Products::find()->where(['category_id'=> $category_id])->limit($limit)->active()->all();
    }
}
