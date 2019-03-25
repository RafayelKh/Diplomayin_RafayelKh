		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent Posts</h2>
						</div>
					</div>
                <?php foreach ($info as $item){ ?>
					<!-- post -->
					<div style="margin-bottom: 100px" class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img style="width: 400px" src="<?= \yii\helpers\Url::to('@web') ?>/images/blog_1.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
                                    <h2>
                                        <a class="post-category cat-1" href="category.html"><?= $item['title'] ?></a>
                                    </h2>
                                        <span class="post-date">March 27, 2018</span>
								</div>
								<h3 style="overflow: hidden;height: 45px;" class="post-title"><a href="<?= \yii\helpers\Url::to('@web') ?>/blog/<?= $item['id'] ?>"><?= $item['content'] ?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
                    <?php } ?>
				</div>
				<!-- /row -->

			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
