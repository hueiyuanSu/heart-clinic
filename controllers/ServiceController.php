<?php

namespace app\controllers;

use Yii;
use app\models\Categories;
use app\models\News;
use app\models\NewsSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class ServiceController extends Controller
{



    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($page=0)
    {
        $category_id = Categories::getIdByName('service');
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->searchPager(null,$category_id,$page-1,'created_at DESC');
        return $this->render('index',[
            'dataProvider'=> $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = News::findOne($id);
        return $this->render('view',[
            'model'=>$model
        ]);
    }

}
