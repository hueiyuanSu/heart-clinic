<?php
use yii\helpers\Url;
use yii\helpers\Html;

$session = Yii::$app->session;
$session->open();
?>
<li class="menu_item">
    <li><a href="<?= Url::to(['member/login']);?>">會員註冊 / 登入</a></li>
</li>
