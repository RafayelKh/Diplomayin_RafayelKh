<?php
namespace  frontend\modules\product\controllers;
use common\models\Cart;
use common\models\Image;
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
    public function actionIndex($cat_id = 0,$br_id = 0,$action = 0)
    {

        $product = Product::find()->with(['brand', 'cat']);
        $search = Yii::$app->request->get('s');
        $cat = Categories::find()->limit(3)->asArray()->all();
        $brands = Brand::find()->limit(3)->asArray()->all();

        $pagination = new Pagination(['totalCount' => $product->count(),'pageSize' => 6]);

        if (!empty($search)){
            $product = $product->where(['LIKE', 'title', $search]);
        }
        if (!empty($cat_id)){
            $product = $product->where(['cat_id' => $cat_id]);
        }
        if (!empty($br_id)){
            $product = $product->where(['brand_id' => $br_id]);
        }
        if ($action == 'newBeginning'){
            $product = $product->orderBy(['date_upload' => SORT_DESC]);
        }
        if ($action == 'newEnd'){
            $product = $product->orderBy(['date_upload' => SORT_ASC]);
        }
        if ($action == 'lowHigh'){
            $product = $product->orderBy(['price' => SORT_ASC]);
        }
        if ($action == 'highLow'){
            $product = $product->orderBy(['price' => SORT_DESC]);
        }

        $product = $product->offset($pagination->offset)->limit($pagination->limit);
        $product = $product->asArray()->all();

        return $this->render('index',['product' => $product,'cat' => $cat, 'pagination' => $pagination,'brands' => $brands]);

    }

    public function actionProduct($id)
    {
        // var_dump($_GET);

        $one_product = Product::find()->where(['id' => $id])->asArray()->one();
        $product = Product::find()->where(['is_featured' => 1])->limit(3)->asArray()->all();
        $prod_images = Image::find()->where(['prod_id' => $id])->asArray()->all();
        $comments = Prodcomment::find()->where(['prod_id' => $id])->orderBy(['id' => SORT_DESC])->with(['user'])->asArray()->all();
        $product_model = new Cart();
        
        $model = new Prodcomment();
        $model->user_id = \Yii::$app->user->id;
        $model->prod_id = $id;
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            return $this->refresh();
        }

        return $this->render('product',['product' => $one_product,'products' => $product,'comments' => $comments,'model' => $model,'prod_model' => $product_model,'images' => $prod_images]);
    }
}
