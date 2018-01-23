<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_hint".
 *
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property integer $createTime
 * @property integer $modifiedTime
 */
class TypeHint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_hint';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_at', 'modified_at'], 'integer'],
            [['name'], 'string', 'max' => 256],
            [['type'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'create_at' => 'Create Time',
            'modified_at' => 'Modified Time',
        ];
    }

    public function beforeSave($insert)
    {
        if($insert){
            $this->create_at = time();
        }
        $this->modified_at = time();
        //strtotime();  format time to unix time
        return true;
    }

    /*
    搜尋相關的hint
    */
    public static  function searchHint($name=null, $type=null)
	{
        if($name && $type){
            return TypeHint::find()->select('name')
                ->where(['type'=>$type])
                ->andFilterWhere(['like', 'name', $name])
                ->orderBy(['createTime' => SORT_DESC])
                ->limit(20)
                ->all();
        }else{
            return array();
        }

    }

    /*
    新增hint
    */
    public static  function insertHint($name=null, $type=null)
	{
        if($name && $type ){
            //查無存在的字串才新增
            if(!TypeHint::find()->where(['name'=>$name, 'type'=>$type])->count()){
                $model = new TypeHint();
                $model->name = $name;
                $model->type = $type;
                if (!$model->save()) {
                    Yii::error("create hint_notify error! ". print_r($model->getErrors()), __METHOD__);
                    return false;
                }else{
                    return true;
                }
            }
        }
	}

}
