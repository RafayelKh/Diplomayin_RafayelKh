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


class CartController extends Controller
{
    public function actionIndex()
    {
        if (!(Yii::$app->user->isGuest)) {
            $prods = Cart::find()->with('prod')->where(['user_id' => Yii::$app->user->id])->asArray()->all();

            // echo "<pre>";
            // var_dump($cart_prods);
            // var_dump($prods);
            // die;

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

    public function actionAdd()
    {

    }

}
