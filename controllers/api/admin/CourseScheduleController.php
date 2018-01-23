<?php

namespace app\controllers\api\admin;

use Yii;
use app\models\Courses;
use app\models\CourseSchedule;
use app\models\CourseScheduleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\BadRequestHttpException;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * CourseScheduleController implements the CRUD actions for CourseSchedule model.
 */
class CourseScheduleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
    *檢查登入
    */
    public function beforeAction($action)
    {
        $info = Yii::$app->user->identity;
        $session = Yii::$app->session;
        // 登入導向
        if(Yii::$app->user->isGuest){
            return false;
        }
        // if(Yii::$app->GeneralHelper->getRoleName()!='manager'){
        //     return false;
        // }

        return true;
    }

    /**
     * Lists all CourseSchedule models.
     * @return mixed
     */
    public function actionEvents($start, $end)
    {
        if (!Yii::$app->request->isAjax) {
            throw new BadRequestHttpException("非法存取模式");
        }else{
            Yii::$app->response->format = Response::FORMAT_JSON;
            $query = CourseSchedule::find()->active()->where("(start_at < :end) AND (end_at > :start)",[':start'=>strtotime($start),':end'=>strtotime($end)]);
            $events = $query->all();
            return ArrayHelper::toArray($events, [
                'app\models\CourseSchedule' => [
                    'id',
                    'title' => function($model) {
                        return $model->course->name;
                    },
                    'start' => function($model) {
                        return  Yii::$app->formatter->asTime($model->start_at, 'php:Y/m/d H:i');
                    },
                    'end' => function($model) {
                        return Yii::$app->formatter->asTime($model->end_at, 'php:Y/m/d H:i');
                    },
                    'url' => function($model) {
                        return Url::to(['/admin/course-schedule/view','id'=>$model->id]);
                    },
                    'color' => function($model) {
                        $start = date('H',$model->start_at);
                        $end = date('H',$model->end_at);
                        if($start < 12 && $end > 12){
                            return '#45ba70';
                        }else if($start < 12){
                            return '#00ccff';
                        }else{
                            return '#d99c00';
                        }
                    },
                ],
            ]);
        }
    }
}
