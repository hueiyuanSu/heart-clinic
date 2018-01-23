<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\BackendAppAsset;

BackendAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | 心齋中醫</title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="main-wrapper js-fixed-header">
        <div class="an-loader-container">
<!--
            <img src="<?= \Yii::getAlias('@webroot'); ?>/assets/img/loader.png" alt="">
-->
        </div>

        <?php echo $this->render('@app/views/admin/share/_header', ['param'=>""]); ?>

        <div class="an-page-content">

            <?php echo $this->render('@app/views/admin/share/_sidebar', ['param'=>""]); ?>

            <div class="an-content-body">
                <div class="an-breadcrumb wow fadeInUp">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                </div> <!-- end AN-BREADCRUMB -->


                <?= $content ?>
            </div> <!-- end .AN-PAGE-CONTENT-BODY -->
        </div> <!-- end .AN-PAGE-CONTENT -->



        <footer class="an-footer">
            <p>COPYRIGHT © Larvata. ALL RIGHTS RESERVED</p>
        </footer> <!-- end an-footer -->
    </div> <!-- end .MAIN-WRAPPER -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
