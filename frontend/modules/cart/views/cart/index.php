<?php
// echo "<pre>";
// var_dump($prods);
// die;
?>
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <?php if (!empty($mes)) {
                        echo "<h1>$mes</h1>";
                        return false;
                    }
                    ?>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-name">Product Name</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-total">Total</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        \yii\widgets\Pjax::begin(['enablePushState' => false]);
                        if (!empty($prods)) {
                            foreach ($prods as $row) {
                                ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <?php if (!empty($row['prod']['image'])) { ?>
                                            <img src="<?= \yii\helpers\Url::to('@web') ?>/images/products/<?= $row['prod']['image'] ?>"
                                                 alt="Image" class="img-fluid">
                                        <?php } else { ?>
                                            <img src="<?= \yii\helpers\Url::to('@web') ?>/images/default.jpg"
                                                 alt="Image" class="img-fluid">
                                        <?php } ?>

                                    </td>
                                    <td class="product-name">
                                        <a href="<?= \yii\helpers\Url::to('@web') ?>/shop/prod/<?= $row['prod']['id'] ?>"><h2 class="mystyle text-black"><?= $row['prod']['title'] ?></h2></a>

                                    </td>
                                    <td>
                                        <?php if (!empty($row['prod']['sale_price'])) { ?>
                                            <h2>$<?= $row['prod']['sale_price'] ?></h2>
                                        <?php } else { ?>
                                            <h2>$<?= $row['prod']['price'] ?></h2>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class="input-group mb-3" style="max-width: 120px;">
                                            <?php $count = \yii\widgets\ActiveForm::begin(); ?>
                                               <?= $count->field($qty, 'qty')->textInput(['value' => $row['qty']]) ?>
                                               <?= $count->field($qty, 'prod_id')->hiddenInput(['value' => $row['prod_id']])->label(''); ?>
                                            <?php \yii\widgets\ActiveForm::end(); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if (!empty($row['prod']['sale_price'])) { ?>
                                            <h2>$<?= $row['prod']['sale_price'] * $row['qty'] ?></h2>
                                        <?php } else { ?>
                                            <h2>$<?= $row['prod']['price'] * $row['qty'] ?></h2>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= \yii\helpers\Url::to('@web') ?>/cart/remove/<?= $row['prod']['id'] ?>"
                                           id="remove_item" class="btn btn-primary btn-sm">X</a></td>
                                </tr>
                                <?php

                            };
                        };
                        \yii\widgets\Pjax::end();
                        ?>

                        </tbody>
                    </table>
                </div>
            </form>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <form action="<?= \yii\helpers\Url::to('@web') ?>/cart">
                            <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form action="<?= \yii\helpers\Url::to('@web') ?>/shop">
                            <button class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                            </div>
                        </div>
                        <div class="row mb-5 font-size">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black"><?= $all_price ?> $</strong>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?= \yii\helpers\Url::to('@web') ?>/checkout">
                                    <button class="btn btn-primary btn-lg py-3 btn-block">Proceed To Checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
