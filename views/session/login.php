<?php
use dektrium\user\widgets\Connect;
use dektrium\user\models\LoginForm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = Yii::t('appWeb', 'Sign in');
?>
<!-- Page Parallax Header -->
<div class="ws-parallax-header parallax-window" data-parallax="scroll" data-image-src="<?= Url::to('@web/images/sample/toner-906142_1920.jpg')?>">
    <div class="ws-overlay">
        <div class="ws-parallax-caption">
            <div class="ws-parallax-holder">
                <h1><?= Yii::t('appWeb', 'Sign in');?></h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Parallax Header -->

<!-- Page Content -->
<div class="container ws-page-container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">

            <!-- Login Form -->
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => [
                    'class' => 'ws-login-form'
                ],
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
                'validateOnBlur' => false,
                'validateOnType' => false,
                'validateOnChange' => false,
            ]) ?>
                <!-- Email -->
                <?= $form->field($model, 'login',
                    ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]
                )->label(Yii::t('appWeb', 'Email Adress'));
                ?>

                <?= $form->field(
                    $model,
                    'password',
                    ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])
                    ->passwordInput()
                    ->label(Yii::t('appuser', 'Password')) ?>


                <!-- Checkbox -->
                <div class="pull-left">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"><?= Yii::t('appWeb', 'Stay signed in');?>
                        </label>
                    </div>
                </div>

                <div class="pull-right">
                    <div class="ws-forgot-pass">
                        <a href="#x"><?= Yii::t('appWeb', 'Forgot your password ?');?></a>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="padding-top-x50"></div>

                <!-- Button -->
                <?= Html::submitButton(
                    Yii::t('appWeb', 'Sign in'),
                    ['class' => 'btn ws-btn-fullwidth', 'tabindex' => '4']
                ) ?>
                <!-- <a class="btn ws-btn-fullwidth"><?= Yii::t('appWeb', 'Sign in');?></a> -->
                <br><br>
                <!-- Facebook Button -->
                <!-- <a class="btn ws-btn-facebook">Sign in with Facebook</a>    -->
            <?php ActiveForm::end(); ?>
            <?= Connect::widget([
                'baseAuthUrl' => ['/user/security/auth'],
            ]) ?>
            <!-- End Login Form -->

                <!-- Register Form-->
                <div class="ws-register-form">

                    <!-- Link -->
                    <div class="ws-register-link">
                        <a href="<?= Url::to('/signup/register') ?>" ><?= Yii::t('appWeb', 'Click here to sign up for an account.');?> </a>
                    </div>


                </div>
                <!-- End Register -->

        </div>
    </div>
</div>
<!-- End Page Content -->
