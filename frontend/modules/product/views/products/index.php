<div class="site-section">
    <div class="container">
        <?php
//         echo "<pre>";
//         var_dump($cat);
//         die;

        ?>
        <div class="row mb-5">
            <div class="col-md-9 order-2">

                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                        <div class="d-flex">
                            <div class="dropdown mr-1 ml-md-auto">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Latest
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                    <?php foreach ($cat as $each){ ?>
                                          <a class="dropdown-item" href="<?= \yii\helpers\Url::to('@web') ?>/shop/cat/<?= $each['id'] ?>"><?= $each['title'] ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuReference" data-toggle="dropdown">Reference
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                    <a class="dropdown-item" href="<?= \yii\helpers\Url::to('@web') ?>/shop/newBeginning">New products at the beginning</a>
                                    <a class="dropdown-item" href="<?= \yii\helpers\Url::to('@web') ?>/shop/newEnd">New products at the end</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= \yii\helpers\Url::to('@web') ?>/shop/lowHigh">Price, low to high</a>
                                    <a class="dropdown-item" href="<?= \yii\helpers\Url::to('@web') ?>/shop/highLow">Price, high to low</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                \yii\widgets\Pjax::begin(['enablePushState' => false,'timeout' => 5000]);
//                ?>
                <div class="row mb-5">

                    <?php

                    foreach ($product as $item) { ?>

                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                            <div style="height: 430px" class="block-4 text-center border">
                                <figure style="height: 300px" class="block-4-image">
                                    <?php if (!empty($item['image'])) { ?>
                                            <a href="shop/prod/<?= $item['id'] ?>"><img style="width: 261px"
                                                src="<?= \yii\helpers\Url::to('@web') ?>/images/products/<?= $item['image'] ?>"
                                                alt="Image placeholder" class="img-fluid"></a>
                                    <?php }else{ ?>
                                        <a href="shop/prod/<?= $item['id'] ?>"><img
                                                    src="<?= \yii\helpers\Url::to('@web') ?>/images/default.jpg"
                                                    alt="Image placeholder" class="img-fluid">
                                        </a>
                                    <?php } ?>
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="<?= \yii\helpers\Url::to('@web') ?>/shop/prod/<?= $item['id'] ?>"><?= $item['title'] ?></a></h3>
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

                    <?php } ?>

                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-md-12 text-center">
                        <div class="site-block-27">
                            <ul>
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

            <div class="col-md-3 order-1 mb-5 mb-md-0">
                <div class="border p-4 rounded mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                    <ul class="list-unstyled mb-0">
                        <a class="dropdown-item" href="<?= \yii\helpers\Url::to('@web') ?>/shop">All</a>
                        <?php foreach ($cat as $category) { ?>
                            <a class="dropdown-item" href="<?= \yii\helpers\Url::to('@web') ?>/shop/cat/<?= $category['id'] ?>"><?= $category['title'] ?></a>
                        <?php } ?>
                    </ul>
                </div>
                <div class="border p-4 rounded mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Brands</h3>
                    <ul class="list-unstyled mb-0">
                        <a class="dropdown-item" href="<?= \yii\helpers\Url::to('@web') ?>/shop">All</a>
                        <?php foreach ($brands as $brand) { ?>
                            <a class="dropdown-item" href="<?= \yii\helpers\Url::to('@web') ?>/shop/brand/<?= $brand['id'] ?>"><?= $brand['title'] ?></a>
                        <?php } ?>
                    </ul>
                </div>


                <div class="border p-4 rounded mb-4">
                    <div class="mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                        <div id="slider-range" class="border-primary"></div>
                        <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white"
                               disabled=""/>
                        <input type="hidden" name="price-from" id="price-from" class="form-control border-0 pl-0 bg-white"
                               disabled=""/>
                        <input type="hidden" name="price-to" id="price-to" class="form-control border-0 pl-0 bg-white"
                               disabled=""/>
                    </div>

                    <div class="mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                        <label for="s_sm" class="d-flex">
                            <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span
                                    class="text-black">Small (2,319)</span>
                        </label>
                        <label for="s_md" class="d-flex">
                            <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span
                                    class="text-black">Medium (1,282)</span>
                        </label>
                        <label for="s_lg" class="d-flex">
                            <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span
                                    class="text-black">Large (1,392)</span>
                        </label>
                    </div>
                    <input href="<?= \yii\helpers\Url::to('@web') ?>/shop" type="submit" class="btn btn-sm btn-primary">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="site-section site-blocks-2">
                    <div class="row justify-content-center text-center mb-5">
                        <div class="col-md-7 site-section-heading pt-4">
                            <h2>Categories</h2>
                        </div>
                    </div>

                    <div class="row">
                        <?php foreach ($cat as $each) { ?>
                            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                                <a class="block-2-item" href="<?= \yii\helpers\Url::to('@web') ?>/shop/cat/<?= $category['id'] ?>">
                                    <figure class="image">
                                        <img href="<?= \yii\helpers\Url::to('@web') ?>/shop/<?= $each['id'] ?>"
                                             src="<?= \yii\helpers\Url::to('@web') ?>/images/<?= $each['image'] ?>" alt=""
                                             class="img-fluid">
                                    </figure>
                                    <div class="text">
                                        <span class="text-uppercase">Collections</span>
                                        <h3><?= $each['title'] ?></h3>
                                    </div>
                                </a>

                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
