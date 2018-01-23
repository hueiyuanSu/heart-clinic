<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = Yii::t('app', 'Products');

?>
<!-- Page Parallax Header -->
<div class="ws-parallax-header parallax-window" data-parallax="scroll" data-image-src="<?= Url::to(['@web/images/stage1_sample/5.jpg']); ?>">
    <div class="ws-overlay">
        <div class="ws-parallax-caption">
            <div class="ws-parallax-holder">
                <h1><?= $this->title;  ?></h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Parallax Header -->

<!-- Page Content -->
<div class="container ws-page-container">
    <div class="row">
        <div class="ws-shop-page">
            <!-- Categories Nav -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All (94)</a></li>
                <!-- loop  -->
                <li role="presentation"><a href="#prints" aria-controls="prints" role="tab" data-toggle="tab">Abstract Prints (16)</a></li>
            </ul>

            <!-- Categories Content -->
            <div class="tab-content">
                <!-- All -->
                <div role="tabpanel" class="tab-pane fade in active" id="all">
                    <?php
                    if($products){
                        foreach($products as $product){
                    ?>
                    <!-- Item -->
                    <div class="col-sm-6 col-md-4 ws-works-item">
                        <a href="<?= Url::to(['/product/view','id'=>$product->id]); ?>">
                            <div class="ws-item-offer">
                                <!-- Image -->
                                <figure>
                                    <img src="<?= $product->avatar; ?>" alt="Alternative Text" class="img-responsive">
                                </figure>
                            </div>

                            <div class="ws-works-caption text-center">
                                <!-- Item Category -->
                                <div class="ws-item-category"><?= $product->sub_name; ?></div>

                                <!-- Title -->
                                <h3 class="ws-item-title"><?= $product->name; ?></h3>

                                <div class="ws-item-separator"></div>

                                <!-- Price -->
                                <div class="ws-item-price"><del>$<?= $product->price; ?></del> <ins>$<?= $product->sale_price; ?></ins></div>
                            </div>
                        </a>
                    </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
            <!-- End Categories Content -->

            <!-- Load More -->
            <!-- <div class="ws-more-btn-holder col-sm-12">
                <a href="#x" class="btn ws-more-btn"> Load More</a>
            </div> -->

        </div>
    </div>
</div>
<!-- End Page Content -->
