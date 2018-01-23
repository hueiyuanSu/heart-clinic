<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_course".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $course_id
 * @property integer $total_price
 * @property string $name
 * @property string $name_en
 * @property string $birthday
 * @property string $phone
 * @property string $fax
 * @property string $mobile
 * @property string $social_id
 * @property string $note
 * @property integer $status
 * @property integer $payment_status
 * @property integer $modified_at
 * @property integer $created_at
 */
class OrderCourse extends \yii\db\ActiveRecord
{
    const STATUS_NOTPAID = 0;
    const STATUS_PAID = 1;
    const STATUS_REFOUND = 2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'course_id', 'total_price', 'status', 'payment_status', 'modified_at', 'created_at'], 'integer'],
            [['name', 'phone'], 'required'],
            [['note'], 'string'],
            [['name'], 'string', 'max' => 12],
            [['name_en'], 'string', 'max' => 32],
            [['birthday', 'phone', 'fax', 'mobile'], 'string', 'max' => 16],
            [['social_id'], 'string', 'max' => 128],
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
            'course_id' => Yii::t('app', 'Course ID'),
            'total_price' => Yii::t('app', 'Total Price'),
            'name' => Yii::t('app', 'Name'),
            'name_en' => Yii::t('app', 'Name En'),
            'birthday' => Yii::t('app', 'Birthday'),
            'phone' => Yii::t('app', 'Phone'),
            'fax' => Yii::t('app', 'Fax'),
            'mobile' => Yii::t('app', 'Mobile'),
            'social_id' => Yii::t('app', 'Social ID'),
            'note' => Yii::t('app', 'Note'),
            'status' => Yii::t('app', 'Status'),
            'payment_status' => Yii::t('app', 'Payment Status'),
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
     * @return OrderCourseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderCourseQuery(get_called_class());
    }

    public function getMember()
    {
        return $this->hasOne(MemberProfile::className(), ['user_id' => 'user_id']);
    }

    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'course_id']);
    }

    public static function getStatusesList()
    {
        return [
            self::STATUS_NOTPAID => Yii::t('app', 'Not Paid'),
            self::STATUS_PAID => Yii::t('app', 'Paid'),
            self::STATUS_REFOUND => Yii::t('app', 'Refund'),
        ];
    }

    public function getPaymentStatusLabel()
    {
        return static::getStatusesList()[$this->payment_status];
    }
}
