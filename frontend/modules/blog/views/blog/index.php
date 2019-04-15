<!-- section -->
<div class="section">
    <!-- container -->
    <?php
    \yii\widgets\Pjax::begin(['enablePushState' => false]);
    ?>
    <div class="container">

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Recent Posts</h2>
                </div>
            </div>
            <?php foreach ($info as $item) { ?>
                <!-- post -->
                <div style="margin-bottom: 100px;" class="col-md-4">
                    <div style="height: 470px;" class="post">
                        <a class="post-img" href="<?= \yii\helpers\Url::to('@web') ?>/blog/<?= $item['id'] ?>">
                            <div style="height: 327px;">
                                <?php if (!empty($item['image'])) { ?>
                                    <img style="width: 321px;margin-left: 30px"
                                         src="<?= \yii\helpers\Url::to('@web') ?>/images/articles/<?= $item['image'] ?>"
                                         alt="Image"
                                         class="img-fluid">
                                <?php } else { ?>
                                    <img src="<?= \yii\helpers\Url::to('@web') ?>/images/article_default.jpg"
                                         alt="Image placeholder"
                                         class="img-fluid">
                                <?php } ?>
                            </div>
                        </a>
                        <div class="post-body">
                            <div class="post-meta">
                                <h2>
                                    <a class="post-category cat-1"
                                       href="<?= \yii\helpers\Url::to('@web') ?>/blog/<?= $item['id'] ?>"><?= $item['title'] ?></a>
                                </h2>
                                <span class="post-date"><?= $item['created_at'] ?></span>
                            </div>
                            <h3 style="overflow: hidden;height: 45px;" class="post-title"><a
                                        href="<?= \yii\helpers\Url::to('@web') ?>/blog/<?= $item['id'] ?>"><?= $item['content'] ?></a>
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- /post -->
            <?php } ?>
        </div>
        <!-- /row -->

    </div>
    <!-- /container -->
    <div class="row" data-aos="fade-up">
        <div class="col-md-12 text-center">
            <div class="site-block-27">
                <ul style="font-size: 15px">
                    <?php

                    echo \yii\widgets\LinkPager::widget(['pagination' => $pagination]);

                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
    \yii\widgets\Pjax::end();
    ?>
</div>
<!-- /section -->
