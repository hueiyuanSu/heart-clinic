<?php

/* @var $this yii\web\View */
// \Yii::$app->language = 'th';
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = Yii::t('app', 'homepage');
// $role = Yii::$app->authManager->getAssignments(Yii::$app->user->identity->id);

?>

<body>

    <div id="site-wrapper" class="site_wrapper index">
    	<!-- banners -->
    	<div class="slider_wrapper">
			<?php 
			if($banners){ 
				foreach($banners as $banner){
			?>
			<div class="slider_content">
				<div class="image_block" style="background-image: url('<?= $banner->avatar ?>');"></div>
				<div class="slider_block">
					<div class="slider_block_inner">
						<div class="slogan_en"><?= $banner->title; ?></div>
						<div class="slogan_cn"><?= $banner->subtitle; ?></div>
						<a href="<?= $banner->img_url; ?>" class="more_bt">更多訊息</a>
					</div>
				</div>
			</div>
			<?php } }else{ ?>
			<div class="slider_content default">
				<div class="image_block" style="background-image: url('images/banner_01.png');"></div>
				<div class="slider_block">
					<div class="slider_block_inner">
						<div class="slogan_en">Innovation Technology</div>
						<div class="slogan_cn">傳承技術 ． 服務產業</div>
						<a href="" class="more_bt">更多訊息</a>
					</div>
				</div>
			</div>
			<?php } ?>
			
		</div>

		<!-- news -->

    	<div class="news_wrapper">
    		<div class="page_title_area clearAfter">
    			<div class="page_title pull-left">最新消息</div>
    			<div class="page_title_en pull-left">News & Events</div>
    			<a href="" class="news_more pull-right"><i class="fa fa-list-ul m-r-10" aria-hidden="true"></i>更多列表</a>
    		</div>
			<div class="news_content_area clearAfter">
				<div class="news_content_block">
					<div class="news_image_block" style="background-image: url('images/news_pic01.png');"></div>
					<div class="news_info_block">
						<div class="news_info_date">2017/08/01</div>
						<div class="news_info_title">
							<div class="news_info_content_inner">
								勞動部「2017年國際勞工事務培力營」即日起開始受理報名勞動部「2017年國際勞工事務培力營」即日起開始受理報名
							</div>
						</div>
						<div class="news_info_content">
							人員培訓及能力建構為本部主要國際勞工事務策略之重要一環，鑑於本部及所屬機關、地方勞正單位及工會人員培訓及能力建構為本部主要國際勞工事務策略之重要一環，鑑於本部及所屬機關、地方勞正單位及工會
						</div>
						<a href="" class="news_more_bt">more</a>
					</div>
				</div>
				<div class="news_content_block">
					<div class="news_image_block" style="background-image: url('images/news_pic02.png');"></div>
					<div class="news_info_block">
						<div class="news_info_date">2017/10/01</div>
						<div class="news_info_title">
							<div class="news_info_content_inner">
								勞動部「2017年國際勞工事務培力營」即日起開始受理報名勞動部「2017年國際勞工事務培力營」即日起開始受理報名
							</div>
						</div>
						<div class="news_info_content">
							人員培訓及能力建構為本部主要國際勞工事務策略之重要一環，鑑於本部及所屬機關、地方勞正單位及工會人員培訓及能力建構為本部主要國際勞工事務策略之重要一環，鑑於本部及所屬機關、地方勞正單位及工會
						</div>
						<a href="" class="news_more_bt">more</a>
					</div>
				</div>
				<div class="news_content_block">
					<div class="news_image_block" style="background-image: url('images/news_pic03.png');"></div>
					<div class="news_info_block">
						<div class="news_info_date">2017/12/01</div>
						<div class="news_info_title">
							<div class="news_info_content_inner">
								勞動部「2017年國際勞工事務培力營」即日起開始受理報名勞動部「2017年國際勞工事務培力營」即日起開始受理報名
							</div>
						</div>
						<div class="news_info_content">
							人員培訓及能力建構為本部主要國際勞工事務策略之重要一環，鑑於本部及所屬機關、地方勞正單位及工會人員培訓及能力建構為本部主要國際勞工事務策略之重要一環，鑑於本部及所屬機關、地方勞正單位及工會
						</div>
						<a href="" class="news_more_bt">more</a>
					</div>
				</div>
			</div>
    	<!-- </div> -->
    </div>
    <div class="task_wrapper">
    	<!-- <div class="container"> -->
    		<div class="task_title">主要任務</div>
    		<div class="task_area clearAfter">
    			<div class="task_block">
    				<div class="task_image_block" style="background-image: url('images/round_pic01.png');"></div>
    				<div class="task_info_block orange">
    					<div class="task_info_content">
    						<div class="task_info_content_inner">整合國內外資深人才供需資訊、建立人才資料庫整合國內外資深人才供需資整合國內外資深人才供需資訊、建立人才資料庫整合國內外資深人才供需資</div>
    					</div>
						<a href="" class="task_more_bt">more</a>
    				</div>
    			</div>
    			<div class="task_block">
    				<div class="task_image_block" style="background-image: url('images/round_pic02.png');"></div>
    				<div class="task_info_block red">
    					<div class="task_info_content">
    						<div class="task_info_content_inner">整合國內外資深人才供需資訊、建立人才資料庫整合國內外資深人才供需資整合國內外資深人才供需資訊、建立人才資料庫整合國內外資深人才供需資</div>
    					</div>
						<a href="" class="task_more_bt">more</a>
    				</div>
    			</div>
    			<div class="task_block">
    				<div class="task_image_block" style="background-image: url('images/round_pic03.png');"></div>
    				<div class="task_info_block green">
    					<div class="task_info_content">
    						<div class="task_info_content_inner">整合國內外資深人才供需資訊、建立人才資料庫整合國內外資深人才供需資整合國內外資深人才供需資訊、建立人才資料庫整合國內外資深人才供需資</div>
    					</div>
						<a href="" class="task_more_bt">more</a>
    				</div>
    			</div>
    			<div class="task_block">
    				<div class="task_image_block" style="background-image: url('images/round_pic04.png');"></div>
    				<div class="task_info_block blue">
    					<div class="task_info_content">
    						<div class="task_info_content_inner">整合國內外資深人才供需資訊、建立人才資料庫整合國內外資深人才供需資整合國內外資深人才供需資訊、建立人才資料庫整合國內外資深人才供需資</div>
    					</div>
						<a href="" class="task_more_bt">more</a>
    				</div>
    			</div>
    		</div>
        </div>

    </div>




