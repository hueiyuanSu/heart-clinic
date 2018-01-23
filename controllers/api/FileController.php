<?php

namespace app\controllers\api;

use Yii;
use app\models\File;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\helpers\ArrayHelper;

class FileController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex($scope=null, $id=null)
    {
        if (!Yii::$app->request->isAjax) {
            throw new BadRequestHttpException("非法存取模式");
        }else{
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = File::find()->where(['scope'=>$scope, 'scope_id'=>$id])->orderBy('createTime DESC')->all();
            $modelArray = ArrayHelper::toArray($model, [
                'app\models\File' => [
                    'id',
                    'file_name',
                    'url',
                    'type',
                    'others',
                    'note',
                    'createTime' => function($file) {
                        return Yii::$app->formatter->asTime($file->createTime, 'php:Y-m-d H:i');
                    },
                    'admin'=>function(){
                        if( Yii::$app->user->identity->isAdmin){
                            return true;
                        }else{
                            return false;
                        }
                        if( Yii::$app->user->identity->isAdmin || Yii::$app->user->identity->checkRoleName('manager')){
                            return true;
                        }else{
                            return false;
                        }
                    }
                ],
            ]);
            return array(
                'success'=>true,
                'content'=>$modelArray
            );

        }
    }


    public function actionCreate()
    {
        $model = new File(['scenario' => File::SCENARIO_CREATE]);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            $model->uploadFile = UploadedFile::getInstance($model, 'uploadFile');
            $channelFileInput = Yii::$app->request->post('File');
            if ($model->uploadFile) {
                // $uuid4 = Uuid::uuid4();
                $newFileName = str_replace('.'.$model->uploadFile->extension,'',$model->uploadFile->name).'-'.time().'.'.$model->uploadFile->extension;
                $model->file_name = $model->uploadFile->name;
                $path = 'files/'.$channelFileInput['scope'].'/'.$channelFileInput['scope_id'];
                FileHelper::createDirectory($path, $mode = 0775, $recursive = true);
                $model->url = 'files/'.$channelFileInput['scope'].'/'.$channelFileInput['scope_id'].'/'.$newFileName;
                if ($model->upload($error)) {
        	        $res = array(
    	            	'success' => true,
                        'message' =>'上傳檔案成功'
 	            	);
                }
                else {
    	            $res = array(
    	            	'success' => false,
                        'message' =>'上傳檔案失敗',
                        'detail' => $error['uploadFile'][0],
        	    	);
                }
            } else {
	            $res = array(
    	        	'success' => false,
                    'message' =>'上傳檔案失敗',
                    'detail' => '沒有上傳檔案',
                    // 'extra'=>$model->uploadFile
    	    	);
            }

    		Yii::$app->response->format = Response::FORMAT_JSON;
            return $res;
        }
    }

    public function actionDelete($id=null)
    {
        if (!Yii::$app->request->isAjax) {
            throw new BadRequestHttpException("非法存取模式");
        }else{
            $model = File::findOne(Yii::$app->request->post('id'));
            if($model){
                if(file_exists(Yii::getAlias('@webroot') . '/'.$model->url)){
                    unlink(Yii::getAlias('@webroot') . '/'.$model->url);
                    $model->delete();
                    $res = array(
        	        	'success' => true,
                        'message' =>'刪除成功'
        	    	);
                }else{
                    $res = array(
        	        	'success' => false,
                        'message' =>'檔案路徑錯誤',
                        'url'=>Yii::getAlias('@webroot') .'/'.$model->url
        	    	);
                }
            }else{
                $res = array(
    	        	'success' => false,
                    'message' =>'檔案不存在',
    	    	);
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $res;
        }

    }

}
