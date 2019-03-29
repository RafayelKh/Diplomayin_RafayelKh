<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

            'id',
            'title',
//            'description:ntext',
//            'slug',
            [
                'attribute' => 'Category',
                'value' => function ($cat) {
                    return $cat['cat']['title'];
                }
            ],
            [
                'attribute' => 'Brand',
                'value' => function ($cat) {
                    return $cat['brand']['title'];
                }
            ],
            //'price',
            //'sale_price',
            //'is_new',
            //'is_featured',
            'stock',
            //'parent_id',
            //'options:ntext',
            //'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
