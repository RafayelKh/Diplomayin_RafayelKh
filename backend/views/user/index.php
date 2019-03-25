<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function($data){
                    if ($data['status'] == 0){
                        return 'Inative';
                    }else{
                        return 'Active';
                    }
                }
            ],
            'created_at:datetime',
            //'updated_at',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>'',
                    'headerOptions' => ['width' => '80'],
                    'template' => ' {view} {delete} {update}',
                ],
            ],

    ]); ?>
</div>
