<?php
use yii\helpers\Url;
$info = Yii::$app->user->identity;
$controllerID = Yii::$app->controller->id;
$actionID = Yii::$app->controller->action->id;
$viewArray = array('index','update','create','view');
// echo Yii::$app->user->can('item-view');
?>
<div class="an-sidebar-nav js-sidebar-toggle-with-click">
    <?php if(!Yii::$app->user->isGuest){ ?>
    <div class="an-sidebar-nav">

        <ul class="an-main-nav">

        <li class="an-nav-item <?= ( $controllerID =='banners')? 'current active':'' ?>">
            <a class="" href="<?= Url::to('/'); ?>" target="_BLANK">
                <i class="fa fa-home"></i>
                <span class="nav-title" role="">前端網頁
                </span>
            </a>
        </li>

        <li class="an-nav-item <?= ( $controllerID =='banners')? 'current active':'' ?>">
            <a class=" js-show-child-nav" href="#">
                <i class="fa fa-image"></i>
                <span class="nav-title" role="">首頁廣告
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='banners')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to('/admin/banners'); ?>" role="">廣告列表</a></li>
            </ul>
        </li>

        <li class="an-nav-item <?= ( $controllerID =='industry')? 'current active':'' ?>">
            <a class=" js-show-child-nav" href="#">
                <i class="fa fa-envelope-open-o"></i>
                <span class="nav-title" role="">產業訊息
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='account')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to('/admin/industry'); ?>" role="">訊息列表</a></li>
            </ul>
        </li>

        <li class="an-nav-item <?= ( $controllerID =='platform')? 'current active':'' ?>">
            <a class=" js-show-child-nav" href="#">
                <i class="icon-chart-stock"></i>
                <span class="nav-title" role=""><?=Yii::t('app', 'PlatformInformation')?>
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='account')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to('/admin/platform-information'); ?>" role=""><?=Yii::t('app','supplier List')?></a></li>
            </ul>
        </li>
        <!-- 第二階段才處理 -->
        <!-- <li class="an-nav-item <?= ( $controllerID =='activity')? 'current active':'' ?>">
            <a class=" js-show-child-nav" href="#">
                <i class="icon-chart-stock"></i>
                <span class="nav-title" role=""><?=Yii::t('app','Conference')?>
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='member')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to(''); ?>" role=""><?=Yii::t('app','Action List')?></a></li>
                <li><a href="<?= Url::to(''); ?>" role=""><?= Yii::t('app','Action Register Management')?></a></li>
            </ul>
        </li> -->

        <li class="an-nav-item <?= ( $controllerID =='service')? 'current active':'' ?>">
            <a class=" js-show-child-nav" href="#">
                <i class="fa fa-envelope-open-o"></i>
                <span class="nav-title" role="">服務項目
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='account')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to('/admin/service'); ?>" role="">服務列表</a></li>
            </ul>
        </li>

        <li class="an-nav-item <?= ( $controllerID =='staff')? 'current active':'' ?>">
            <a class=" js-show-child-nav" href="#">
                <i class="icon-chart-stock"></i>
                <span class="nav-title" role=""><?=Yii::t('app','Member Account Management')?>
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='member')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to('/admin/member'); ?>" role=""><?=Yii::t('app','Member Account List')?></a></li>
            </ul>
        </li>

        <li class="an-nav-item <?= ( $controllerID =='member')? 'current active':'' ?>">
            <a class=" js-show-child-nav" href="#">
                <i class="icon-chart-stock"></i>
                <span class="nav-title" role=""><?=Yii::t('app','Staff Management')?>
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='information')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to('/admin/staff'); ?>" role=""><?=Yii::t('app','Staff')?></a></li>
                <li><a href="<?= Url::to('/admin/staff/create'); ?>" role=""><?=Yii::t('app','Create Staff')?></a></li>
            </ul>
        </li>

        <li class="an-nav-item <?= ( $controllerID =='static-page')? 'current active':'' ?>">
            <a class=" js-show-child-nav" href="#">
                <i class="icon-chart-stock"></i>
                <span class="nav-title" role=""><?=Yii::t('app','Static Page Management')?>
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='information')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to('/admin/static'); ?>" role="">首頁</a></li>
                <li><a href="<?= Url::to('/admin/static/organization'); ?>" role="">組織介紹</a></li>
                
                <li><a href="<?= Url::to('/admin/static/conference');   ?>" role="">座談說明會</a></li>
                <li><a href="<?= Url::to('/admin/static/contact');      ?>" role="">聯絡我們</a></li>
            </ul>
        </li>
        <li class="an-nav-item <?= ( $controllerID =='user')? 'current active':'' ?>">
            <a class="" href="<?= Url::to('/user/admin'); ?>">
                <i class="icon-chart-stock"></i>
                <span class="nav-title" role=""><?=Yii::t('app','Permissions Management')?>

        <li class="an-nav-item <?= ( $controllerID =='user' || $controllerID =='rbac')? 'current active':'' ?>">
            <a class=" js-show-child-nav" href="#">
                <i class="fa fa-vcard"></i>
                <span class="nav-title" role="">後台帳號管理
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='user' || $controllerID =='rbac')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to('/user/admin'); ?>" role="">員工帳號管理</a></li>
                <li><a href="<?= Url::to('/rbac/permission/index'); ?>" role="">權限管理</a></li>
            </ul>
        </li>

        <li class="an-nav-item <?= ( $controllerID =='categories')? 'current active':'' ?>">
            <a class=" js-show-child-nav" href="#">
                <i class="fa fa-vcard"></i>
                <span class="nav-title" role="">系統分類管理
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='categories')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to('/admin/categories'); ?>" role="">分類列表</a></li>
            </ul>
        </li>

        </ul> <!-- end .AN-MAIN-NAV -->
    </div> <!-- end .AN-SIDEBAR-NAV -->
    <?php } ?>
</div> <!-- end .AN-SIDEBAR-NAV -->
