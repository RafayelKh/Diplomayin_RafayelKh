<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\product\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php
    if(!empty($model->image)){
        echo Html::img(\yii\helpers\Url::to('/php/shop1/frontend/web/images/products/'.$model->image),['width' => '80px']);
    }
    $images = $model->getImages()->asArray()->all();
    if(!empty($images)){
        foreach ($images as $image){
            echo Html::img(\yii\helpers\Url::to('/php/shop1/frontend/web/images/products/'.$image['image']),['width' => '80px']);
        }
    }
    ?>

    <?= $form->field($model, 'image[]')->fileInput(['multiple' => 'multiple', 'accept' => 'image/*']) ?>

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
