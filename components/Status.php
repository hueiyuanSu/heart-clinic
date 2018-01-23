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
    function stop_status($param){
        $data = array(
            '0' => Yii::t('app','Not Stopped'),
            '1' => Yii::t('app','Stopped'),
        );

        return $data[$param];
    }
    function confirmed_status($param){
        $data = array(
            '0' => Yii::t('app','Not Confirmed'),
            '1' => Yii::t('app','Confirmed'),
        );

        return $data[$param];
    }
}
