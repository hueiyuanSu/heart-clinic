<?php

/* @var $this yii\web\View */
// \Yii::$app->language = 'th';
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = Yii::t('app', '');
// $role = Yii::$app->authManager->getAssignments(Yii::$app->user->identity->id);

?>
<body>
    <div id="site-wrapper" class="site_wrapper">
        <div class="page_wrapper article_wrapper">
        	<div class="page_title_area clearAfter">
				<div class="page_title pull-left">產業分類</div>
				<div class="page_title_en pull-left"><?= $data->category?></div>
			</div>
			<div class="article_area clearAfter">
				<div class="article_title_area">
                    <div class="article_title"><?=$data->category?></div>
                    <div class="article_content clearAfter">
                        <div class="date"><?=Yii::$app->formatter->asTime($data->register_date, 'php:Y/m/d') ?></div>
                        <div class="source"><?=$data->company?></div>
                    </div>
                </div>
                <div class="article_content_area clearAfter">
                    <p><?=$data->content?></p>
                </div>
                <div class="back">
                    <a href="<?=Url::to(['/supplier']);?>" class="back_btn" id="back-submit"> 回上頁 > </a>
                </div>
	        </div>
        </div>

    </div>
</body>
</html>



