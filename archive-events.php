<?php get_header('shop'); ?>
	<div class="modal-view">
		<div class="cr-section mod-black">
			<div class="container" style="opacity: 0;">
				<div class="row cr-modal-header-row">
					<div class="col-xs-12">
						<a href="<?php echo home_url() ?>" class="cr-header__logo">
							<img src="<?php echo theme() ?>/src/images/assets/logo-creative-w.svg" alt="logo" class="">
						</a>
						<div class="row cr-modal-header">
							<div class="col-xs-12">
								<div class="cr-section__header">
									<div class="cr-section__header-top">список події —  </div>
									Events List
								</div>
							</div>
						</div>
                        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                            <div class="close-icon"></div>
                        </a>
					</div>
				</div>
			</div>

			<div class="container cr-events-list modal-body" style="opacity: 0;">
				<div class="events-body">
					<div class="row">
						<div class="col-md-4 col-sm-6 hidden-xs">
						</div>
						<div class="col-md-2 col-sm-3 hidden-xs">
							<div class="t-bold">Де:</div>
						</div>
						<div class="col-md-2 col-sm-3 hidden-xs">
							<div class="t-bold">Коли:</div>
						</div>
						<div class="col-md-3 hidden-sm hidden-xs">
							<div class="t-bold">Вартість:</div>
						</div>
					</div>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<a class="courses-link <?php the_field('mark_events') ?>" href="<?php the_permalink(); ?>">
							<div class="row">
								<div class="cr-table__row-caption col-md-4 col-sm-5">
									<div class="about-course-title"><?php the_title() ?></div>
									<div class="about-course-title"><?php the_field( 'author' ); ?></div>
								</div>
								<div class="col-md-2 col-sm-3">
									<div class="t-bold"><span class="cr-cell-label hidden-sm hidden-md hidden-lg">Де:</span><?php the_field( 'place_name' ); ?></div>
									<div><?php the_field( 'place_address' ); ?></div>
								</div>
								<div class="col-md-2 col-sm-3">
									<div class="t-bold"><span class="cr-cell-label  hidden-sm hidden-md hidden-lg">Коли:</span><?php the_field( 'date_time' ); ?></div>
									<div><?php the_field( 'date_text' ); ?></div>
								</div>
								<div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-5">
									<div class="t-bold"><span class="cr-cell-label hidden-md hidden-lg">Вартість:</span><?php the_field( 'price' ); ?></div>
									<div><?php the_field( 'price_text' ); ?></div>
								</div>
							</div>
						</a>
					<?php endwhile; endif; ?>
				</div>
			</div>

		</div>
	</div>
<?php get_footer('shop'); ?>
