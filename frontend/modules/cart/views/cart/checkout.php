<div style="font-size: 15px" class="site-section">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <?php \yii\widgets\ActiveForm::begin(); ?>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                <th>Product</th>
                                <th>Total</th>
                                </thead>
                                <tbody>
                                <?php

                                foreach ($prods as $prod) {
                                    ?>

                                    <tr>
                                        <td><?= $prod['prod']['title'] ?> <strong
                                                    class="mx-2">x</strong> <?= $prod['qty'] ?></td>
                                        <td>$<?php if (!empty($prod['prod']['sale_price'])) {
                                                echo $prod['prod']['sale_price'] * $prod['qty'];
                                            } else {
                                                echo $prod['prod']['price'] * $prod['qty'];
                                            } ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                    <td class="text-black"><strong>$<?= $subtotal ?></strong></td>
                                </tr>
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                    <td class="text-black font-weight-bold"><strong>$<?= $all_price ?></strong></td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank"
                                                       role="button" aria-expanded="false"
                                                       aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                                <div class="collapse" id="collapsebank">
                                    <div class="py-2">
                                        <p class="mb-0">Make your payment directly into our bank account. Please use
                                            your Order ID as the payment reference. Your order won’t be shipped
                                            until the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque"
                                                       role="button" aria-expanded="false"
                                                       aria-controls="collapsecheque">Cheque Payment</a></h3>

                                <div class="collapse" id="collapsecheque">
                                    <div class="py-2">
                                        <p class="mb-0">Make your payment directly into our bank account. Please use
                                            your Order ID as the payment reference. Your order won’t be shipped
                                            until the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 mb-5">
                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal"
                                                       role="button" aria-expanded="false"
                                                       aria-controls="collapsepaypal">Paypal</a></h3>

                                <div class="collapse" id="collapsepaypal">
                                    <div class="py-2">
                                        <p class="mb-0">Make your payment directly into our bank account. Please use
                                            your Order ID as the payment reference. Your order won’t be shipped
                                            until the funds have cleared in our account.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-lg py-3 btn-block"
                                        onclick="window.location='thankyou.html'">Place Order
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-5 mb-md-0">
                <h2 class="h3 mb-3 text-black">Billing Details</h2>
                <div class="p-3 p-lg-5 border">

                    <div class="form-group row">
                        <div class="col-md-12">
                            <?php $form = \yii\widgets\ActiveForm::begin(); ?>

                            <?= $form->field($modelInp, 'address')->textInput() ?>


                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <?= $form->field($modelInp, 'country')->textInput() ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($modelInp, 'post_index')->textInput() ?>
                        </div>
                    </div>

                    <div class="form-group row mb-5">
                        <div class="col-md-12">
                            <?= $form->field($modelInp, 'phone')->textInput(['type' => 'number']) ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <?= $form->field($modelInp, 'address')->textarea(['rows' => 6]) ?>
                    </div>

                    <?php \yii\widgets\ActiveForm::end(); ?>
                </div>
                <?php \yii\widgets\ActiveForm::end() ?>
            </div>
        </div>
        <!-- </form> -->
        <div class="row mb-5">
            <div class="col-md-6">
                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                <div class="p-3 p-lg-5 border">

                    <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                    <div class="input-group w-75">
                        <?php $form = \yii\widgets\ActiveForm::begin(); ?>

                        <?= $form->field($model, 'code')->textInput() ?>

                        <div class="form-group">
                            <?= \yii\helpers\Html::submitButton('Apply', ['class' => 'btn btn-sm btn-primary custom-btn']) ?>
                        </div>

                        <?php \yii\widgets\ActiveForm::end(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>