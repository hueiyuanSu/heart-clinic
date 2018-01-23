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
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($model, 'img_url')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group field-courseschedule-start_at has-error">
                    <label class="control-label" for="courseschedule-start_at"><?= Yii::t('app', 'Start At'); ?></label>
                    <input id="startTime" class="form-control" name="Banners[start_at]" aria-invalid="true" type="text" value="<?= ($model->start_at)? Yii::$app->formatter->asDate($model->start_at, 'php:Y/m/d H:i') : ''; ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group field-courseschedule-end_at has-error">
                    <label class="control-label" for="courseschedule-end_at"><?= Yii::t('app', 'End At'); ?></label>
                    <input id="endTime" class="form-control" name="Banners[end_at]" aria-invalid="true" type="text" value="<?= ($model->end_at)? Yii::$app->formatter->asDate($model->end_at, 'php:Y/m/d H:i') : ''; ?>">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12" id="avater-wrapper" data-width="1920" data-height="800">
                <?= $form->field($model, 'avatar')->hiddenInput(['maxlength' => true,'id'=>'general-avatar']); ?>
                <div class="avatar" data-toggle="modal" data-target="#avatar-modal" >
                    <img src="<?=  ($model->avatar)? $model->avatar: 'http://placehold.it/1920x800' ?>" width="150" class="form-preview-avatar js-trigger-croppies" data-modal="#avatar-upload-form" data-wrapper="#avater-wrapper">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-4 switch-wrapper">
                <?= $form->field($model, 'status')->widget(SwitchBox::className(),[
                    'options' => [
                        'label' => false,
                    ],
                    'clientOptions' => [
                        'size' => 'normal',
                        'onColor' => 'success',
                        'offColor' => 'danger',
                        'onText'=>'上架',
                        'offText'=>'下架',
                        'labelText'=>''
                    ]
                ]);?>
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
