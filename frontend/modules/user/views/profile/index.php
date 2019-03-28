<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10 user-name"><h1><?= $user_info['username'] ?></h1></div>
        <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image"
                                                                       class="img-circle img-responsive"
                                                                       src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a>
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
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
            </div>

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
                <h2 class="table-name">Name of Table</h2>
                <table class="table table-custom">
                    <tr>
                        <th>Inch</th>
                        <th>Grel</th>
                        <th>Ays</th>
                        <th>Table-i</th>
                        <th>mej</th>
                    </tr>
                    <tr>
                        <th>Inch</th>
                        <th>Grel</th>
                        <th>Ays</th>
                        <th>Table-i</th>
                        <th>mej</th>
                    </tr>
                </table>
            </div>
        </div><!--/tab-pane-->
    </div><!--/tab-content-->

</div><!--/col-9-->
</div><!--/row-->
