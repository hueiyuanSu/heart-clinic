<?php

namespace app\models;
use dektrium\user\models\User as BaseUser;
use Yii;
class User extends BaseUser
{

    public function getMemberProfile()
    {
        return $this->hasOne(MemberProfile::className(), ['user_id' => 'id']);
    }

    public function getRoleName()
    {
        $roles = Yii::$app->authManager->getRolesByUser($this->id);

        if (!$roles) {
            return null;
        }

        reset($roles);
        // print_r($roles);
        /* @var $role \yii\rbac\Role */
        $role = current($roles);
        return $role->name;
    }

    public function checkRoleName($name)
    {
        $roles = Yii::$app->authManager->getRolesByUser($this->id);

        if (!$roles) {
            return null;
        }
        reset($roles);
        /* @var $role \yii\rbac\Role */
        $role = current($roles);
        return ($role->name==$name)? true : false;
    }

    public function getAuthAssignment()
    {
        return $this->hasOne(AuthAssignment::className(), ['user_id' => 'id']);
    }


}
