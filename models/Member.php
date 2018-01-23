<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $name
 * @property string $member_number
 * @property string $ssid
 * @property integer $sex
 * @property integer $birth_date
 * @property string $bank
 * @property string $branch_bank
 * @property integer $account_number
 * @property integer $useful_date
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property integer $is_stop
 * @property string $password
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birth_date','account_number','useful_date','sex','is_stop','valitate_number'], 'integer'],
            [['ssid','phone'], 'string','max'=>16],
            [['member_number','name','bank','branch_bank'], 'string','max'=>128],
            [['email','address','password','account','contact_address'], 'string', 'max' => 255],
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
            'member_number' => Yii::t('app','Member Number'),
            'ssid' => Yii::t('app','Ssid'),
            'sex' => Yii::t('app','Sex'),
            'birth_date' => Yii::t('app','Birth Date'),
            'bank' => Yii::t('app','Bank'),
            'branch_bank' => Yii::t('app','Branch Bank'),
            'account_number' => Yii::t('app','Account Number'),
            'useful_date' => Yii::t('app','Useful Date'),
            'email' => Yii::t('app','Email'),
            'phone' => Yii::t('app','Phone'),
            'addrress' => Yii::t('app','Address'),
            'is_stop' => Yii::t('app','Is Stop'),
            'password' => Yii::t('app','Password'),
            'account' => Yii::t('app','Account'),
            'contact_address' => Yii::t('app','Contact Address'),
            'valitate_number' => Yii::t('app','Valitate Number'),
        ];
    }

}
