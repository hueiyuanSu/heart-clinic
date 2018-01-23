<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\switchinput\SwitchBox;
use yii\helpers\ArrayHelper;

if($model->isNewRecord){
    $model->parent_id = $parent_id;
}
$categories = Yii::$app->CategoryHelper->getTreeList(null,true);
?>
<div class="row">
    <div class="col-md-12">
        <div class="categories-form">

            <?php $form = ActiveForm::begin(); ?>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?php
                $categories = ($categories)? ArrayHelper::map($categories, 'id', 'name') : [];
                echo $form->field($model, 'parent_id')->dropDownList($categories,
                    [
                        'options' =>
                            [
                              $model->parent_id => ['Selected' => true]
                          ],
                        'prompt'=>'選擇父層分類'
                    ]
                )?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <?= $form->field($model, 'sorts')->textInput() ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 switch-wrapper">
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
