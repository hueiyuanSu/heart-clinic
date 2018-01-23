<?php
use dektrium\user\widgets\Connect;
use dektrium\user\models\LoginForm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = Yii::t('appWeb', 'Sign up');
?>
<!-- Page Parallax Header -->
<div class="ws-parallax-header parallax-window" data-parallax="scroll" data-image-src="<?= Url::to('@web/images/sample/toner-906142_1920.jpg')?>">
    <div class="ws-overlay">
        <div class="ws-parallax-caption">
            <div class="ws-parallax-holder">
                <h1><?= Yii::t('appWeb', 'Sign up');?></h1>
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
                'id' => 'registration-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
            ]); ?>

                <?= $form->field($model, 'email')->label(Yii::t('appuser', 'Email')); ?>

                <?= $form->field($model, 'username')->label(Yii::t('appuser', 'Username')); ?>

                <?php //if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model, 'password')->passwordInput()->label(Yii::t('appuser', 'Password')); ?>
                <?php //endif ?>

                <div class="clearfix"></div>
                <div class="padding-top-x50"></div>

                <!-- Button -->
                <?= Html::submitButton(
                    Yii::t('appWeb', 'Sign up'),
                    ['class' => 'btn ws-btn-fullwidth', 'tabindex' => '4']
                ) ?>

            <?php ActiveForm::end(); ?>
            <?= Connect::widget([
                'baseAuthUrl' => ['/user/security/auth'],
            ]) ?>
            <!-- End Login Form -->

                <!-- Register Form-->
                <div class="ws-register-form">

                    <!-- Link -->
                    <div class="ws-register-link">
                        <a href="<?= Url::to('/session/login') ?>"><?= Yii::t('appWeb', 'Already have an account? Sign in here.');?> </a>
                    </div>


                </div>
                <!-- End Register -->

        </div>
    </div>
</div>
<!-- End Page Content -->
