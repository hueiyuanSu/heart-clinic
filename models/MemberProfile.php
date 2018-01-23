<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property string $mobile
 * @property string $address
 */
class MemberProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','birth_date','account_number','useful_date','sex','is_stop'], 'integer'],
            [['name','ssid','phone','member_number'], 'string', 'max' => 16],
            [['bank','branch_bank'], 'string', 'max' => 20],
            [['email','address'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app','Name'),
            'ssid' => Yii::t('app','SSID'),
            'sex' => Yii::t('app','Sex'),
            'birth_date' => Yii::t('app','Birth Date'),
            'bank' => Yii::t('app','Bank'),
            'branch_bank' =>  Yii::t('app','Branch Bank'),
            'account_number' => Yii::t('app','Account Number'),
            'useful_date' => Yii::t('app','Useful Date'),
            'email' => Yii::t('app','Email'),
            'phone' => Yii::t('app','Phone'),
            'address' => Yii::t('app','Address'),
            'is_stop' => Yii::t('app','Is Stop'),
            'member_number' => Yii::t('app','Member Number'),
        ];
    }

    public function getFullname()
    {
        return $this->name;
    }
}
