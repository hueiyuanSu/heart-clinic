<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CourseSchedule */

$this->title = Yii::t('app', 'Create Course Schedule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="an-body-topbar wow fadeIn">

    <div class="an-page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
</div>
<!--內容物-->
<div class="an-doc-block default with-shadow">
    <?= $this->render('_form', [
        'model' => $model,
        'courses'=> $courses
    ]) ?>
</div>

<?php

$this->registerJsFile('@web/js/admin/course-schedule/action.js', ['depends'=>['app\assets\BackendAppAsset']]);
?>
