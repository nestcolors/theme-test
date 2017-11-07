<?php get_header();
/* Template Name: About */
?>
	<div class="cr-section cr-about-us-hero mod-no-margin-tablets">
		<?php
		$images = get_field('begin_images');
		if( $images ): ?>
		<div class="cr-portfolio-slider">
			<?php foreach( $images as $image ): ?>
				<div>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img img-responsive"/>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<div class="cr-slider__text-block js-paralax-effect1 mobile-no-parallax">
			<div class="margin-left-md">
				<div class="cr-text-block__small-title">як це починалося —  </div>
				<div class="cr-text-block__big-title">our story</div>
			</div>
			<div class="cr-black-board animation up-from-left">
				<?php the_field( 'begin_text' ); ?>
				<!-- <a class="cr-button mod-small mod-white t-c-white">наша команда</a> -->
			</div>
		</div>
	</div>
	<div class="cr-section extra-margin">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-5">
					<div class="cr-section__header">
						<div class="cr-section__header-top">наша команда —  </div>
						our team
					</div>
				</div>
				<div class="col-xs-12 col-md-7">
					<?php the_field('team_text'); ?>
				</div>
			</div>
			<?php if ($team = get_field('our_team' )) { ?>
				<?php foreach ($team as $t) { ?>
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="cr-people-slider__header">
								<?php echo $t['name_group'] ?>(<?php echo count($t['team']) ?>) —

								<div class="cr-arrow-wrapper arrows-slider-1"></div>
							</div>
						</div>
						<?php
						$posts = $t['team'];
						if( $posts ): ?>
							<div class="col-xs-12 col-md-9">
								<div class="cr-people-slider about-us-people">
									<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
										<div>
											<a href="<?php echo get_permalink( $p->ID ); ?>">
												<img src="<?php echo get_the_post_thumbnail_url($p->ID) ?>" alt="">
												<div class="cr-people__descr"><?php the_field('position',$p->ID) ?></div>
												<div class="cr-people__name"><?php echo get_the_title( $p->ID ); ?></div>
											</a>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
	<?php
	$partners = get_field('partners');
	if( $partners ): ?>
		<div class="cr-section mod-black">
			<div class="container">
				<div class="cr-section__header">
					<div class="cr-section__header-top">наші партнери —  </div>
					partners
				</div>
				<div class="row">
					<?php foreach( $partners as $image ): ?>
						<div>
							<div class="col-xs-6 col-md-4"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="cr-partners__logo"/></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php
	$recomendation = get_field('recomendation');
	if( $recomendation ): ?>
		<div class="cr-section extra-margin hidden-xs hidden-sm">
			<div class="container">
				<div class="cr-section__header">
					<div class="cr-section__header-top">рекомендації(3) —  </div>
					people talks
				</div>
				<div class="cr-respond-item cr-recommendation-slider">
					<?php foreach( $recomendation as $p ): // variable must NOT be called $post (IMPORTANT) ?>
						<div class="row">
							<div class="col-xs-10 col-xs-offset-2">
								<img src="<?php echo get_the_post_thumbnail_url($p->ID) ?>" height="197" width="315" alt="" class="cr-respond-item__image">
								<div class="cr-respond-item__content">
									<div class="cr-respond-item__name"><?php echo get_the_title( $p->ID ); ?></div>
									<div class="cr-respond-item__info"><?php the_field('position',$p->ID) ?></div>
									<div class="cr-respond-item__descr"><?php the_field('content',$p->ID) ?></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="cr-section extra-margin">
		<div class="container">
			<div class="cr-section__header">
				<div class="cr-section__header-top">долучайся —  </div>
				join our team
			</div>
		</div>
		<div class="cr-block-with-img">
			<div><img src="<?php the_field('join_image') ?>" alt="" class="img img-responsive"></div>
		</div>
		<div class="cr-slider__text-block js-paralax-effect2-container">
			<div class="cr-black-board cooperation js-paralax-effect2 mobile-no-parallax">
				<h3 class="tc-white">СПІВПРАЦЯ —</h3>
				<?php the_field( 'join_text' ); ?>
			</div>
		</div>
	</div>
	<?php include 'dehouse.php' ?>

<?php get_footer(); ?>
