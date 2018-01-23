<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = $model->name.' - 最新訊息';
$categories = Yii::$app->CategoryHelper->getTreeList('訊息',false);
?>

<!-- Page Parallax Header -->
    <div class="ws-parallax-header parallax-window" data-parallax="scroll" data-image-src="<?= $model->bg_image; ?>">
        <div class="ws-overlay">
            <div class="ws-parallax-caption">
                <div class="ws-parallax-holder">
                    <h1><?= $model->name; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Parallax Header -->


    <!-- Page Content -->
    <div class="container ws-page-container">

        <div class="row">
            <div class="ws-about-content col-sm-12">

                <!-- Team Members -->
                <div class="row text-center">
                    <div class="ws-about-team">
                        <h4><a href="<?= Url::to(['/course','cat'=>$model->category_id]); ?>"><?= $model->category->name;?></a></h4>
                        <div class="ws-separator"></div>
                        <h5><?= Yii::$app->formatter->asDate($model->created_at, 'php:Y/m/d H:i'); ?> </h5>
                    </div>

                </div>
                <!-- Space Helper Class -->
                <div class="padding-top-x70"></div>
                <h3>內容</h3>
                <div class="ws-footer-separator"></div>
                <div clss="editor-content-wrapper"><?= $model->content; ?></div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
