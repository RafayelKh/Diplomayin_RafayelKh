<?php

namespace frontend\modules\user\controllers;

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
        $user_info = User::find()->where(['id' => \Yii::$app->user->id])->asArray()->one();

        return $this->render('index', ['user_info' => $user_info]);
    }
}
