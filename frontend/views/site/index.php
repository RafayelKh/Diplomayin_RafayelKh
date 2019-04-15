<?php

/* @var $this yii\web\View */

$this->title = 'Shoppers';

Yii::$app->language = 'en'
//echo '<pre>';
//var_dump($prods);
//die;

?>
<div class="site-blocks-cover" style="background-image: url('<?= \yii\helpers\Url::to('@web') ?>/images/hero_1.jpg')"
     data-aos="fade">
    <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
            <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                <h1 class="mb-2"><?= Yii::t('app', 'find_shoes') ?></h1>
                <div class="intro-text text-center text-md-left">
                    <p class="mb-4"><?= Yii::t('app', 'lorem') ?><p>
                        <a href="<?= \yii\helpers\Url::to('@web') ?>/shop"
                           class="btn btn-sm btn-primary"><?= Yii::t('app', 'shop_now') ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-section-sm site-blocks-1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-truck"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase"><?= Yii::t('app', 'free_shipping') ?></h2>
                    <p><?= Yii::t('app', 'lorem') ?>
                    </p></div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-refresh2"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase"><?= Yii::t('app', 'free_returns') ?></h2>
                    <p><?= Yii::t('app', 'lorem') ?>
                    </p></div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-help"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase"><?= Yii::t('app', 'support') ?></h2>
                    <p><?= Yii::t('app', 'lorem') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-blocks-2">
    <div class="container">
        <div class="row">

            <?php foreach ($categories as $cat) { ?>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                    <a class="block-2-item" href="<?= \yii\helpers\Url::to('@web') ?>/shop/cat/<?= $cat['id'] ?>">
                        <figure class="image">
                            <img src="<?= \yii\helpers\Url::to('@web') ?>/images/<?= $cat['image'] ?>" alt=""
                                 class="img-fluid">
                        </figure>
                        <div class="text">
                            <span class="text-uppercase">Collections</span>
                            <h3><?= $cat['title'] ?></h3>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2><?= Yii::t('app', 'newest') ?></h2>
                <h4><?= Yii::t('app', 'swipe') ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">
                    <?php
                    if (!empty($prods)) {
                        foreach ($prods as $item) {
                            ?>
                            <div class="item">
                                <div style="height: 477px" class="block-4 text-center">
                                    <figure style="height: 335px" class="block-4-image">
                                        <?php if (!empty($item['image'])) { ?>
                                            <img style="margin-left: 15px" src="<?= \yii\helpers\Url::to('@web') ?>/images/products/<?= $item['image'] ?>"
                                                 alt="Image" class="img-fluid">
                                        <?php } else { ?>
                                            <img src="<?= \yii\helpers\Url::to('@web') ?>/images/default.jpg"
                                                 alt="Image" class="img-fluid">
                                        <?php } ?>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3>
                                            <a href="<?= \yii\helpers\Url::to('@web') ?>/shop/prod/<?= $item['slug'] ?>"><?= $item['title'] ?></a>
                                        </h3>
                                        <h5 class="mb-0"><?= $item['description'] ?></h5>
                                        <?php
                                        if (!empty($item['sale_price'])) {
                                            ?>
                                            <span style="text-decoration: line-through"
                                                  class="text-primary font-weight-bold"><?= $item['price'] ?> $</span>
                                            <h3 class="text-primary font-weight-bold"><?= $item['sale_price'] ?> $</h3>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="newsletter">
    <div class="container">
        <div class="col-md-6 w3agile_newsletter_left">
            <h3>Newsletter</h3>
            <p>Make sure that you specify true email address</p>
        </div>
        <div class="col-md-6 w3agile_newsletter_right">
            <?php $newsletter = \yii\widgets\ActiveForm::begin(); ?>


            <?= $newsletter->field($news,'email'); ?>

            <?= \yii\helpers\Html::submitButton('Subscribe', ['class' => 'btn btn-sm btn-primary custom-btn']) ?>

            <?php \yii\widgets\ActiveForm::end(); ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="site-section block-8">
    <div class="container">
        <div class="row justify-content-center  mb-5">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2><?= Yii::t('app', 'big_sale') ?></h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 mb-5">
                <a href="#"><img src="<?= \yii\helpers\Url::to('@web') ?>/images/blog_1.jpg" alt="Image placeholder" class="img-fluid rounded"></a>
            </div>
            <div class="col-md-12 col-lg-5 text-center pl-md-5">
                <h2><a href="#"><?= Yii::t('app', 'big_discounts') ?></a></h2>
                <p class="post-meta mb-4">By <a href="#">Carl Smith</a> <span class="block-8-sep">&bullet;</span>
                    September 3, 2018</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam iste dolor accusantium facere
                    corporis ipsum animi deleniti fugiat. Ex, veniam?</p>
                <p><a href="<?= \yii\helpers\Url::to('@web') ?>/shop"
                      class="btn btn-primary btn-sm"><?= Yii::t('app', 'shop_now') ?></a></p>
            </div>
        </div>
    </div>
</div>
</div>
