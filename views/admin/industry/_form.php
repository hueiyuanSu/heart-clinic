<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\switchinput\SwitchBox;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <div class="create-form">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <?= $form->field($model, 'category_id')->label('')->textInput(['value'=>$category_id,'type'=>'hidden']); ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12"></div>

            <div class="col-xs-12 col-sm-12 col-md-6" id="avater-wrapper" data-width="500" data-height="500">
                <?= $form->field($model, 'avatar')->hiddenInput(['maxlength' => true,'id'=>'general-avatar']); ?>
                <div class="avatar" data-toggle="modal" data-target="#avatar-modal" >
                    <img src="<?=  ($model->avatar)? $model->avatar: 'http://placehold.it/500x500' ?>" width="150" class="form-preview-avatar js-trigger-croppies" data-modal="#avatar-upload-form" data-wrapper="#avater-wrapper">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
                <?php echo Html::activeHiddenInput($model, 'version');?>

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
                        'key'=>'gwvuH3mfgtmmoji1A3md1C-13==',
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
                <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4">
                <?= $form->field($model, 'sorts')->textInput() ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 switch-wrapper">
                <?= $form->field($model, 'status')->widget(SwitchBox::className(),[
                    'options' => [
                        'label' => false,
                    ],
                    'clientOptions' => [
                        'size' => 'normal',
                        'onColor' => 'success',
                        'offColor' => 'danger',
                        'onText'=>'上架',
                        'offText'=>'下架',
                        'labelText'=>''
                    ]
                ]);?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
