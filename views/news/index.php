<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = '最新訊息';
$categories = Yii::$app->CategoryHelper->getTreeList('訊息',false);
$cat = ($cat)? $cat : $categories[0]['id'];
?>

<!-- Page Parallax Header -->
    <div class="ws-parallax-header parallax-window" data-parallax="scroll" data-image-src="<?= Url::to(['@web/images/stage1_sample/5.jpg']); ?>">
        <div class="ws-overlay">
            <div class="ws-parallax-caption">
                <div class="ws-parallax-holder">
                    <h1>最新訊息</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Parallax Header -->


    <!-- Page Content -->
    <div class="container ws-page-container">
        <div class="row">
            <div class="ws-about-content col-sm-12 text-center">
                <?php
                if($categories){
                    foreach($categories as $category){
                ?>
                <div class="col-sm-6 ws-about-team-item" data-sr='wait 0.1s, ease-in 20px'>
                    <a href="<?= Url::to(['/news', 'cat'=>$category['id']]); ?>">
                    <div class="caption">
                        <h3><?= $category['name'];?></h3>
                        <?php
                        echo ($category['id']==$cat)? '<div class="ws-separator"></div>': '';
                        ?>
                    </div>
                    </a>
                </div>
                <?php } } ?>
            </div>
        </div>
        <div class="row">
            <div class="ws-about-content col-sm-12">

                <!-- Team Members -->
                <div class="row text-center">
                    <div class="ws-about-team">
                        <?php
                        if($dataProvider->getModels()){
                            foreach($dataProvider->getModels() as $index=>$news){
                        ?>
                        <a href="<?= Url::to(['/news/view','id'=>$news->id]); ?>" class="col-xs-12 col-sm-4 ws-about-team-item padding-top-x70" data-sr='wait 0.1s, ease-in 20px'>
                            <img src="<?= $news->avatar; ?>" alt="Alternative Text" class="img-responsive">
                            <div class="caption">
                                <h3><?=  $news->name; ?></h3>
                                <div class="ws-separator"></div>
                                <h5><?= Yii::$app->formatter->asDate($news->created_at, 'php:Y/m/d H:i'); ?></h5>
                                <p><?= $news->description; ?></p>
                            </div>
                        </a>
                        <?php

                            }
                        }
                    ?>
                    </div>
                </div>

                <!-- Space Helper Class -->
                <div class="padding-top-x70"></div>

                <?php
                    echo LinkPager::widget([
                        'pagination' => $dataProvider->getPagination(),
                        'options'=>[
                        	'class'=>'pagination pull-right'
                        ]
                    ]);
        		 ?>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
