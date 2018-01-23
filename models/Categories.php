<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property integer $parent_id
 * @property integer $sorts
 * @property integer $status
 * @property integer $modified_at
 * @property integer $created_at
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'sorts', 'status', 'modified_at', 'created_at'], 'integer'],
            [['type'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'name' => Yii::t('app', 'Name'),
            'parent_id' => Yii::t('app', 'Parent'),
            'sorts' => Yii::t('app', 'Sorts'),
            'status' => Yii::t('app', 'Status'),
            'modified_at' => Yii::t('app', 'Modified At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    public function beforeSave($insert)
    {
        if($insert){
            if(!$this->parent_id){
                $this->parent_id = 0;
            }
            $this->created_at = time();
        }
        $this->modified_at = time();
        //strtotime();  format time to unix time
        return true;
    }

    /**
     * @inheritdoc
     * @return CategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriesQuery(get_called_class());
    }

    public function getMeta()
    {
        return $this->hasOne(CategoryMeta::className(), ['category_id' => 'id']);
    }

    public function getParent()
    {
        return $this->hasOne(Categories::className(), ['parent_id' => 'id']);
    }

    public static function getIdByName($name)
    {
        $model = self::find()->where(['name'=>$name])->one();
        if($model){
            return $model->id;
        }else{
            return null;
        }
    }

    public static function getTreeList($parent=null){
        if(!is_numeric($parent) && $parent!=null){
            $parentModel = self::find()->where(['name'=>$parent])->one();
            if(!$parentModel){
                return null;
            }else{
                $parent = $parentModel->id;
            }
        }
		$query = self::find()->select('id, name');
        if($parent!=null){
            $query->where(['parent_id'=>$parent]);
        }
        $categories = $query->asArray()->all();
        if($categories){
    		foreach($categories as $index=>$category){
                $categories[$index]['children'] = self::getChildList($category['id']);
    		}
        }
		return $categories;
	}
    public static function getChildList($parent_id)
    {
        $categories = self::find()->select('id, name')->where(['parent_id'=>$parent_id])->asArray()->all();
        if($categories){
            foreach($categories as $index=>$category){
                $categories[$index]['children'] = self::getChildList($category['id']);
            }
            return $categories;
        }else{
            return null;
        }
    }
}
