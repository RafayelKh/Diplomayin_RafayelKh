<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Commerce',
                        'icon' => 'fas fa-shopping-bag',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Products', 'icon' => 'file-code-o', 'url' => ['/product']],
                            ['label' => 'Brand', 'icon' => 'file-code-o', 'url' => ['/brand']],
                            ['label' => 'Categories', 'icon' => 'file-code-o', 'url' => ['/categories']],
                            ['label' => 'Orders', 'icon' => 'file-code-o', 'url' => ['/order']],
                            ['label' => 'Coupon Control', 'icon' => 'file-code-o', 'url' => ['/coupon']],
                        ]
                    ],
                    [
                        'label' => 'Community',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Users', 'icon' => 'fas fa-user', 'url' => ['/user']],
                            ['label' => 'Messages', 'icon' => 'fas fa-envelope', 'url' => ['/contact']],
                            ['label' => 'Articles', 'icon' => 'fas fa-newspaper-o', 'url' => ['/article']],
                        ]
                    ],
                    [
                        'label' => 'Tools',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                        ]
                    ],


                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
