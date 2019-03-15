<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\product\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'cat_id')->dropDownList($categories,['prompt' => 'Choose category']) ?>

    <?= $form->field($model, 'brand_id')->dropDownList($brands,['prompt' => 'Choose brand']) ?>

    <?= $form->field($model, 'price')->textInput(['type' =>'number']) ?>

    <?= $form->field($model, 'sale_price')->textInput(['type' =>'number']) ?>

    <?= $form->field($model, 'is_new')->dropDownList(['0'=>'No','1'=>'Yes']) ?>

    <?= $form->field($model, 'is_featured')->dropDownList(['0'=>'No','1'=>'Yes']) ?>

    <?= $form->field($model, 'stock')->textInput(['type' =>'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
