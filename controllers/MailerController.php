<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use app\models\Member;
use app\models\MemberSeach;


/**
* Sanding mail
* Class MailController
* @package app\commands
*/
class MailerController extends Controller
{
    private $from = 's0261020@gm.ncue.edu.tw';

    public function actionIndex()
    {
        if (!Yii::$app->request->isAjax){
            throw new BadRequestHttpException("非法存取模式");
        }else{
            Yii::$app->response->format = Response::FORMAT_JSON;
            $customer_mail = Yii::$app->request->post('Data_mail');
            $validate_number =  rand(100000,999999);
            $member = Member::find()->where(['email'=>$customer_mail])->one();
            $member->valitate_number = $validate_number;
            $member->save();

            Yii::$app->mailer->compose()
                    ->setFrom([$this->from=>"中華資深人力發展協會"])
                    ->setTo($customer_mail)
                    ->setSubject('中華資深人力發展協會 | SEDA 驗證碼 E-mail 訊息')
                    ->setHtmlBody('<p><h3>你的SEDA平台認證碼為 '.$validate_number.'。<br>
                                        請將此驗證碼輸入到驗證欄位進行驗證<br>
                                        提醒您，請勿將此驗證碼提供給其他人以保障您的使用安全。<h3></p>
                                    <p><h5>社團法人中華人力資源管理協會 Copyright @ 2008 Chinese Human Resource Management Association. All Right Reserved.<br>
                                    聯絡地址：台北市100中正區懷寧街110號5樓 <br>服務時間： 星期一至星期五　上午09:00 ~ 12:00 下午13:00 ~ 18:00 <br>
                                    客服專線：02-2382-5448 傳真：02-2382-5448</h5></p>')
                    ->send();


            return array('success'=>true);
        }
    }
}
