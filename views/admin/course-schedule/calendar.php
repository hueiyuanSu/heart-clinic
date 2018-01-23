<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Course Schedules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="an-body-topbar wow fadeIn">
    <div class="an-page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <div class="title_right">
        <?= Html::a('<i class="fa fa-plus m-r-5"></i>'.Yii::t('app', 'Create Course Schedule'), ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('<i class="fa fa-list m-r-5"></i>'.Yii::t('app', 'List View'), ['index'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<div class="an-single-component with-shadow">
    <div class="an-component-body">
        <div class="an-helper-block">
            <div class="an-scrollable-x">
                <?= edofre\fullcalendar\Fullcalendar::widget([
                        'options'       => [
                            'id'       => 'calendar',
                            'language' => 'zh-TW',
                        ],
                        'clientOptions' => [
                            'weekNumbers' => true,
                            'selectable'  => true,
                            'defaultView' => 'month',
                            'eventResize' => new JsExpression("
                                function(event, delta, revertFunc, jsEvent, ui, view) {
                                    console.log(event);
                                }
                            "),

                        ],
                        'events' => Url::to(['/api/admin/course-schedule/events']),
                    ]);
                ?>
            </div>
        </div>
    </div>
</div>
