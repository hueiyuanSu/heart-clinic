<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\switchinput\SwitchBox;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CourseSchedule */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-12">
        <div class="course-schedule-form">
            <?php $form = ActiveForm::begin(); ?>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <?php
                    $courses = ($courses)? ArrayHelper::map($courses, 'id', 'name') : [];
                    echo $form->field($model, 'course_id')->dropDownList($courses,
                        [
                            'options' =>
                                [
                                  $model->course_id => ['Selected' => true]
                              ],
                            'prompt'=>'選擇課程'
                        ]
                    )?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
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
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group field-courseschedule-start_at has-error">
                        <label class="control-label" for="courseschedule-start_at"><?= Yii::t('app', 'Start At'); ?></label>
                        <input id="startTime" class="form-control" name="CourseSchedule[start_at]" aria-invalid="true" type="text" value="<?= ($model->start_at)? Yii::$app->formatter->asDate($model->start_at, 'php:Y/m/d H:i') : ''; ?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group field-courseschedule-end_at has-error">
                        <label class="control-label" for="courseschedule-end_at"><?= Yii::t('app', 'End At'); ?></label>
                        <input id="endTime" class="form-control" name="CourseSchedule[end_at]" aria-invalid="true" type="text" value="<?= ($model->end_at)? Yii::$app->formatter->asDate($model->end_at, 'php:Y/m/d H:i') : ''; ?>">
                    </div>
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
