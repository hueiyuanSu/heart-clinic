<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $total_price
 * @property integer $item_count
 * @property integer $status
 * @property integer $payment_status
 * @property integer $modified_at
 * @property integer $created_at
 */
class Orders extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_PROCESSING = 1;
    const STATUS_SHIPPED = 2;
    const STATUS_CANCELED = 3;
    const STATUS_PENDDING = 4;
    const PAYMENT_STATUS_UNPAID = 0;
    const PAYMENT_STATUS_PAID = 1;
    const PAYMENT_STATUS_REFUND = 2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'total_price', 'item_count', 'status', 'payment_status', 'modified_at', 'created_at','shipping_time','payment_time'], 'integer'],
            [['recipient','address'],'string','max' => 255],
            [['phone','mobile','sn'],'string','max' => 16],
            [['payment_method'],'string','max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sn' => Yii::t('app', 'Order Number'),
            'user_id' => Yii::t('app', 'User ID'),
            'total_price' => Yii::t('app', 'Total Price'),
            'item_count' => Yii::t('app', 'Item Count'),
            'recipient'=>Yii::t('app', 'Recipient'),
            'phone'=>Yii::t('app', 'Phone'),
            'mobile'=>Yii::t('app', 'Mobile'),
            'address'=>Yii::t('app', 'Address'),
            'status' => Yii::t('app', 'Order Status'),
            'payment_status' => Yii::t('app', 'Payment Status'),
            'payment_method' => Yii::t('app', 'Payment Method'),
            'payment_time' => Yii::t('app', 'Payment Time'),
            'shipping_time' => Yii::t('app', 'Shipping Time'),
            'modified_at' => Yii::t('app', 'Modified At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
    public function beforeValidate(){
        if($this->payment_time){
            if( !(( is_numeric($this->payment_time) && (int)$this->payment_time == $this->payment_time )) ){
                $this->payment_time = strtotime($this->payment_time);
            }
        }
        if($this->shipping_time){
            if( !(( is_numeric($this->shipping_time) && (int)$this->shipping_time == $this->shipping_time )) ){
                $this->shipping_time = strtotime($this->shipping_time);
            }
        }
        return true;
    }

    public function beforeSave($insert)
    {
        if($insert){
            $this->created_at = time();
            $latest = Orders::find()->orderby('id DESC')->one();
            $olidSn = $latest->sn;
            $this->sn = str_pad((int)$olidSn+1, 7, "0", STR_PAD_LEFT);
        }
        $this->modified_at = time();
        //strtotime();  format time to unix time
        return true;
    }

    /**
     * @inheritdoc
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

    public static function getStatusesList()
    {
        return [
            self::STATUS_NEW => Yii::t('app', 'New Order'),
            self::STATUS_PROCESSING => Yii::t('app', 'Order Processing'),
            self::STATUS_SHIPPED => Yii::t('app', 'Order Shipped'),
            self::STATUS_CANCELED => Yii::t('app', 'Order Canceled'),
            self::STATUS_PENDDING => Yii::t('app', 'Order Pendding'),
        ];
    }
    public function getStatusLabel()
    {
        return static::getStatusesList()[$this->status];
    }

    public static function getPaymentStatusesList()
    {
        return [
            self::PAYMENT_STATUS_UNPAID => Yii::t('app', 'Payment Unpaid'),
            self::PAYMENT_STATUS_PAID => Yii::t('app', 'Payment Paid'),
            self::PAYMENT_STATUS_REFUND => Yii::t('app', 'Payment Refund'),
        ];
    }
    public function getPaymentStatusLabel()
    {
        return static::getPaymentStatusesList()[$this->payment_status];
    }
}
