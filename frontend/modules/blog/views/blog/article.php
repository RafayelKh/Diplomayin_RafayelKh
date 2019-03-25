<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
 echo "<pre>";
 var_dump($messages);

//die;
?>
    <!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Post content -->
					<div class="col-md-12">
						<div class="section-row sticky-container">
							<div class="main-post">
								<h3><?= $messages['title'] ?></h3>
                                    <figure class="figure-img">
									<img class="img-responsive" src="<?= \yii\helpers\Url::to('@web') ?>/img/post-4.jpg" alt="">
									<figcaption>So Lorem Ipsum is bad (not necessarily)</figcaption>
								</figure>
                                <blockquote class="blockquote">
									I’ve heard the argument that “lorem ipsum” is effective in wireframing or design because it helps people focus on the actual layout, or color scheme, or whatever. What kills me here is that we’re talking about creating a user experience that will (whether we like it or not) be DRIVEN by words. The entire structure of the page or app flow is FOR THE WORDS.
								</blockquote>
								<p>If that's what you think how bout the other way around? How can you evaluate content without design? No typography, no colors, no layout, no styles, all those things that convey the important signals that go beyond the mere textual, hierarchies of information, weight, emphasis, oblique stresses, priorities, all those subtle cues that also have visual and emotional appeal to the reader. Rigid proponents of content strategy may shun the use of dummy copy but then designers might want to ask them to provide style sheets with the copy decks they supply that are in tune with the design direction they require.</p>
								<h3>Summing up, if the copy is diverting attention from the design it’s because it’s not up to task.</h3>
								<p>Typographers of yore didn't come up with the concept of dummy copy because people thought that content is inconsequential window dressing, only there to be used by designers who can’t be bothered to read. Lorem Ipsum is needed because words matter, a lot. Just fill up a page with draft copy about the client’s business and they will actually read it and comment on it. They will be drawn to it, fiercely. Do it the wrong way and draft copy can derail your design review.</p>
							</div>
							<div class="post-shares sticky-shares">
								<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
								<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-envelope"></i></a>
							</div>
						</div>

						<!-- ad -->
						<div class="section-row text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="<?= \yii\helpers\Url::to('@web') ?>/img/ad-2.jpg" alt="">
							</a>
						</div>
						<!-- ad -->

						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="<?= \yii\helpers\Url::to('@web') ?>/img/author.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h3>John Doe</h3>
										</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->

						<!-- comments -->
						<div class="section-row">
							<div class="section-title">
								<h2><?= count($messages) ?> Comments</h2>
							</div>

							<div class="post-comments">
								<?php foreach ($messages as $item) { ?>
									<!-- comment -->
									<div class="media">
										<div class="media-left">
											<img class="media-object" src="<?= \yii\helpers\Url::to('@web') ?>/img/avatar.png" alt="">
										</div>
										<div class="media-body">
											<div class="media-heading">
												<h4><?= $item['title'] ?></h4>
												<span class="time"><?= $item['date'] ?></span>
											</div>
											<p><?= $item['content'] ?></p>
										</div>
									</div>
									<!-- /comment -->
								<?php }?>
									</div>
								</div>
							</div>
						</div>
						<!-- /comments -->

						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a reply</h2>
								<p>your email address will not be published. required fields are marked *</p>
							</div>

							<?php
							$form = ActiveForm::begin(['action' => yii\helpers\Url::to()."/add"]); ?>

							<?= $form->field($model, 'title')->label('Title') ?>
							<?= $form->field($model, 'content')->label('Comment') ?>

							<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>

							<?php  ActiveForm::end(); ?>
						</div>
						<!-- /reply -->
					</div>
					<!-- /Post content -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
