<?php get_header('shop'); ?>
	<div class="modal-view">
	<div class="cr-section mod-black">
		<div class="container">
			<div class="row cr-modal-header-row">
				<div class="col-xs-12">
					<a href="<?php echo home_url() ?>" class="cr-header__logo">
						<img src="<?php echo theme() ?>/src/images/assets/logo-creative-w.svg" alt="logo" class="">
					</a>
					<div class="row cr-modal-header">
						<div class="col-xs-12">
							<div class="cr-section__header">
								<div class="cr-section__header-top"><?php the_field( 'event_type' ); ?> —  </div>
								<?php the_title() ?>
							</div>
						</div>
					</div>
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                        <div class="close-icon"></div>
                    </a>
				</div>
			</div>
		</div>
		<div class="container cr-event modal-body">
			<div class="events-body">
				<div class="row">
				<div class="col-md-8 col-sm-12 col-xs-12">
					<?php if ( has_post_thumbnail() ) { ?>
						<img src="<?php the_post_thumbnail_url(); ?>" alt="">
					<?php } ?>
					<div class="row">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="col-md-10 col-md-offset-1">
								<div class="t-bold">ОПИС ПОДІЇ —</div>
								<div>
										<?php the_content(); ?>
								</div>
							</div>
						<?php endwhile; endif; ?>

					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="cr-event-row">
						<div class="t-bold">ХТО —</div>
						<div><h3><?php the_field( 'author' ); ?></h3></div>
					</div>
					<div class="cr-event-row">
						<div class="t-bold">ДЕ —</div>
						<div><h3><?php the_field( 'place_name' ); ?>&nbsp;<?php the_field( 'place_address' ); ?></h3></div>
					</div>
					<div class="cr-event-row">
						<div class="t-bold">КОЛИ —</div>
						<div><h3><?php the_field( 'date_time' ); ?><?php the_field( 'date_text' ); ?></h3></div>
					</div>
					<div class="cr-event-row">
						<div class="t-bold">ВАРТІСТЬ —</div>
						<div><h3><?php the_field( 'price' ); ?>&nbsp;<?php the_field( 'price_text' ); ?></h3></div>
					</div>
					<div class="cr-event-row">
						<?php if(strtotime(get_field('date_time'))<=time()){ ?>
							<div class="t-bold">Фотозвіт —</div>
							<div><h3><?php the_field( 'photo_content' ); ?></h3></div>
						<?php } else { ?>
							<div class="t-bold">РЕЄСТРАЦІЯ —</div>
							<div><h3><?php the_field( 'registration_content' ); ?></h3></div>
						<?php } ?>
					</div>
					<div class="cr-event-row">
						<?php if(strtotime(get_field('date_time'))<=time()){ ?>
							<a href="<?php the_field('photo_button_link') ?>" class="cr-button-accent">фотозвіт</a>
						<?php } else { ?>
							<a href="<?php the_field('registration_button_link') ?>" class="cr-button-accent">зареєструватися</a>
						<?php } ?>
					</div>
				</div>

			</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<?php if (get_previous_post_link()) { ?>
						<?php $prevPost = get_previous_post(true);
						$prev_post = get_adjacent_post(false, '', true);
						?>
						<a href="<?php echo $previous_post_url = get_permalink( get_adjacent_post(false,'',true)->ID ); ?>" class="prev-event">
							<div class="about-course-title hidden-xs"><?php  echo $prev_post->post_title ?></div>
							<div class="hidden-xs"><?php echo get_field('date_time', $prev_post->ID) ?></div>
						</a>
					<?php } ?>
				</div>
				<div class="col-md-6">
					<?php if (get_next_post_link()) { ?>
						<?php $nextPost = get_next_post(true);
						$next_post = get_adjacent_post(false, '', false);
						?>
						<?php  ?>
						<a href="<?php echo $next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID ); ?>" class="next-event">
							<div class="about-course-title hidden-xs"><?php echo $next_post->post_title ?></div><br>
							<div class="hidden-xs"><?php echo get_field('date_time', $next_post->ID) ?></div>
							<div class="hidden-sm hidden-md hidden-lg">наступна подія</div>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	</div>
<?php get_footer('shop'); ?>
