<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CouponCodes */

$this->title = 'Create Coupon Codes';
$this->params['breadcrumbs'][] = ['label' => 'Coupon Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coupon-codes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
