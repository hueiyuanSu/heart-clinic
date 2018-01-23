<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <div class="staff-form">

        <?php $form = ActiveForm::begin(); ?>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?php
                $categories = ($categories)? ArrayHelper::map($categories, 'id', 'name') : [];
                echo $form->field($model, 'group_id')->dropDownList($categories,
                    [
                        'options' =>
                            [
                              $model->group_id => ['Selected' => true]
                          ],
                        'prompt'=>'選擇群組'
                    ]
                )?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6" id="avater-wrapper" data-width="500" data-height="500">
                <?= $form->field($model, 'avatar')->hiddenInput(['maxlength' => true,'id'=>'general-avatar']); ?>
                <div class="avatar" data-toggle="modal" data-target="#avatar-modal" >
                    <img src="<?=  ($model->avatar)? $model->avatar: 'http://placehold.it/500x500' ?>" width="150" class="form-preview-avatar js-trigger-croppies" data-modal="#avatar-upload-form" data-wrapper="#avater-wrapper">
                </div>
            </div>
       
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>

</div>
