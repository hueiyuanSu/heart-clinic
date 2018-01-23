<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property integer $id
 * @property integer $number
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $password
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['group_id','integer'],
            [['name','phone','password','employee_number'], 'string', 'max' => 16],
            [['email'], 'string', 'max' => 128],
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
            'group_id'=> Yii::t('app', 'Group'),
            'employee_number' => Yii::t('app','Employee Number'),
            'name' => Yii::t('app','Name'),
            'email' => Yii::t('app','Email'),
            'phone' => Yii::t('app','Phone'),
            'avatar' => Yii::t('app','Avatar'),
            'password' => Yii::t('app','Password'),
        ];
    }

    public function beforeSave($insert)
    {
        //strtotime();  format time to unix time
        return true;
    }

    public function getGroup()
    {
        return $this->hasOne(Categories::className(), ['id' => 'group_id']);
    }

}
