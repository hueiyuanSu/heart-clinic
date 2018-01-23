<?php

namespace app\controllers\api\admin;

use Yii;
use app\models\Products;
use app\models\ProductsSearch;
use app\models\ProductMetaOil;
use app\models\ProductMetaMask;
use app\models\ProductMetaSoap;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionGetMetaView($type)
    {

        switch($type){
            case 'essential-oil':
                $model = new ProductMetaOil();
                return $this->renderAjax('_form_essential_oil', [
                    'model' => $model
                ]);
                break;
            case 'mask':
                $model = new ProductMetaOil();
                return $this->renderAjax('_form_mask', [
                    'model' => $model
                ]);
                break;
            case 'soap':
                $model = new ProductMetaOil();
                return $this->renderAjax('_form_soap', [
                    'model' => $model
                ]);
                break;
        }



    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
