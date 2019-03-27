<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FavoritesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Favorites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favorites-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'custom'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Image',
                'value' => function ($product) {
                    return Html::img(Url::to('/Diplomayin_RafayelKh/frontend/web/images/products/'. $product['prod']['image']), ['width' => '80px']);
                }
            ],
            [
                'attribute' => 'Title',
                'value' => function ($data) {
                    return $data['prod']['title'];
                }
            ],
            [
                'attribute' => 'Description',
                'value' => function ($data) {
                    return $data['prod']['description'];
                }
            ],
            [
                'attribute' => 'Category',
                'value' => function ($data) {
                    return $data['prod']['cat']['title'];
                }
            ],
            [
                'attribute' => 'Brand',
                'value' => function ($data) {
                    return $data['prod']['brand']['title'];
                }
            ],
            [
                'attribute' => 'Price',
                'value' => function ($data) {
                    if (!empty($data['prod']['sale_price'])) {
                        return $data['prod']['sale_price'];
                    } else {
                        return $data['prod']['price'];
                    }
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['width' => '80'],
                'template' => '{delete} {update} {film}',
                'buttons' => [
                    'film' => function ($url, $model, $key) {
                        $url = \yii\helpers\Url::to(['/favorites/cart/' . $model->id]);

                        return Html::a('<span class="glyphicon glyphicon-film"></span>', $url);
                    },
                ],

            ],
        ],
    ]); ?>
</div>
