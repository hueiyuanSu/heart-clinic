<?php

/* @var $this yii\web\View */
// \Yii::$app->language = 'th';
$this->title = Yii::t('app', 'homepage');
// $role = Yii::$app->authManager->getAssignments(Yii::$app->user->identity->id);
if(!Yii::$app->user->isGuest){
    $role_name = Yii::$app->user->identity->getRoleName();
    $user_name = Yii::$app->user->identity->username;
}else{
    $user_name = '遊客';
    $role_name=' 閒晃中';
}


?>
<div class="an-body-topbar wow fadeIn">
    <div class="an-page-title">
        <h2><?= $this->title; ?></h2>
        <p><?= Yii::t('app', 'welcome'); ?>, <?= $user_name; ?>
            <a href="#"><i class="icon-marker"></i><?= Yii::t('app', $role_name); ?></a>
        </p>
    </div>
</div> <!-- end AN-BODY-TOPBAR -->

<div class="an-doc-block default with-shadow">
    <p>放基本進度</p>
</div>
