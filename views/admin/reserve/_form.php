<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\switchinput\SwitchBox;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Banners */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-12">
        <div class="banner-form">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($model, 'patient_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($model, 'patient_phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($model, 'reserve_date',['enableClientValidation' => false])->textInput(['id' => 'datetimepicker-reserve']) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($model, 'reserve_time',['enableClientValidation' => false])->textInput(['id' => 'datetimepicker-time']) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?=
                    $form->field($model, 'disease')->dropdownList([
                        1 => '內診',
                        2 => '針灸',
                        3 => '傷科',
                    ],
                    ['prompt'=>'請選擇門診']
                );
                ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <?= $form->field($model, 'remark')->textarea(['rows' => '3']) ?>
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

<?php

$this->registerJsFile('@web/js/init.js', ['depends'=>['app\assets\AppAsset']]);
?>
