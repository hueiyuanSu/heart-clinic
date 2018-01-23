<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Member;
use app\models\MemberSeach;
use app\db\Transaction;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\BadRequestHttpException;
use yii\web\Response;

class MemberController extends Controller
{

    /**
    *檢查登入
    */
    public function beforeAction($action)
    {
        $info = Yii::$app->user->identity;
        $session = Yii::$app->session;

        return true;
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionIndex(){
        if(Yii::$app->session['memberid'] == null){
            return $this->redirect(['member/login']);
        }else{
            $memberData = Member::find()->where(['member_number'=>Yii::$app->session['memberid']])->one();
            return $this->render('index',['member'=>$memberData]);
        }
    }
    public function actionLogin(){
        return $this->render('login');
    }
    public function actionCheck(){
        if (!Yii::$app->request->isAjax){
            throw new BadRequestHttpException("非法存取模式");
        }else{
            Yii::$app->response->format = Response::FORMAT_JSON;
            $email = Yii::$app->request->post('email');
            $password = Yii::$app->request->post('password');

            $checkData = Member::find()->where(['email'=>$email])->one();
            if($checkData){
                if(base64_decode($checkData->password)==$password){
                    return array('success' => true,'memberid' => $checkData->member_number);
                }else{
                    return array('success' => false);
                }
            }else{
                return array('success' => false);
            }
        }
    }
    public function actionCreate(){
        if (!Yii::$app->request->isAjax){
            throw new BadRequestHttpException("非法存取模式");
        }else{
            Yii::$app->response->format = Response::FORMAT_JSON;
            $MemberData = new Member();
            $member->member_number = "A".time();
            $MemberData->email = Yii::$app->request->post('email');
            $MemberData->account = Yii::$app->request->post('email');
            $MemberData->phone = Yii::$app->request->post('cellphone');
            $MemberData->password =base64_encode(Yii::$app->request->post('setting-password'));
            $MemberData->access = 1;
            $MemberData->save();
            return array('success' => true);
        }
        // return array('success'=>false);
    }
    public function actionUpdate(){
        if (!Yii::$app->request->isAjax){
            throw new BadRequestHttpException("非法存取模式");
        }else{
            Yii::$app->response->format = Response::FORMAT_JSON;
            $member = Member::find()->where(['member_number'=>Yii::$app->session['memberid']])->one();
            // print_r($member->valitate_number);

            if(Yii::$app->request->post('number') == $member->valitate_number){
                $member->email = Yii::$app->request->post('email');
                $member->account = Yii::$app->request->post('account');
                $member->password = base64_encode(Yii::$app->request->post('password'));
                $member->name = Yii::$app->request->post('name');
                $member->ssid = Yii::$app->request->post('ssid');
                $member->birth_date = Yii::$app->request->post('birth');
                $member->contact_address = Yii::$app->request->post('contact_address');
                $member->address = Yii::$app->request->post('address');
                $member->phone = Yii::$app->request->post('phone');
                $member->access = 1;
                $member->update();
                return array(
                    'success'=>true
                );
            }else{
                return array(
                    'success'=>false,
                    'message' => '驗證碼錯誤',
                );
            }

        }
    }
    public function actionTemp(){
        if (!Yii::$app->request->isAjax){
            throw new BadRequestHttpException("非法存取模式");
        }else{
            Yii::$app->response->format = Response::FORMAT_JSON;
            $member = Member::find()->where(['member_number'=>Yii::$app->session['memberid']])->one();
            $member->email = Yii::$app->request->post('email');
            $member->account = Yii::$app->request->post('account');
            $member->password = base64_encode(Yii::$app->request->post('password'));
            $member->name = Yii::$app->request->post('name');
            $member->ssid = Yii::$app->request->post('ssid');
            $member->birth_date = Yii::$app->request->post('birth');
            $member->contact_address = Yii::$app->request->post('contact_address');
            $member->address = Yii::$app->request->post('address');
            $member->phone = Yii::$app->request->post('phone');
            $member->access = 0;
            $member->update();
            return array('success'=>true);
        }
    }
    public function actionUpdatepass(){
        if(!Yii::$app->request->isAjax){
            throw new BadRequestHttpException("非法存取模式");
        }else{
            Yii::$app->response->format = Response::FORMAT_JSON;
            $member = Member::find()->where(['member_number'=>Yii::$app->session['memberid']])->one();
            $member->password = base64_encode(Yii::$app->request->post('password'));
            $member->update();
            return array('success'=>true);
        }
    }

    public function actionForget(){
        return $this->render('forget_pwd');
    }

}
