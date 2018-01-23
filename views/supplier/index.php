<?php

/* @var $this yii\web\View */
// \Yii::$app->language = 'th';
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = Yii::t('app', 'Supplier & Demander');
// $role = Yii::$app->authManager->getAssignments(Yii::$app->user->identity->id);

?>
<body>
    <div id="site-wrapper" class="site_wrapper">
    	<div class="page_banner_area">
    		<div class="image_block" style="background-image: url('../images/banner_01.png');"></div>
    		<div class="banner_bt_block">
    			<a href="<?= Url::to(['supplier/apply']);?>" class="banner_bt">供需媒合申請</a>
    		</div>
    	</div>
        <div class="page_wrapper supplier_wrapper">
        	<div class="page_title_area clearAfter">
				<div class="page_title pull-left">供需情報</div>
				<div class="page_title_en pull-left">Supplier & Demander</div>
			</div>
			<div class="supplier_area clearAfter">
                <?php
                    foreach($dataProvider->getModels() as $index=>$items){
                ?>
				<div class="col-sm-4 col-xs-12">
                    <a href="<?= Url::to(['supplier/list?platid=']).$items->id;?>" class="supplier_block">
                        <div class="supplier_img" style="background-image: url('../images/round_pic03.png');"></div>
                        <div class="supplier_title"><?=$items->company?></div>
                    </a>
                </div>
                <?php
                    }
                ?>
	        </div>
		</div>


    </div>
</body>
</html>



