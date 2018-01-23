<?php

namespace app\controllers;

use Yii;
use app\models\CourseSchedule;
use app\models\CourseScheduleSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class CourseController extends Controller
{



    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($cat=null,$page=0)
    {
        $query = Yii::$app->request->queryParams;
        if($cat){
            $query['CourseScheduleSearch']['category_id'] = $cat;
        }
        $searchModel = new CourseScheduleSearch();
        $dataProvider = $searchModel->searchPager($query,3,$page-1,'start_at DESC');
        return $this->render('index',[
            'dataProvider'=> $dataProvider,
            'cat'=>$cat
        ]);
    }

    public function actionView($id)
    {
        $model = CourseSchedule::findOne($id);
        return $this->render('view',[
            'model'=>$model
        ]);
    }

}
