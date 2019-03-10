<?php
namespace  frontend\controllers;
use Yii;

use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use common\models\Product;
use common\models\Categories;
use common\models\Brand;

/**
 *
 */
class ProductsController extends Controller
{
    public function actionIndex()
    {
        // TODO: ->with(['catgories','brand']) don`t working

        $product = Product::find()->asArray()->all();

        return $this->render('index',['product' => $product]);

    }

    public function actionProduct()
    {
        // var_dump($_GET);

        $one_product = Product::find()->where(['id' => '1'])->asArray()->one();
        $product = Product::find()->asArray()->all();

        return $this->render('product',['product' => $one_product,'foreach' => $product]);
    }




}
