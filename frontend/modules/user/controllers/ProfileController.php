<?php

namespace frontend\modules\user\controllers;

use app\models\Cart;
use app\models\Product;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\User;
use common\models\OrderList;

/**
 * Default controller for the `user` module
 */
class ProfileController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest){
            $this->redirect(Url::to('@web'));
        }
        $last_orders = OrderList::find()->where(['user_id' => \Yii::$app->user->id])->asArray()->all();
        $prods = Cart::find()->with('prod')->where(['user_id' => \Yii::$app->user->id])->asArray()->all();
        $user_info = User::find()->where(['id' => \Yii::$app->user->id])->asArray()->one();
        $user = new User();

        return $this->render('index', ['user_info' => $user_info,'mini_cart' => $prods,'last_orders' => $last_orders,'user' => $user]);

    }
    public function actionDelete()
    {
        $last_orders = OrderList::find()->where(['user_id' => \Yii::$app->user->id])->asArray()->all();
        $prods = Cart::find()->with('prod')->where(['user_id' => \Yii::$app->user->id])->asArray()->all();
        $user_info = User::find()->where(['id' => \Yii::$app->user->id])->asArray()->one();
        $user_del = User::find()->where(['id' => \Yii::$app->user->id])->one();
        $user = new User();

        if ($user_del['username'] == \Yii::$app->request->get('username')){
            $user_del->delete();
            $this->redirect(Url::to('@web'));
        }else{
            $this->redirect(Url::to('@web/user'));
        }

        return $this->render('index', ['user_info' => $user_info,'mini_cart' => $prods,'last_orders' => $last_orders,'user' => $user]);
    }
}
