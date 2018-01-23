<?php

namespace app\controllers;

use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class NewsController extends Controller
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
            $query['NewsSearch']['category_id'] = $cat;
        }
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->searchPager($query,3,$page-1,'created_at DESC');
        return $this->render('index',[
            'dataProvider'=> $dataProvider,
            'cat'=>$cat
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
