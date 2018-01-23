<?php
namespace app\components;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Session;
use app\models\MemberProfile;
/**

**/
class GeneralHelper
{
    /* 獲取ip address */
    function checkAddress(){
        $session = Yii::$app->session;
        if( !isset($session['user_ip']) ){
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
               $myIp = $_SERVER['HTTP_CLIENT_IP'];
            }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
               $myIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
               $myIp= $_SERVER['REMOTE_ADDR'];
            }
        }
        // if()
        return $myIp;
        // return $this->isLocal;

    }

    /* 獲取角色名稱 */
    public function getRoleName()
    {
        $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->id);
        if (!$roles) {
            return null;
        }

        reset($roles);
        /* @var $role \yii\rbac\Role */
        $role = current($roles);

        return $role->name;
    }

    public function getMemberProfile()
    {
        if(!Yii::$app->user->isGuest){
            $profileModel = MemberProfile::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
            // create member_profile
            if(!$profileModel){
                $profileModel = new MemberProfile();
                $profileModel->user_id = Yii::$app->user->identity->id;
                $profileModel->save();
            }
            return $profileModel;
        }else{
            return false;
        }

    }

}
