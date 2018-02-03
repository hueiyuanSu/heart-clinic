<?php

namespace app\controllers\admin;

use Yii;
use app\models\Reserve;
use app\models\ReserveSearch;
use app\models\Diseasetime;
use app\models\DiseasetimeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\db\Transaction;
use yii\web\ForbiddenHttpException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;

/**
 * BannersController implements the CRUD actions for Banners model.
 */
class ReserveController extends Controller
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
     * Lists all Banners models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReserveSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Banners model.
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
     * Creates a new Banners model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateinner()
    {
        $model = new Reserve();

        if ($model->load(Yii::$app->request->post()) && $this->saveInner($model)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model = new Reserve();
            return $this->render('createinner', [
                'model' => $model,
            ]);
        }
    }
    public function actionCreateharm()
    {
        $model = new Reserve();

        if ($model->load(Yii::$app->request->post()) && $this->saveHarm($model)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model = new Reserve();
            return $this->render('createharm', [
                'model' => $model,
            ]);
        }
    }
    public function actionCreateneedle()
    {
        $model = new Reserve();

        if ($model->load(Yii::$app->request->post()) && $this->saveNeedle($model)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model = new Reserve();
            return $this->render('createneedle', [
                'model' => $model,
            ]);
        }
    }
    public function saveModel($model)
    {
        // Here is called getQuantArray() getter from TakMolForm model
        // $model->reserve_time= implode(',', $model->reserve_time);

        return $model->save();
    }

    public function saveInner($model){
        $model->disease = '1';
        return $model->save();
    }
    public function saveHarm($model){
        $model->disease = '2';
        return $model->save();
    }
    public function saveNeedle($model){
        $model->disease = '3';
        return $model->save();
    }

    /**
     * Updates an existing Banners model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $this->saveModel($model)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionToday(){
        $searchModel = new ReserveSearch();
        $date = Yii::$app->formatter->asTime(time(), 'php:Y-m-d');

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$date);

        return $this->render('todayreservation', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Banners model.
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
     * Finds the Banners model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reserve the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reserve::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
