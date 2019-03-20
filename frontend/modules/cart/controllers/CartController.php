<?php

namespace frontend\modules\cart\controllers;

use Yii;

use common\models\Product;
use common\models\Cart;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Cookie;


class CartController extends Controller
{
    public function actionIndex()
    {
        if (!(Yii::$app->user->isGuest)) {
            $prods = Cart::find()->with('prod')->where(['user_id' => Yii::$app->user->id])->asArray()->all();
            if (!empty($prods)){
                return $this->render('index',['mes' => 'Cart is empty']);
            }
            return $this->render('index', ['prods' => $prods]);
        }else{
            $cookie_prods = [];
            if (Yii::$app->getRequest()->getCookies()->has('cart_prods')) {
                $cookie_prods = Yii::$app->getRequest()->getCookies()->has('cart_prods');
            }else{
                return $this->render('index',['mes' => 'Cart is empty']);
            }

            return $this->render('index', ['prods' => $cookie_prods]);
        }
    }
/*
    public function actionAdd($id)
    {
        if(!Yii::$app->user->isGuest){
            $cart = new Cart();
            $cart->prod_id = $id;
//            $cart->user_id = Yii::$app->user->id;
            //add qty
             $cart->save();
        }else{
            $cookie = Yii::$app->request->cookies;
            $cookie->add(new Cookie([
                'name' =>
            ]));
        }
    }
*/
}
