<?php

namespace app\controllers;

use Yii;
use app\models\Courses;
use app\models\Banners;
use app\models\CourseSchedule;
use app\models\Products;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Member;
use app\models\MemberSeach;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\BadRequestHttpException;

class IndexController extends Controller
{



    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($memberid=null)
    {
        if($memberid){
            Yii::$app->session['memberid'] = $memberid;
            $mem = Member::find()->where(['member_number'=>$memberid])->one();
            Yii::$app->session['membername'] = $mem->name;
        }
        $data = array(
            'banners'=> Banners::find()->online()->all()
        );


        return $this->render('index', $data);
    }




    public function actionLogout(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->session['memberid'] = null;
        Yii::$app->session->close();
        return array('success'=>true);
    }
}
