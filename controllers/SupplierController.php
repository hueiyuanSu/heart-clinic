<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\PlatformInformation;
use app\models\PlatformInformationSearch;
use app\db\Transaction;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use dektrium\user\controllers\AdminController as BaseAdminController;

class SupplierController extends BaseAdminController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($page=0)
    {
        $searchModel = new  PlatformInformationSearch();
        // $limit=30, $offset=0, $orderBy="created_at DESC"
        $dataProvider = $searchModel->searchPager(null,1,20,$page,'register_date DESC');
        return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
    }

    
    public function actionCreate(){
        if (!Yii::$app->request->isAjax){
            throw new BadRequestHttpException("非法存取模式");
        }else{
            Yii::$app->response->format = Response::FORMAT_JSON;
            $platformData = new PlatformInformation();
            $platformData->category = Yii::$app->request->post('category');
            $platformData->company = Yii::$app->request->post('company');
            $platformData->principal = Yii::$app->request->post('principal');
            $platformData->employer_identification_number = Yii::$app->request->post('ein');
            $platformData->factory_number = Yii::$app->request->post('factory');
            $platformData->writer = Yii::$app->request->post('writer');
            $platformData->department = Yii::$app->request->post('department');
            $platformData->address= Yii::$app->request->post('address');
            $platformData->phone = Yii::$app->request->post('phone');
            $platformData->cellphone = Yii::$app->request->post('cellphone');
            $platformData->fax = Yii::$app->request->post('fax');
            $platformData->email = Yii::$app->request->post('email');
            $platformData->website = Yii::$app->request->post('website');
            $platformData->register_date = time();
            $platformData->is_confirmed = 0;
            $platformData->is_access = 1;
            $platformData->save();
            return array('success' => true);
        }
    }
    public function actionList($platid){
        $data = PlatformInformation::find()->where(['id'=>$platid])->one();
        return $this->render('article',['data'=>$data]);
    }
    public function actionApply(){
        if(Yii::$app->session['memberid']==null){
            return $this->redirect('/member/login');
        }else{
            return $this->render('apply_information');
        }
    }
}
