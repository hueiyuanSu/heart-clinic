<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Staff;
use app\models\Categories;
use app\models\Staticpage;
use app\models\StaticpageSearch;
use dektrium\user\controllers\AdminController as BaseAdminController;

class SiteController extends BaseAdminController
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
    *檢查登入
    */
    public function beforeAction($action)
    {
        // $info = Yii::$app->user->identity;
        // $session = Yii::$app->session;
        // // 登入導向
        // if(Yii::$app->user->isGuest){
        //     $this->redirect('/user/login');
        //     return;
        // }
        //
        // // 語系宣告
        // if(!isset($session['locale'])){
        //     $locale =  Yii::$app->user->identity->profile->location;
        //     $session['locale'] = ($locale)? $locale : 'zh-TW';
        // }
        // \Yii::$app->language = $session['locale'];
        return true;
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        // if (!Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }
        // $model = new LoginForm();
        // if ($model->load(Yii::$app->request->post()) && $model->login()) {
        //     return $this->goBack();
        // }
        return $this->render('login');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $contact = Staticpage::find()->where(['category'=>'聯絡我們'])->one();
        return $this->render('contact',[
            'contact'=>$contact
        ]);
    }


    public function actionMember(){


        return $this->render('members',array(
            'categories'=>Categories::getTreeList('staff'),
            'staffs'=>Staff::find()->all()
        ));
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $org = Staticpage::find()->where(['category'=>'組織介紹'])->one();

        return $this->render('about',[
            'org'=>$org
        ]);
    }
}
