<?php

namespace app\controllers\api;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;
/*
cart[
    'product'=>[
        'items'=>[][
            'id'=>0,
            'name'=>'zzz',
            'qty'=>0,
            'price'=>0,
            'avatar'=>'url'
        ],
        'total_price'=>0,
        'total_qty'=>0,
        'total_item_qty'=>0,
        'shipfee'=>0
    ],
    'course'=>......
]
*/
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
            return array(
                'success'=>'false',
                'message'=>'請先登入'
            );
        }
        if (!Yii::$app->request->isAjax) {
            throw new BadRequestHttpException("非法存取模式");
            return false;
        }
        if(!isset($session['cart'])){
            $session['cart'] = new \ArrayObject;
        }
        return true;
    }

    /*
    新增至購物車
    */
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $session = Yii::$app->session;
        return array(
            'success'=>true,
            'cart'=>$session['cart']
        );
    }
    /*
    新增至購物車
    */
    public function actionAddItem($type='product')
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $session = Yii::$app->session;
        $new_item = Yii::$app->request->post('item');
        $cart = $session['cart'];
        $exist=false;
        if(isset($cart[$type]['items']) && sizeof($cart[$type]['items'])){
            foreach($cart[$type]['items'] as $index=>$item){
                if($item['id']==$new_item['id']){
                    $cart[$type]['items'][$index]['qty'] = $item['qty']+$new_item['qty'];
                    $exist=true;
                }
            }

        }
        if(!$exist){
            $cart[$type]['items'][] = $new_item;
        }
        $this->calTotal($cart);
        $session['cart'] = $cart;
        return array(
            'success'=>true,
            'cart'=>$session['cart']
        );
    }
    /*
    更新購物車
    */
    public function actionUpdateCart($type='product')
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $items = Yii::$app->request->post('items');
        if(!$items){
            return array(
                'success'=>false,
                'message'=>'無更新品項'
            );
        }else{
            $session = Yii::$app->session;
            $cart = $session['cart'];
            $cart[$type]['items'] = $items;
            $this->calTotal($cart);
            $session['cart'] = $cart;
            return array(
                'success'=>true,
                'cart'=>$session['cart']
            );
        }
        return array(
            'success'=>true,
            'cart'=>$session['cart']
        );
    }
    /*
    移除物品
    */
    public function actionRemoveItem($type='product')
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = (Yii::$app->request->post('item_id'))? Yii::$app->request->post('item_id') : 0;
        if(!$id){
            return array(
                'success'=>false,
                'message'=>'無刪除資料'
            );
        }else{
            $session = Yii::$app->session;
            $cart = $session['cart'];
            if( isset($cart[$type]['items']) ){
                $items = $cart[$type]['items'];
                $removeIndex = -1;
                foreach($items as $index=>$item){
                    if($item['id']==$id){
                        $removeIndex = $index;
                    }
                }
                if($removeIndex != -1){
                    unset($items[$removeIndex]);
                }

                $cart[$type]['items'] = $items;
                $this->calTotal($cart);
                $session['cart'] = $cart;
                return array(
                    'success'=>true,
                    'cart'=>$session['cart']
                );
            }else{
                return array(
                    'success'=>false,
                    'message'=>'購物車無此商品'
                );
            }
        }
    }
    /*
    清空購物車
    */
    public function actionEmptyCart($type='product')
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $session = Yii::$app->session;
        $cart = $session['cart'];
        $cart[$type]['items'] = new \ArrayObject;
        $cart[$type]['total_price'] = 0;
        $cart[$type]['total_qty'] = 0;
        $cart[$type]['total_item_qty'] = 0;
        return array(
            'success'=>true,
            'cart'=>$session['cart']
        );
    }

    private function calTotal(&$cart)
    {
        if(isset($cart) && $cart){
            foreach($cart as $key=>$type_cart){
                $total_price = 0;
                $total_qty = 0;
                $total_item_qty = 0;
                $shipfee = 0;
                if(isset($type_cart['items']) && $type_cart['items']){
                    foreach($type_cart['items'] as $index=>$item){
                        $total_price+=$item['price']*$item['qty'];
                        $total_item_qty++;
                        $total_qty = $total_qty+$item['qty'];
                    }
                }
                // calculate ship fee
                //$shipfee = Yii::$app->CartHelper->calShipfee($total_price);
                
                $cart[$key]['total_price'] = $total_price;
                $cart[$key]['total_qty'] = $total_qty;
                $cart[$key]['total_item_qty'] = $total_item_qty;
                $cart[$key]['shipfee'] = $shipfee;
            }

        }
    }

}
