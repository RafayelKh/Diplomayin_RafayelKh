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
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.html"><img src="<?= \yii\helpers\Url::to('@web') ?>/img/post-3.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category.html"><?= $item['title'] ?></a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="<?= \yii\helpers\Url::to('@web') ?>/<?= $item['id'] ?>"><?= $item['description'] ?></a></h3>
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
