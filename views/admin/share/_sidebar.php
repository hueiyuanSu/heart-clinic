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
            <a class=" js-show-child-nav" href="#">
                <i class="fa fa-image"></i>
                <span class="nav-title" role="">預約管理
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='banners')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to('/admin/banners'); ?>" role="">預約系統</a></li>
            </ul>
        </li>

        <li class="an-nav-item <?= ( $controllerID =='industry')? 'current active':'' ?>">
            <a class=" js-show-child-nav" href="#">
                <i class="fa fa-envelope-open-o"></i>
                <span class="nav-title" role="">查詢管理
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>
            <ul class="an-child-nav js-open-nav" <?= ( $controllerID =='account')? 'style="display: block;"':'' ?>>
                <li><a href="<?= Url::to('/admin/industry'); ?>" role="">查詢系統</a></li>
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
