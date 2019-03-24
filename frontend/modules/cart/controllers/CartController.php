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
        $user_id = Yii::$app->user->id;

        if (!empty($remove_id)) {
                $remove_item = Cart::find()->where(['prod_id' => $remove_id])->andWhere(['user_id' => Yii::$app->user->id])->one();
                $remove_item->delete();
        }
        if(!Yii::$app->user->isGuest){
            $id = intval($id);

            $cart = new Cart();
            $cart->prod_id = $id;
            $cart->user_id = $user_id;
            $cart->qty = 1;
            $cart->save();

            $prods = Cart::find()->with('prod')->where(['user_id' => Yii::$app->user->id])->asArray()->all();
            if (empty($prods)) {
                return $this->render('index', ['mes' => 'Cart is empty']);
            }

            return $this->render('index', ['prods' => $prods]);
        }
            return $this->render('index', ['mes' => 'Cart is empty']);
//        else{
//            $cookies = Yii::$app->request->cookies('cart');
//            if (!empty($cookies)){
//
//            }
//         }
    }

}
