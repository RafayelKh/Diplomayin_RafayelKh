<div class="site-section">
    <?php
//             echo "<pre>";
//             var_dump($product);
//             echo "<pre>";
//             var_dump($images);
//             die;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if (!empty($product['image'])) { ?>
                    <img style="width: 300px"
                         src="<?= \yii\helpers\Url::to('@web') ?>/images/products/<?= $product['image'] ?>" alt="Image"
                         class="img-fluid">
                <?php } else { ?>
                    <img src="<?= \yii\helpers\Url::to('@web') ?>/images/default.jpg" alt="Image placeholder"
                         class="img-fluid">
                <?php } ?>
                <br>
                <?php
                if(!empty($images)){
                    foreach ($images as $oneimage){
                    ?>

                        <img style="width: 80px"
                             src="<?= \yii\helpers\Url::to('@web') ?>/images/products/<?= $oneimage['image'] ?>" alt="Image"
                             class="img-fluid">
                    <?php }
                    }
                ?>
            </div>
            <div class="col-md-6">
                <h2 class="text-black"><?= $product['title'] ?></h2>
                <p><?= $product['description'] ?></p>
                <p><strong class="text-primary h4">$<?= $product['price'] ?></strong></p>
                <div class="mb-5">
                    <div class="input-group mb-3" style="max-width: 120px;">
                        <?php if (!Yii::$app->user->isGuest) { ?>
                            <?php $qtyForm = \yii\widgets\ActiveForm::begin(); ?>

                            <?= $qtyForm->field($prod_model, 'qty')->textInput(['class' => 'form-control text-center'])->label('Quantity'); ?>

                            <?= $qtyForm->field($prod_model, 'prod_id')->hiddenInput(['value' => $product['id']])->label(''); ?>


                            <?php \yii\widgets\ActiveForm::end();
                        }?>

                    </div>

                </div>

                <?php
                if (!Yii::$app->user->isGuest){
                    ?>
                    <p><a class="buy-now btn btn-sm btn-primary"
                          href="<?= \yii\helpers\Url::to('@web') ?>/cart/<?= $product['id'] ?>">Add to Cart</a></p>
                    <?php
                }
                ?>
                <p><a class="buy-now btn btn-sm btn-primary"
                      href="<?= \yii\helpers\Url::to('@web') ?>/favorites/<?= $product['id'] ?>">Add to Wish List</a></p>
            </div>
        </div>
    </div>

    <?php
    \yii\widgets\Pjax::begin(['enablePushState' => false, 'timeout' => 5000]);
    if (!empty($comments)) {
    ?>

    <div style="height: 245px;overflow-y: scroll;margin-top: 150px;font-size: 16px;padding-left: 20px;width: 80%;">
        <h2 style="padding-left: 20px;margin-bottom: 20px">Comments</h2>
        <div>

            <ul>
                <?php
                foreach ($comments as $comment) {
                    ?>
                    <div style="border:1px solid; padding-left: 20px;padding-top: 10px;padding-bottom: 10px;margin-top: 10px">
                        <span><?= $comment['user']['username']; ?></span>
                        <div><?= $comment['content']; ?></div>
                        <div><?= date('F j,Y - H:i:s', strtotime($comment['date'])); ?></div>
                    </div>
                    <?php
                }
                ?>
            </ul>
            <?php
            \yii\widgets\Pjax::end();
            ?>

        </div>
        <div style="margin-top: 50px;padding-left: 50px;">
            <?php
            }
            if (!Yii::$app->user->isGuest) {
                $form = \yii\bootstrap\ActiveForm::begin();
                echo $form->field($model, 'content')->textarea(['rows' => '3'])->label('Comment');
                ?>
                <br>
                <?php
                echo \yii\helpers\Html::submitButton('Send', ['class' => 'btn']);
                \yii\bootstrap\ActiveForm::end();
            }
            ?>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Featured Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        <?php foreach ($products as $item) { ?>

                            <div class="item">
                                <div class="block-4 text-center">
                                    <figure class="block-4-image">
                                        <?php if (!empty($item['image'])) { ?>
                                            <img src="<?= \yii\helpers\Url::to('@web') ?>/images/<?= $item['image'] ?>"
                                                 alt="Image placeholder" class="img-fluid">
                                        <?php } else { ?>
                                            <img src="<?= \yii\helpers\Url::to('@web') ?>/images/default.jpg"
                                                 alt="Image placeholder" class="img-fluid">
                                        <?php } ?>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="index.php?r=products/product"><?= $item['title'] ?></a></h3>
                                        <p class="mb-0">Finding perfect t-shirt</p>
                                        <p class="text-primary font-weight-bold">$<?= $item['price'] ?></p>
                                    </div>
                                </div>
                            </div>

                        <?php }; ?>
                    </div>
                </div>
            </div>