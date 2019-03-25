<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Favorites */

$this->title = 'Create Favorites';
$this->params['breadcrumbs'][] = ['label' => 'Favorites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favorites-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
