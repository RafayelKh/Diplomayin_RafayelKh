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
    public function actionIndex($id = 0,$remove_id = 0)
    {
        if (!empty($remove_id)){
            $remove_item = Cart::find()->where(['prod_id' => $remove_id])->andWhere(['user_id' => Yii::$app->user->id])->one();
            $remove_item->delete();
        }
        if(!Yii::$app->user->isGuest){
            $id = intval($id);

            $cart = new Cart();
            $cart->prod_id = $id;
            $cart->user_id = Yii::$app->user->id;
            $cart->qty = 1;
            $cart->save();

            $prods = Cart::find()->with('prod')->where(['user_id' => Yii::$app->user->id])->asArray()->all();
            if (empty($prods)){
                return $this->render('index',['mes' => 'Cart is empty']);
            }

            return $this->render('index', ['prods' => $prods]);
        }

        else{
            $cookie_prods = [];
            if (Yii::$app->request->cookies->has('cart_prods')) {
                $cookie_prods = Yii::$app->request->cookies->get('cart_prods');
            }else{
                return $this->render('index',['mes' => 'Cart is empty']);
            }

            return $this->render('index', ['prods' => $cookie_prods]);
        }
    }

}
