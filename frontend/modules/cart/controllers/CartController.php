<?php

namespace  frontend\modules\cart\controllers;
use Yii;

use common\models\Products;
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
        $cart_prods = Cart::find()->where(['user_id' => Yii::$app->user->id])->asArray()->all();
         echo "<pre>";
         var_dump($cart_prods);
         die;
        $prods = Products::find()->where(['id' => $cart_prods[0]['prod_id']])->asArray()->all();
        // echo "<pre>";
        // var_dump($cart_prods);
        // var_dump($prods);
        // die;

        return $this->render('index', ['cart' => $cart_prods, 'prod' => $prods]);
    }

    public function actionAdd()
    {

    }

}
