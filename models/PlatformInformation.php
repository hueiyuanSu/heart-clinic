<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $category
 * @property string $company
 * @property string $principal
 * @property integer $employer_identification_number
 * @property integer $factory_number
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property integer $register_date
 * @property string $remark
 */
class PlatformInformation extends \yii\db\ActiveRecord
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'platform_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_identification_number','factory_number','register_date','is_access','is_confirmed'], 'integer'],
            [['principal','phone','writer','department','cellphone','fax'], 'string','max'=>16],
            [['category','company','address','email','website','mem_number'], 'string','max'=>128],
            [['remark','content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'employer_identification_number' => Yii::t('app','Employer Identification Number'),
            'factory_number' => Yii::t('app','Factory Number'),
            'register_date' => Yii::t('app','Register Date'),
            'principal' => Yii::t('app','Principal'),
            'phone' => Yii::t('app','Phone'),
            'address' => Yii::t('app','Address'),
            'category' => Yii::t('app','Category'),
            'company' => Yii::t('app','Company'),
            'email' => Yii::t('app','Email'),
            'remark' => Yii::t('app','Remark'),
            'writer' => Yii::t('app','Writer'),
            'department' => Yii::t('app','Department'),
            'cellphone' => Yii::t('app','Cellphone'),
            'fax' => Yii::t('app','Fax'),
            'website' => Yii::t('app','Website'),
            'is_confirmed' => Yii::t('app','Is Confirmed'),
            'is_access' => Yii::t('app','Is Access'),
            'mem_number' => Yii::t('app','Mem Number'),
            'content' => Yii::t('app','Content'),
        ];
    }
    public function beforeSave($insert)
    {
        if($insert){
            $this->register_date = time();
        }
        return true;
    }

}
