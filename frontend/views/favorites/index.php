<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FavoritesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Favorites';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favorites-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Title',
                'value' => function($data){
                    return $data['prod']['title'];
                }
            ],
            [
                'attribute' => 'Description',
                'value' => function($data){
                    return $data['prod']['description'];
                }
            ],
            [
                'attribute' => 'Category',
                'value' => function($data){
                    return $data['prod']['cat']['title'];
                }
            ],
            [
                'attribute' => 'Brand',
                'value' => function($data){
                    return $data['prod']['brand']['title'];
                }
            ],
            [
                'attribute' => 'Price',
                'value' => function($data){
                    return $data['prod']['price'];
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
