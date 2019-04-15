<?php

/* @var $this yii\web\View */

$this->title = 'Shoppers';
?>
<div class="site-index">

    <div class="row">
        <div class="col-md-12">
            <h3>Lastest Message</h3>
            <table class="table" style="border: 1px solid black;">
                <tr>
                    <td><?= $last_mes['name']; ?></td>
                    <td><?= $last_mes['email']; ?></td>
                    <td><?= $last_mes['subject']; ?></td>
                    <td><?= $last_mes['body']; ?></td>
                    <td><?= $last_mes['date']; ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="row col-mb-5">
                    <div style="border: 1px solid black;margin-left: 30px" class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">

                        <div style="height: 530px" class="block-4 text-center border">
                            <h3>Lastest Product</h3>
                            <figure style="height: 300px" class="block-4-image">
                                <?php if (!empty($item['image'])) { ?>
                                    <a href="shop/prod/<?= $item['id'] ?>"><img style="width: 261px"
                                                                                src="/Diplomayin_RafayelKh/frontend/web/images/products/<?= $item['image'] ?>"
                                                                                alt="Image placeholder" class="img-fluid"></a>
                                <?php }else{ ?>
                                    <a href="shop/prod/<?= $item['id'] ?>"><img
                                                style="height: 260px;"
                                                src="/Diplomayin_RafayelKh/frontend/web/images/default.jpg"
                                                alt="Image placeholder" class="img-fluid">
                                    </a>
                                <?php } ?>
                            </figure>
                            <div style="margin-top: 0" class="block-4-text p-4">
                                <h3><a href="<?= \yii\helpers\Url::to('@web') ?>/shop/prod/<?= $item['slug'] ?>"><?= $item['title'] ?></a></h3>
                                <p class="mb-0">Finding perfect t-shirt</p>
                                <p class="text-primary font-weight-bold">
                                    <?php if (!empty($item['sale_price'])){ ?>
                                    <span style="text-decoration: line-through">$<?= $item['price'] ?></span>
                                <h2>$<?= $item['sale_price'] ?></h2>
                                <?php }else{ ?>
                                    <h2>$<?= $item['price'] ?></h2>
                                <?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>

                <div style="border: 1px solid black;margin-left: 30px" class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">

                    <div style="height: 530px" class="block-4 text-center border">
                        <h3>Lastest Article</h3>
                        <figure style="height: 300px" class="block-4-image">
                            <?php if (!empty($blog['image'])) { ?>
                                <a href="shop/article/<?= $blog['id'] ?>"><img style="width: 261px"
                                                                            src="/Diplomayin_RafayelKh/frontend/web/images/articles/<?= $blog['image'] ?>"
                                                                            alt="Image placeholder" class="img-fluid"></a>
                            <?php }else{ ?>
                                <a href="shop/article/<?= $blog['id'] ?>"><img
                                            style="height: 260px;"
                                            src="/Diplomayin_RafayelKh/frontend/web/images/default.jpg"
                                            alt="Image placeholder" class="img-fluid">
                                </a>
                            <?php } ?>
                        </figure>
                        <div style="margin-top: 0" class="block-4-text p-4">
                            <h3><a href="<?= \yii\helpers\Url::to('@web') ?>/shop/blog/<?= $blog['slug'] ?>"><?= $blog['title'] ?></a></h3>
                            <p class="mb-0"><?= $blog['created_at'] ?></p>
                            <p class="mb-0"><?= $blog['content'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
