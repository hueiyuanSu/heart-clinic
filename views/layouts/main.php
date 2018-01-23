<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\FrontendAppAsset;

FrontendAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | 產業雲棧</title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <!-- Loader Start -->
    <!-- <div id="preloader">
        <div class="preloader-container">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
            </div>
        </div>
    </div> -->
    <?php echo $this->render('/share/_frame_top', ['param'=>""]) ;?>
    <!-- End Loader Start -->
    <?php echo $this->render('/share/_header', ['param'=>""]); ?>

    <?= $content ?>

    <?php echo $this->render('/share/_footer', ['param'=>""]); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
