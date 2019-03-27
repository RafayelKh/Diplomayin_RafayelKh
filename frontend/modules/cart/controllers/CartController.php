<?php

namespace frontend\modules\cart\controllers;


use common\models\OrderList;
use Yii;
use common\models\CouponCodes;
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
    public function actionIndex($id = 0, $remove_id = 0)
    {
        $user_id = Yii::$app->user->id;

        if (!empty($remove_id)) {
            $remove_item = Cart::find()->where(['prod_id' => $remove_id])->andWhere(['user_id' => Yii::$app->user->id])->one();
            $remove_item->delete();
        }
        if (!Yii::$app->user->isGuest) {
            $id = intval($id);

            $cart = new Cart();
            $cart->prod_id = $id;
            $cart->user_id = $user_id;
            $cart->qty = 1;
            $cart->save();

            $prods = Cart::find()->with('prod')->where(['user_id' => Yii::$app->user->id])->asArray()->all();
            if (empty($prods)) {
                return $this->render('index', ['mes' => 'Cart is empty']);
            };

            $all_price = 0;
            foreach ($prods as $item) {
                if ($item['prod']['sale_price']) {
                    $all_price = $all_price + $item['prod']['sale_price'] * $item['qty'];
                } else {
                    $all_price = $all_price + $item['prod']['price'] * $item['qty'];
                }
            }

            return $this->render('index', ['prods' => $prods, 'all_price' => $all_price]);
        }
        return $this->render('index', ['mes' => 'Cart is empty']);
//        else{
//            $cookies = Yii::$app->request->cookies('cart');
//            if (!empty($cookies)){
//
//            }
//         }
    }

    public function actionCheckout()
    {
        $prods = Cart::find()->with('prod')->where(['user_id' => Yii::$app->user->id])->asArray()->all();
        $model = new CouponCodes();
        $modelInp = new OrderList();

        if ($modelInp->load(Yii::$app->request->post()) && $modelInp->validate()){

        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $code_finding = CouponCodes::find()->where(['code' => $model->code])->asArray()->one();
        }

        if ($model->qty == 0) {
            $model->is_active = 0;
        } else {
            $model->qty = $model->qty - 1;
        }

        $coupon = 15;
        $all_price = 0;
        $subtotalprice = 0;
        $subprice = 0;

        foreach ($prods as $item) {
            if (!empty($item['prod']['sale_price'])) {
                $all_price = $all_price + intval($item['prod']['sale_price']) * intval($item['qty']);
                $subtotalprice = $subtotalprice + intval($item['prod']['sale_price']) * intval($item['qty']);
            } else {
                $all_price = $all_price + intval($item['prod']['price']) * intval($item['qty']);
                $subtotalprice = $subtotalprice + intval($item['prod']['price']) * intval($item['qty']);
            }
        }
        if (!empty($code_finding)) {
            $subprice = $all_price * $coupon / 100;
        }
        $all_price = $all_price - $subprice;

        return $this->render('checkout', ['prods' => $prods, 'all_price' => $all_price, 'subtotal' => $subtotalprice, 'model' => $model, 'modelInp' => $modelInp]);
    }

}
