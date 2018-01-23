<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = $model->name.' - '.Yii::t('app', 'Product');
$meta = $model->meta;
?>
<!-- Product Content -->
<div class="container ws-page-container">
    <div class="row">

        <!-- Product Image Carousel -->
        <div class="col-sm-7">
            <div id="ws-products-carousel" class="owl-carousel">
                <div class="item">
                    <img src="<?= $model->avatar; ?>" class="img-responsive" alt="Alternative Text">
                </div>

            </div>
        </div>

        <!-- Product Information -->
        <div class="col-sm-5">
            <div class="ws-product-content">
                <header>
                    <!-- Item Category -->
                    <div class="ws-item-category"><?= $model->sub_name; ?></div>

                    <!-- Title -->
                    <h3 class="ws-item-title"><?= $model->name; ?></h3>

                    <div class="ws-separator"></div>

                    <!-- Price -->
                    <div class="ws-single-item-price">$<?= $model->price; ?></div>

                    <!-- Quantity -->
                    <div class="ws-product-quantity">
                        <a href="#" class="minus">-</a>
                            <input type="text" value="1" size="4">
                        <a href="#" class="plus">+</a>
                    </div>
                </header>

                <div class="ws-product-details">
                    <?= $model->description; ?>
                </div>

                <!-- Button -->
                <a class="btn ws-btn-fullwidth add-to-cart"
                data-type="product"
                data-id="<?= $model->id;?>"
                data-name="<?= $model->name;?>"
                data-avatar="<?= $model->avatar;?>"
                data-qty="1"
                data-price="<?= $model->price;?>"
                >新增至購物車</a><br><br><br>
            </div>
        </div>
    </div>
</div>
<!-- Product Content -->

<!-- Products Description -->
<div class="ws-products-description-content text-center">
    <!-- Item -->
    <div class="ws-product-description">
        <h3>Origin</h3>
        <p><?= (isset($meta->region))? $meta->region : ''; ?></p>
    </div>

    <!-- Item -->
    <div class="ws-product-description">
        <h3>產品資訊</h3>
        <div clss="editor-content-wrapper"><?= $model->content; ?></div>
    </div>

    <!-- Item -->
    <div class="ws-product-description">
        <h3>內容物</h3>
        <?= (isset($meta->ingredient))? $meta->ingredient : ''; ?>
    </div>
    <!-- Item -->
    <?php if(isset($meta->capacity) && $meta->capacity){ ?>
    <div class="ws-product-description">
        <h3>容量尺寸</h3>
        <p><?= $meta->capacity; ?> </p>
    </div>
    <?php } ?>
    <?php if(isset($meta->warnings) && $meta->warnings){ ?>
    <!-- Item -->
    <div class="ws-product-description">
        <h3>注意事項</h3>
        <div class="wraning-box">
            <?= nl2br($meta->warnings); ?>
        </div>
    </div>
    <?php } ?>

    <!-- Item -->
    <div class="ws-product-description">
        <h3>Share</h3>
        <div class="ws-product-social-icon">
            <a href="#x"><i class="fa fa-twitter"></i></a>
            <a href="#x"><i class="fa fa-instagram"></i></a>
            <a href="#x"><i class="fa fa-facebook"></i></a>
            <a href="#x"><i class="fa fa-pinterest"></i></a>
            <a href="#x"><i class="fa fa-behance"></i></a>
        </div>
    </div>




</div>
<!-- End Products Description -->

<!-- Related Post -->
<div class="ws-related-section hide">
    <div class="container">

        <!-- Title -->
        <div class="ws-related-title">
            <h3>Related Products</h3>
        </div>

        <div class="col-sm-4">
            <!-- Item -->
            <div class="ws-works-item">
                <a href="#">
                    <!-- Image -->
                    <figure>
                        <img src="assets/img/works/illustrated/2.jpg" alt="Alternative Text" class="img-responsive">
                    </figure>
                    <div class="ws-works-caption text-center">
                        <!-- Item Category -->
                        <div class="ws-item-category">Illustrated Prints</div>

                        <!-- Title -->
                        <h3 class="ws-item-title">Arkose Factor</h3>

                        <div class="ws-item-separator"></div>

                        <!-- Price -->
                        <div class="ws-item-price">$150.00</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-sm-4">
            <!-- Item -->
            <div class="ws-works-item">
                <a href="#">
                    <!-- Image -->
                    <figure>
                        <img src="assets/img/works/abstract/1.jpg" alt="Alternative Text" class="img-responsive">
                    </figure>
                    <div class="ws-works-caption text-center">
                        <!-- Item Category -->
                        <div class="ws-item-category">Abstract</div>

                        <!-- Title -->
                        <h3 class="ws-item-title">Jumping Sky</h3>

                        <div class="ws-item-separator"></div>

                        <!-- Price -->
                        <div class="ws-item-price">$129.99</div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-sm-4">
            <!-- Item -->
            <div class="ws-works-item">
                <a href="#">
                    <!-- Image -->
                    <figure>
                        <img src="assets/img/works/journals/7.jpg" alt="Alternative Text" class="img-responsive">
                    </figure>
                    <div class="ws-works-caption text-center">
                        <!-- Item Category -->
                        <div class="ws-item-category">journals</div>

                        <!-- Title -->
                        <h3 class="ws-item-title">Princes World</h3>

                        <div class="ws-item-separator"></div>

                        <!-- Price -->
                        <div class="ws-item-price">$50.00</div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
<!-- End Related Post -->
