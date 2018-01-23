<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\switchinput\SwitchBox;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
$categories = Yii::$app->CategoryHelper->getTreeList('產品',true);
$productType = Yii::$app->CategoryHelper->getTreeList('product-type',true);
?>
<div class="row">
    <div class="col-md-12">
        <?php $form = ActiveForm::begin(); ?>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($model, 'sub_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?php
                $categories = ($categories)? ArrayHelper::map($categories, 'id', 'name') : [];
                echo $form->field($model, 'category_id')->dropDownList($categories,
                    [
                        'options' =>
                            [
                              $model->category_id => ['Selected' => true]
                          ],
                        'prompt'=>'選擇分類'
                    ]
                )?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6" id="avater-wrapper" data-width="500" data-height="500">
                <?= $form->field($model, 'avatar')->hiddenInput(['maxlength' => true,'id'=>'general-avatar']); ?>
                <div class="avatar" data-toggle="modal" data-target="#avatar-modal" >
                    <img src="<?=  ($model->avatar)? $model->avatar: 'http://placehold.it/500x500' ?>" width="150" class="form-preview-avatar js-trigger-croppies" data-modal="#avatar-upload-form" data-wrapper="#avater-wrapper">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6" id="bg-image-wrapper" data-width="1920" data-height="800">
                <?= $form->field($model, 'bg_image')->hiddenInput(['maxlength' => true,'id'=>'general-bg']) ?>
                <div class="avatar" data-toggle="modal" data-target="#bg-image-modal">
                    <img src="<?=  ($model->bg_image)? $model->bg_image: 'http://placehold.it/1920x800' ?>" width="300" class="form-preview-avatar js-trigger-croppie" data-modal="#bg-image-upload-form" data-wrapper="#bg-image-wrapper">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <?php echo froala\froalaeditor\FroalaEditorWidget::widget([
                    'model' => $model,
                    'attribute' => 'content',
                    // 'name' => 'Candidate[summary]',
                    'options'=>[// html attributes
                        'id'=>'news-content'
                    ],
                    'clientOptions'=>[
                        'toolbarInline'=> false,
                        'height' => 380,
                        'theme' =>'royal',
                        'language'=>'zh_tw',
                        'toolbarButtons' => [
                            'fontFamily', 'fontSize', 'paragraphFormat', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript',
                            '|', 'color', 'inlineStyle', 'paragraphStyle',
                            '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent',
                            '|',  'insertLink', 'insertImage', 'insertTable',
                            '|',  'quote', 'insertHR', 'undo', 'redo', 'clearFormatting', 'selectAll'
                        ],
                        'fontFamilySelection'=> true,
                        'fontSizeSelection'=> true,
                        'paragraphFormatSelection'=> true,
                        'imageEditButtons'=> ['imageDisplay', 'imageAlign', 'imageInfo', 'imageRemove'],
                        'imageUploadParam' => 'file',
                        'imageUploadURL' => Url::to(['/api/upload/editor'])
                    ],
                    'clientPlugins'=> ['fullscreen', 'paragraph_format', 'image','link','lists']
                ]); ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($model, 'price')->textInput() ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($model, 'sale_price')->textInput() ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?php
                $productType = ($productType)? ArrayHelper::map($productType, 'name', 'name') : [];
                $meta_type= ($model->meta_type)? $model->meta_type : $useType;
                echo $form->field($model, 'meta_type')->dropDownList($productType,
                    [
                        'options' =>
                            [
                              $meta_type => ['Selected' => true]
                          ],
                        'prompt'=>'選擇分類',
                        'disabled' => ($model->isNewRecord && !$meta_type) ? false : 'disabled'
                    ]
                )?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($model, 'sorts')->textInput() ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h3 class="product-meta-title">
                    面膜類資訊
                </h3>
            </div>
            <!-- meta start -->
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($modelMeta, 'purpose')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($modelMeta, 'ingredient')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($modelMeta, 'madeoff')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($modelMeta, 'capacity')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($modelMeta, 'region')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($modelMeta, 'expiration')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($modelMeta, 'useage')->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($modelMeta, 'warnings')->textarea(['rows' => 6]) ?>
            </div>
            <!-- meta end -->

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
