<?php

namespace app\controllers;

use Yii;
use app\models\Orders;
use app\models\OrderItem;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\BadRequestHttpException;

class CartController extends Controller
{

    /**
    *檢查登入
    */
    public function beforeAction($action)
    {
        $info = Yii::$app->user->identity;
        $session = Yii::$app->session;
        // 登入導向
        if(Yii::$app->user->isGuest){
            Yii::$app->response->format = Response::FORMAT_JSON;
            $this->redirect('/session/login');
            return false;
        }
        return true;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCheckout()
    {
        $profile = Yii::$app->GeneralHelper->getMemberProfile();

        if(!$profile){
            $this->redirect('/session/login');
            return false;
        }
        return $this->render('checkout',['profile'=>$profile]);
    }

    public function actionProcess($type='product')
    {
        $inputs = Yii::$app->request->post();
        if(!$inputs['agree']){
            // set flash
            //not agreed
            \Yii::$app->session->setFlash('danger', '請先確認勾選同意服務條款');
            $this->redirect('/cart/checkout');
            return false;
        }
        $session = Yii::$app->session;
        $cart = $session['cart'][$type];
        if(isset($cart) && $cart['total_qty']){
            $connection = Yii::$app->db;
            $transaction = $connection->beginTransaction();
            try {
                $model = new Orders();
                $model->user_id =  Yii::$app->user->identity->id;
                $model->status = 0;
                $model->payment_status = 0;
                $model->payment_method = '轉帳匯款';
                $model->total_price = $cart['total_price'];
                $model->item_count = $cart['total_qty'];
                if(!($model->load(Yii::$app->request->post()) && $model->save()) ){
                    throw new \Exception('訂單新增失敗:'.var_dump($model->getErrors()));
                }
                if(isset($cart['items']) && $cart['items']){
                    foreach($cart['items'] as $index=>$item){
                        $itemModel = new OrderItem();
                        $itemModel->order_id = $model->id;
                        $itemModel->user_id = $model->user_id;
                        $itemModel->name = $item['name'];
                        $itemModel->price = $item['price'];
                        $itemModel->quantity = $item['qty'];
                        $itemModel->product_id = $item['id'];
                        $itemModel->total = $item['qty']*$item['price'];
                        if(!$itemModel->save()){
                            throw new \Exception('訂單品項新增失敗:'.$item['id'].'::'.print_r($itemModel).var_dump($itemModel->getErrors()));
                        }
                    }
                }

                $transaction->commit();
                //clear cart
                $cart['items'] = new \ArrayObject;
                $cart['total_price'] = 0;
                $cart['total_qty'] = 0;
                $cart['total_item_qty'] = 0;
                $session['cart'][$type] = $cart;
                \Yii::$app->session->setFlash('success', '訂單新增成功');
			}catch (\Exception $e) {
                \Yii::error("Fail save order:".$e->getMessage(), __METHOD__);
	            $transaction->rollBack();
                \Yii::$app->session->setFlash('danger', '訂單新增失敗');
                $this->redirect('/cart/checkout');
                return false;
	        }
        }else{
            // set flash
            //no item
            \Yii::$app->session->setFlash('danger', '無可結帳商品');
            $this->redirect('/cart/checkout');
            return false;
        }
        $this->redirect('/cart/finish');
    }

    public function actionFinish()
    {
        return $this->render('finish');
    }

}
