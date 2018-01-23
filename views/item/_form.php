<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $form yii\widgets\ActiveForm */
$now_shop = (Yii::$app->request->get('shop'))? Yii::$app->request->get('shop'):'';
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
        $shopsArray = ($shops)? ArrayHelper::map($shops, 'id', 'name') : [];
        echo $form->field($model, 'shop_id')->dropDownList($shopsArray,
            [
                'options' =>
                    [
                      $now_shop => ['Selected' => true]
                  ],
                'prompt'=>'選擇店家'
            ]
        )
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rank')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?
        echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
        if($model->isNewRecord){

            echo Html::submitButton('儲存並繼續新增', ['class' => 'btn btn-warning m-l-10', 'name'=>'continue', 'value'=>'true']);
        }
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
