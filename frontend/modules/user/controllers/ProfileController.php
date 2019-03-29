<?php

namespace frontend\modules\user\controllers;

use app\models\Cart;
use app\models\Product;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\User;

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
        $prods = Cart::find()->with('prod')->where(['user_id' => \Yii::$app->user->id])->asArray()->all();
        $user_info = User::find()->where(['id' => \Yii::$app->user->id])->asArray()->one();

        return $this->render('index', ['user_info' => $user_info,'mini_cart' => $prods]);

    }
}
