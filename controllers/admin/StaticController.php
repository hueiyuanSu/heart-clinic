<?php

namespace app\controllers\admin;

use Yii;
use app\models\User;
use app\models\UserSearch;
use app\models\Staticpage;
use app\models\StaticpageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\BadRequestHttpException;
use yii\db\StaleObjectException;
use yii\web\Response;


/**
 * MemberController implements the CRUD actions for User model.
 */
class StaticController extends Controller
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

    public function beforeAction($action)
    {
        $info = Yii::$app->user->identity;
        $session = Yii::$app->session;
        // 登入導向
        if(Yii::$app->user->isGuest){
            $this->redirect(['/user/login']);
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */

    public function actionConference()
    {
        return $this->render('conference');
    }

    public function actionContact()
    {
        try{
            $datalist = Staticpage::find()->where(['category' => '聯絡我們'])->one();
            return $this->render('contact',['datalist'=>$datalist]);
        }catch(StaleObjectException $e) {
            print_r("目前有人正在更新中..");
        }
    }

    // public function actionEditor()
    // {
    //     return $this->render('editor');
    // }

    // public function actionInformation()
    // {
    //     return $this->render('information');
    // }

    public function actionOrganization()
    {
        try{
            $datalist = Staticpage::find()->where(['category' => '組織介紹'])->one();
            return $this->render('organization',['datalist'=>$datalist]);
        }catch(StaleObjectException $e){
            print_r("目前正在有人更新中..");
        }
    }

    // public function actionService()
    // {
    //     return $this->render('service');
    // }

    // public function actionSupply()
    // {
    //     return $this->render('supply');
    // }

    // public function actionTeam()
    // {
    //     return $this->render('team');
    // }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($editor)
    {
        $confirm = Staticpage::find()->where(['category'=>'聯絡我們'])->one();
        if($confirm){
            $confirm->content = $editor;
            $confirm->update();
        }else{
            $pagedata = new Staticpage();
            $pagedata->category = '聯絡我們';
            $pagedata->content = $editor;
            $pagedata->save();
        }

        return $this->redirect(['admin/static/contact']);
    }

    public function actionOrgcreate($editor){
        $confirm = Staticpage::find()->where(['category'=>'組織介紹'])->one();
        if($confirm){
            $confirm->content = $editor;
            $confirm->update();
        }else{
            $pagedata = new Staticpage();
            $pagedata->category = '組織介紹';
            $pagedata->content = $editor;
            $pagedata->save();
        }

        return $this->redirect(['admin/static/organization']);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Member::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
