<?php

namespace app\controllers\admin;

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
            $this->redirect('/user/login');
            return;
        }
        // if(Yii::$app->GeneralHelper->getRoleName()!='manager'){
        //     $this->redirect('/index');
        //     return;
        // }

        // 語系宣告
        if(!isset($session['locale'])){
            $locale =  Yii::$app->user->identity->profile->location;
            $session['locale'] = ($locale)? $locale : 'zh-TW';
        }
        \Yii::$app->language = $session['locale'];
        $this->layout = 'admin';
        return true;
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type='')
    {
        $model = new Products();
        // print_r(Yii::$app->request->post());
        // return;
        $model->meta_type = $type;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $meta_type = ($type)? $type : $model->meta_type;
            switch($meta_type){
                case 'essential-oil':
                    $modelMeta =  new ProductMetaOil();

                    break;
                case 'mask':
                    $modelMeta =  new ProductMetaMask();

                    break;
                case 'soap':
                    $modelMeta =  new ProductMetaSoap();

                    break;
            }
            $modelMeta->product_id = $model->id;
            if($modelMeta->load(Yii::$app->request->post()) && $modelMeta->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->redirect(['view', 'id' => $model->id,'message'=>'metaerror']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'useType'=>$type
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            switch($model->meta_type){
                case 'essential-oil':
                    $modelMeta = ($model->meta)? $model->meta : new ProductMetaOil();

                    break;
                case 'mask':
                    $modelMeta = ($model->meta)? $model->meta : new ProductMetaMask();

                    break;
                case 'soap':
                    $modelMeta = ($model->meta)? $model->meta : new ProductMetaSoap();

                    break;
            }
            $modelMeta->product_id = $model->id;
            if($modelMeta->load(Yii::$app->request->post()) && $modelMeta->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->redirect(['view', 'id' => $model->id,'message'=>'metaerror']);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
