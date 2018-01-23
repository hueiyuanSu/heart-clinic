<?php

/* @var $this yii\web\View */
// \Yii::$app->language = 'th';
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = $model->name.' | 服務項目';
// $role = Yii::$app->authManager->getAssignments(Yii::$app->user->identity->id);

?>
<body>
    <div id="site-wrapper" class="site_wrapper">
        <div class="page_wrapper article_wrapper">
        	
			<div class="article_area clearAfter">
				<div class="article_title_area">
                    <div class="article_title"><?= $model->name; ?></div>
                    
                </div>
                <div class="article_content_area clearAfter">
                    <p><?= $model->content; ?></p>
                </div>
                <div class="back">
                    <a href="<?=Url::to(['/service']);?>" class="back_btn" id="back-submit"> 回上頁 > </a>
                </div>
	        </div>
        </div>

    </div>
</body>
</html>



