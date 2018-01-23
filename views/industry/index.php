<?php

/* @var $this yii\web\View */
// \Yii::$app->language = 'th';
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = '產業訊息';
// $role = Yii::$app->authManager->getAssignments(Yii::$app->user->identity->id);

?>
<body>
    <div id="site-wrapper" class="site_wrapper">
    	<!-- <div class="page_banner_area">
    		<div class="image_block" style="background-image: url('../images/banner_01.png');"></div>
    		<div class="banner_bt_block">
    			<a href="<?= Url::to(['supplier/apply']);?>" class="banner_bt">供需媒合申請</a>
    		</div>
    	</div> -->
        <div class="page_wrapper supplier_wrapper">
        	<div class="page_title_area clearAfter">
				<div class="page_title pull-left">服務項目</div>
				<div class="page_title_en pull-left">Service</div>
			</div>
			<div class="supplier_area clearAfter">
                <?php
                    if($dataProvider->getModels()){
                        foreach($dataProvider->getModels() as $index=>$item){
                            $avatar = ($item->avatar)? $item->avatar : '../images/round_pic03.png';
                ?>
				<div class="col-sm-4 col-xs-12">
                    <a href="<?= Url::to(['industry/view','id'=>$item->id]);?>" class="supplier_block">
                        <div class="supplier_img" style="background-image: url('<?= $avatar; ?>');"></div>
                        <div class="supplier_title"><?=$item->name?></div>
                    </a>
                </div>
                <?php
                        }
                    }else{
                        echo '<h4 class="text-center t-center">尚無資訊</h4>';
                    }
                ?>
	        </div>
		</div>


    </div>
</body>
</html>



