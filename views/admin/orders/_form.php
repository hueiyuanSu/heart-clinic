<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Orders;
/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
$statusList = Orders::getStatusesList();
$paymentStatusList = Orders::getPaymentStatusesList();
?>
<div class="row">
    <div class="col-md-12">
        <div class="orders-form">

            <?php $form = ActiveForm::begin(); ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <label class="control-label"><?= Yii::t('app', 'Member Account')?></label>
                    <div>
                        <?= $model->user->username; ?>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <label class="control-label"><?= Yii::t('app', 'Recipient')?></label>
                    <div><?= $model->recipient; ?></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <label class="control-label"><?= Yii::t('app', 'Recipient Phone')?></label>
                    <div><?= $model->phone; ?></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <label class="control-label"><?= Yii::t('app', 'Recipient Mobile')?></label>
                    <div><?= $model->mobile; ?></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="control-label"><?= Yii::t('app', 'Recipient Address')?></label>
                    <div><?= $model->address; ?></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <label class="control-label"><?= Yii::t('app', 'Payment Method')?></label>
                    <div><?= $model->payment_method; ?></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <label class="control-label"><?= Yii::t('app', 'Total Price')?></label>
                    <div><?= $model->total_price; ?></div>
                </div>
            </div>


            <div class="col-xs-12 col-sm-6 col-md-3">
                <?php

                echo $form->field($model, 'status')->dropDownList($statusList,
                    [
                        'options' =>
                            [
                              $model->status => ['Selected' => true]
                          ],
                        'prompt'=>'選擇狀態'
                    ]
                )?>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3">
                <?php
                echo $form->field($model, 'payment_status')->dropDownList($paymentStatusList,
                    [
                        'options' =>
                            [
                              $model->payment_status => ['Selected' => true]
                          ],
                        'prompt'=>'選擇付款狀態'
                    ]
                )?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group field-order-payment_time">
                    <label class="control-label" for="order-payment_time"><?= Yii::t('app', 'Payment Time'); ?></label>
                    <input class="form-control datetimepicker" name="Orders[payment_time]" aria-invalid="true" type="text" value="<?= ($model->payment_time)? Yii::$app->formatter->asDate($model->payment_time, 'php:Y/m/d H:i') : ''; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group field-order-shipping_time">
                    <label class="control-label" for="order-shipping_time"><?= Yii::t('app', 'Shipping Time'); ?></label>
                    <input class="form-control datetimepicker" name="Orders[shipping_time]" aria-invalid="true" type="text" value="<?= ($model->shipping_time)? Yii::$app->formatter->asDate($model->shipping_time, 'php:Y/m/d H:i') : ''; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
