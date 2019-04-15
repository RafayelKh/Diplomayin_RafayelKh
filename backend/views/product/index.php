<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Image',
                'format' => 'raw',
                'value' => function ($product) {

                    if (!empty($product['image'])){
                        return Html::img(Url::to('/Diplomayin_RafayelKh/frontend/web/images/products/' . $product['image']), ['width' => '80px']);
                    }else{
                        return Html::img(Url::to('/Diplomayin_RafayelKh/frontend/web/images/default.jpg'), ['width' => '80px']);
                    }

                }
            ],
            'id',
            'title',
//            'description:ntext',
//            'slug',

            [
                'attribute' => 'Brand',
                'value' => function ($cat) {
                    return $cat['brand']['title'];
                }
            ],
            [
                'attribute' => 'Category',
                'value' => function ($cat) {
                    return $cat['cat']['title'];
                }
            ],
            //'price',
            //'sale_price',
            //'is_new',
            //'is_featured',
            'stock',
            'date_upload',
            //'parent_id',
            //'options:ntext',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
