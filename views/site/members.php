<?php

/* @var $this yii\web\View */
// \Yii::$app->language = 'th';
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = Yii::t('app', 'TeamMember');
// $role = Yii::$app->authManager->getAssignments(Yii::$app->user->identity->id);

?>
<body>
    <div id="site-wrapper" class="site_wrapper">
        <div class="page_wrapper members_wrapper">
        	<div class="page_title_area clearAfter">
				<div class="page_title pull-left">團隊成員</div>
				<div class="page_title_en pull-left">Members</div>
			</div>
			<div class="members_area">
                <?php
                if($categories){
                    foreach($categories as $group){
                ?>
				<div class="members_block">
                    <div class="members_block_title"><?= $group['name'];?></div>
                    <?php if($staffs){
                        foreach($staffs as $staff){
                            if($staff->group_id==$group['id']){
                    ?>
                    <div class="members_width clearAfter">
                        <div class="col-sm-4 col-xs-6 members_block_width">
                            <div class="members_img_block">
                                <div class="image_circle">
                                    <div class="members_image" style="background-image: url('<?= $staff->avatar; ?>');"></div>
                                </div>
                            </div>
                            <div class="members_name"><?= $staff->name; ?></div>
                        </div>
                    <?php 
                            }
                        }
                    }
                    ?>
                    </div>
                </div>
               <?php }}?>
	        </div>
        </div>

    </div>
</body>
</html>



