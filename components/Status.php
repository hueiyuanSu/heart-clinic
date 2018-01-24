<?php
namespace app\components;

use Yii;

class Status {
    function sex_status($param){
        $data = array(
            '0' => Yii::t('app','Female'),
            '1' => Yii::t('app','Male'),
        );

        return $data[$param];
    }
    function disease_status($param){
        $data = array(
            '1' => '內診',
            '2' => '針灸',
            '3' => '傷科',
        );

        return $data[$param];
    }
}
