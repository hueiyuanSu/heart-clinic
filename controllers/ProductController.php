<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShopController implements the CRUD actions for Shop model.
 */
class ProductController extends Controller
{


    /**
     * Lists all Shop models.
     * @return mixed
     */
    public function actionIndex($cat=null)
    {
        if($cat){
            $products = Products::findByCategory($cat, 100);
        }else{
            //撈取精華版
            $products = Products::findByCategory(Yii::$app->CategoryHelper->getCategoryID('季節特惠'), 100);
        }
        return $this->render('index',[
            'products'=>$products,
        ]);
    }
    public function actionView($id=null,$pid=null)
    {
        if($id){
            $model = Products::findOne($id);
        }
        return $this->render('view',[
            'model'=>$model
        ]);
    }


}
