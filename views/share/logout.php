<?php
use yii\helpers\Url;
use yii\helpers\Html;

$session = Yii::$app->session;
$session->open();
?>
<li class="menu_item">
    <div class="login_block">
        <div class="login_info">
            <i class="fa fa-user m-r-5" aria-hidden="true"></i>
            歡迎回來/ <button class="no-btn-style" id="logout">登出</button>
        </div>
    </div>
</li>
