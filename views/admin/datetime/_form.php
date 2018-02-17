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

            <div class="col-xs-12 col-sm-12 col-md-12">
                <?=
                    $form->field($model, 'weekdays')->dropdownList([
                        1 => '星期一',
                        2 => '星期二',
                        3 => '星期三',
                        4 => '星期四',
                        5 => '星期五',
                        6 => '星期六',
                    ],
                    ['prompt'=>'請選擇星期幾']
                );
                ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <?= $form->field($model, 'time')->checkboxList([
                        '9:00' => '9:00','10:00' => '11:00','11:00' => '11:00','12:00' => '12:00','13:00' => '13:00','14:00' => '14:00',
                        '15:00' => '15:00','16:00' => '16:00','17:00' => '17:00','18:00' => '18:00','19:00' => '19:00','20:00' => '20:00',
                        '21:00' => '21:00','22:00' => '22:00'],
                        ['separator' => '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp']);
                ?>
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
