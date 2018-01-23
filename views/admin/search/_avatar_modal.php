<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

<!-- avatar Modal -->
<div class="modal fade modal-wrapper croppie-image-modal" id="bg-image-modal" tabindex="-1" role="dialog" aria-labelledby="avatar-modalLabel">
	<div class="modal-dialog modal-xs" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="avatar-modalLabel"><?= Yii::t('app', 'Upload background image');?></h4>
			</div>
			<div class="modal-body">
				<div class="search_form_wrapper">
                    <?php
                    $avarar_form = ActiveForm::begin(['action' =>['api/upload/avatar'], 'id' => 'bg-image-upload-form', 'method' => 'post',]);
                    ?>
					<div class="preview_area">
						<div class="upload-msg">
							<?= Yii::t('app', 'Upload a image to start cropping');?>
                        </div>
                        <div class="upload-avatar-wrap">
                            <div class="uploaded-image"></div>
                        </div>
					</div>
					<div class="file_area">
						<div class="upload_btn_wrapper">
							<div class="fake_btn">
								<?= Yii::t('app', 'Browse files');?>
							</div>
							<input type="file" value="Choose a file" accept="image/*" class="real_upload_btn js-croppie-input" name="avatar" />
							<input type="hidden"  class="croped-image-base64" name="avatar_base64" />
						</div>

						<div class="upload_comfirm"><?= Yii::t('app', 'Upload');?></div>
					</div>




                    <?php ActiveForm::end(); ?>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<?= Yii::t('app', 'Cancel');?>
				</button>
			</div>
		</div>
	</div>
</div>

<!-- background image -->

<div class="modal fade modal-wrapper croppie-image-modal" id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="avatar-modalLabel">
	<div class="modal-dialog modal-xs" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="avatar-modalLabel"><?= Yii::t('app', 'Upload Avatar');?></h4>
			</div>
			<div class="modal-body">
				<div class="search_form_wrapper">
                    <?php
                    $avarar_form = ActiveForm::begin(['action' =>['api/upload/avatar'], 'id' => 'avatar-upload-form', 'method' => 'post',]);
                    ?>
					<div class="preview_area">
						<div class="upload-msg">
							<?= Yii::t('app', 'Upload a image to start cropping');?>
                        </div>
                        <div class="upload-avatar-wrap">
                            <div class="uploaded-image"></div>
                        </div>
					</div>
					<div class="file_area">
						<div class="upload_btn_wrapper">
							<div class="fake_btn">
								<?= Yii::t('app', 'Browse files');?>
							</div>
							<input type="file" value="Choose a file" accept="image/*" class="real_upload_btn js-croppie-input" name="avatar" />
							<input type="hidden"  class="croped-image-base64" name="avatar_base64" />
						</div>

						<div class="upload_comfirm"><?= Yii::t('app', 'Upload');?></div>
					</div>




                    <?php ActiveForm::end(); ?>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<?= Yii::t('app', 'Cancel');?>
				</button>
			</div>
		</div>
	</div>
</div>
