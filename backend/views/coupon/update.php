<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CouponCodes */

$this->title = 'Update Coupon Codes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coupon Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coupon-codes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
