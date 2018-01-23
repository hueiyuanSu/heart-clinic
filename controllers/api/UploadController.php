<?php

namespace app\controllers\api;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\helpers\FileHelper;

class UploadController extends Controller
{
    public function beforeAction($action)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Yii::$app->user->isGuest){
            return array(
               'success' => false,
               'message'=>'尚未登入'
           );
        }
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionEditor() {
        $base_path = Yii::getAlias('@app');
        $web_path = Yii::getAlias('@web');
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstanceByName('file');
            $filename = $model->file->baseName.time();
            if ($model->validate()) {
                $local_folder = $base_path . '/web/files/editor/';
                FileHelper::createDirectory($local_folder, $mode = 0775, $recursive = true);
                $model->file->saveAs($local_folder . $filename . '.' . $model->file->extension);
            }
        }

        // Get file link
        $res = [
            'link' => $web_path . '/files/editor/' . $filename . '.' . $model->file->extension,
        ];

        return $res;
    }

    public function actionAvatar() {
        $base_path = Yii::getAlias('@app');
        $web_path = Yii::getAlias('@web');
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $local_folder = $base_path . '/web/files/avatar/';
            FileHelper::createDirectory($local_folder, $mode = 0775, $recursive = true);
            if(Yii::$app->request->post('avatar_base64')){
                $filteredData = explode(',', Yii::$app->request->post("avatar_base64"));
                $unencoded = base64_decode($filteredData[1]);
                $filename = time().'.png';
                file_put_contents($local_folder.$filename,$unencoded);
                return  array(
                    'success'=>true,
                    'link' => $web_path . '/files/avatar/' . $filename);
            }else{
                $model->file = UploadedFile::getInstanceByName('avatar');
                $filename = $model->file->baseName.time();
                $model->file->saveAs($local_folder . $filename . '.' . $model->file->extension);
                return  array(
                    'success'=>true,
                    'link' => $web_path . '/files/avatar/' . $filename . '.' . $model->file->extension
                );
            }

        }else{
            return  array(
                'success'=>false,
                'message'=>'method error',
                'link' => ''
            );
        }

    }
}
