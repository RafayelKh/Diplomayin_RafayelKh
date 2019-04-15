<?php
//echo '<pre>';
//var_dump($last_orders);
//die;
?>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div style="height: 100px" class="col-sm-12 user-name"><h1>Welcome <?= $user_info['username'] ?> !</h1></div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3"><!--left col-->


        <div class="text-center">
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                 alt="avatar">
            <h6>Upload a different photo...</h6>
            <input type="file" class="text-center center-block file-upload">
        </div>
        </hr><br>

        <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div style="font-size: 20px" class="panel-body">
                <a style="color: black" href="https://facebook.com"><i class="fab fa-facebook-square icon"></i></a>
                <a style="color: black" href="https://github.com"><i class="fab fa-github icon"></i></a>
                <a style="color: black" href="https://twitter.com"><i class="fab fa-twitter icon"></i></a> <a
                        style="color: black" href="https://pinterest.com"><i class="fab fa-pinterest icon"></i></a>
                <a style="color: black" href="https://plus.google.com"><i class="fab fa-google-plus-g icon"></i></a>
            </div>
        </div>

    </div><!--/col-3-->
    <div class="col-sm-9">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
            <li><a href="#cart">Cart</a></li>
            <li><a href="#orders">Orders</a></li>
            <li><a href="#settings">Settings</a></li>
        </ul>


        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <form style="margin-top: 20px;" class="form" action="#" method="post" id="registrationForm">
                    <?php $user_info = \yii\widgets\ActiveForm::begin(); ?>
                    <div class="form-group col-xs-12">

                        <div class="col-xs-6">
                            <?= $user_info->field($user, 'username')->textInput(['placeholder' => 'Type your new username', 'class' => 'form-control'])->label('Username'); ?>
                        </div>

                    </div>

                    <div class="form-group col-xs-12">

                        <div class="col-xs-6">
                            <?= $user_info->field($user, 'email')->textInput(['placeholder' => 'Type your new email', 'class' => 'form-control'])->label('Email'); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <?= \yii\helpers\Html::submitButton('Save', ['class' => 'btn btn-secondary']) ?>
                        </div>
                    </div>
                    <?php \yii\widgets\ActiveForm::end(); ?>

            </div><!--/tab-pane-->
        </div><!--/tab-pane-->

        <div id="cart" style="margin-top: 50px;" class="col-md-12">
            <?php if (!empty($mini_cart)) { ?>
                <h2 class="table-name">Cart View</h2>
                <table class="table table-custom">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price / Sale Price</th>
                        <th>Qty</th>
                    </tr>
                    <?php
                    $count = 1;
                    foreach ($mini_cart as $item) { ?>
                        <tr>
                            <td class="display-flexo"><?= $count ?></td>
                            <td style="width: 20%">
                                <?php if (!empty($item['prod']['image'])) { ?>
                                    <img class="small-image"
                                         src="<?= \yii\helpers\Url::to('@web') . '/images/products/' . $item['prod']['image']; ?>"
                                         alt="">
                                <?php } else { ?>
                                    <img class="small-image"
                                         src="<?= \yii\helpers\Url::to('@web') . '/images/default.jpg' ?>" alt="">
                                <?php } ?>
                            </td>
                            <td class="display-flex"><a
                                        href="<?= \yii\helpers\Url::to('@web') ?>/shop/prod/<?= $item['prod']['id'] ?>"><?= $item['prod']['title'] ?></a>
                            </td>
                            <td class="display-flex"><?= $item['prod']['description'] ?></td>
                            <td class="display-flex">
                                <?php if (!empty($item['prod']['sale_price'])) {
                                    echo $item['prod']['sale_price'] . '$';
                                } else {
                                    echo $item['prod']['price'] . '$';
                                } ?>
                            </td>
                            <td class="display-flex"><?= $item['qty'] ?></td>
                        </tr>
                        <?php
                        $count = $count + 1;
                    } ?>

                </table>
                <div class="col-md-12">
                    <form style="display: flex;justify-content: center"
                          action="<?= \yii\helpers\Url::to('@web') ?>/checkout">
                        <button class="btn btn-secondary">To Order List</button>
                    </form>
                    <form style="display: flex;justify-content: center;margin-top: 15px"
                          action="<?= \yii\helpers\Url::to('@web') ?>/cart">
                        <button class="btn btn-secondary">To Cart</button>
                    </form>
                </div>
            <?php } else { ?>
                <h2 class="table-name">Cart is empty</h2>
                <form action="<?= \yii\helpers\Url::to('@web') ?>/shop">
                    <div style="display: flex;justify-content: center">
                        <button class="btn btn-sm btn-primary">Go to Shop</button>
                    </div>
                </form>
            <?php } ?>
        </div>
        <div style="margin-top: 100px;" class="col-md-12" id="orders">
            <h2 class="table-name">Orders</h2>
            <table class="table table-custom">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Address</td>
                    <td>Post Index</td>
                    <td>Country</td>
                    <td>Phone</td>
                    <td>Price</td>
                    <td>Status</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $count = 1;
                foreach ($last_orders as $item) {
                    ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['address'] ?></td>
                        <td><?= $item['post_index'] ?></td>
                        <td><?= $item['country'] ?></td>
                        <td><?= $item['phone'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td>
                            <?php if ($item['status'] == '0') {
                                echo "Awaiting";
                            } else if ($item['status'] == '1') {
                                echo 'On way';
                            } else {
                                echo 'Successfully completed';
                            } ?>
                        </td>
                    </tr>
                    <?php
                    $count++;
                } ?>
                </tbody>
            </table>
        </div>

        <div id="settings" style="margin-top: 50px;" class="col-md-12">
            <h2 class="table-name">Settings</h2>
            <div style="text-align: center;border: 1px solid #ff4653;padding: 5px;" class="col-md-12">
                <h3 class="danger" style="font-size: 17px">Danger Zone</h3>
                <div class="col-md-6">
                    <form action="<?= \yii\helpers\Url::to('@web') ?>/user/delete">
                        <input style="width: 200px;height: 25px;" type="text" name="username" id="username" placeholder="   Write Your Username">
                        <input type="submit" class="btn btn-secondary" value="Delete">
                    </form>

                </div>
                <div class="col-md-6">
                    <p>When deleting, you will never be recover this account!</p>
                </div>
            </div>
        </div>
    </div><!--/tab-pane-->

</div><!--/tab-content-->

</div><!--/col-9-->
</div><!--/row-->
