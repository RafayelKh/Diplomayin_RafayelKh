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
            <li><a data-toggle="tab" href="#messages">Menu 1</a></li>
            <li><a data-toggle="tab" href="#settings">Menu 2</a></li>
        </ul>


        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <form style="margin-top: 20px;" class="form" action="##" method="post" id="registrationForm">
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="first_name"><h4>First name</h4></label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                   placeholder="first name" title="enter your first name if any.">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                   placeholder="last name" title="enter your last name if any.">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="phone"><h4>Phone</h4></label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                   placeholder="enter phone" title="enter your phone number if any.">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="mobile"><h4>Mobile</h4></label>
                            <input type="text" class="form-control" name="mobile" id="mobile"
                                   placeholder="enter mobile number" title="enter your mobile number if any.">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="email"><h4>Email</h4></label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="you@email.com" title="enter your email.">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="email"><h4>Location</h4></label>
                            <input type="email" class="form-control" id="location" placeholder="somewhere"
                                   title="enter a location">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="password"><h4>Password</h4></label>
                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="password" title="enter your password.">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                            <input type="password" class="form-control" name="password2" id="password2"
                                   placeholder="password2" title="enter your password2.">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                            <button class="btn btn-lg btn-success" type="submit"><i
                                        class="glyphicon glyphicon-ok-sign"></i> Save
                            </button>
                        </div>
                    </div>
                </form>

            </div><!--/tab-pane-->
        </div><!--/tab-pane-->

        <div style="margin-top: 50px;" class="col-md-12">
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
                                         src="<?= \yii\helpers\Url::to('@web') . '/' . $mini_cart['prod']['image']; ?>"
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
            <?php }else{?>
                <h2 class="table-name">Cart is empty</h2>
                <form action="<?= \yii\helpers\Url::to('@web') ?>/shop">
                    <div style="display: flex;justify-content: center">
                        <button class="btn btn-sm btn-primary">Go to Shop</button>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div><!--/tab-pane-->
</div><!--/tab-content-->

</div><!--/col-9-->
</div><!--/row-->
