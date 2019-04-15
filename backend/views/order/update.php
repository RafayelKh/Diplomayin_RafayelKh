<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderList */

$this->title = 'Update Order List: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Order Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
