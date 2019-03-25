<?php
namespace  frontend\modules\product\controllers;
use Yii;

use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use common\models\Product;
use yii\widgets\Pjax;
use frontend\modules\product\models\Categories;
use frontend\modules\product\models\Brand;
use frontend\modules\product\models\Prodcomment;

/**
 *
 */
class ProductsController extends Controller
{
    public function actionIndex($cat_id = 0)
    {

        $product = Product::find()->with(['brand', 'cat']);
        $search = Yii::$app->request->get('s');
        $cat = Categories::find()->limit(3)->asArray()->all();

        $pagination = new Pagination(['totalCount' => $product->count(),'pageSize' => 6]);

        if (!empty($search)){
            $product = $product->where(['LIKE', 'title', $search]);
        }
        if (!empty($cat_id)){
            $product = $product->where(['cat_id' => $cat_id]);
        }

        $product = $product->offset($pagination->offset)->limit($pagination->limit);
        $product = $product->asArray()->all();

        return $this->render('index',['product' => $product,'cat' => $cat, 'pagination' => $pagination]);

    }

    public function actionProduct($id)
    {
        // var_dump($_GET);

        $one_product = Product::find()->where(['id' => $id])->asArray()->one();
        $product = Product::find()->limit(3)->asArray()->all();
        $comments = Prodcomment::find()->where(['prod_id' => $id])->with(['user'])->asArray()->all();

        
        $model = new Prodcomment();
        $model->user_id = \Yii::$app->user->id;
        $model->prod_id = $id;
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            return $this->refresh();
        }

        return $this->render('product',['product' => $one_product,'products' => $product,'comments' => $comments,'model' => $model]);
    }
}
