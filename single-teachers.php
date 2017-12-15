<?php get_header('shop') ?>
<div class="modal-view">
	<div class="cr-section mod-black">
		<div class="container" style="opacity: 0;">
			<div class="row">
				<div class="col-xs-12">
					<a href="<?php echo home_url() ?>" class="cr-header__logo">
						<img src="<?php echo theme() ?>/src/images/assets/logo-creative-w.svg" alt="logo" class="">
					</a>
					<div class="cr-section__header" style="padding: 90px 0 15px">
						<div class="cr-section__header-top">наша команда —  </div>
						our team
					</div>
					<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
						<div class="close-icon"></div>
					</a>
				</div>
			</div>
		</div>

		<div class="container" style="opacity: 0;">
			<div class="row cr-our-team modal-body">
				<div class="col-md-7 col-sm-7">
					<div class="t-bold"><h2 class="header2-small-title"><?php the_title(); ?></h2></div>
					<div class="teacher-position"><h4><?php the_field( 'position' ); ?></h4></div>

				</div>
				<div class="col-md-5 col-sm-5 cr-our-team-photo">
					<?php if ( has_post_thumbnail() ) { ?>
						<img class="profile-photo" src="<?php the_post_thumbnail_url(); ?>" alt="">
					<?php } ?>
					<ul class="cr-social-list">
						<?php if(get_field('instagram')) { ?>
						<li class="cr-social-list__item">
							<a href="<?php the_field('instagram') ?>" target="_blank">
								<img src="<?php echo theme() ?>/src/images/icons/insta-black.svg" height="23" width="24" alt=""></a>
						</li>
						<?php } ?>
						<?php if(get_field('facebook')) { ?>
						<li class="cr-social-list__item">
							<a href="<?php the_field('facebook') ?>" target="_blank">
								<img src="<?php echo theme() ?>/src/images/icons/fb-black.svg" height="23" width="24" alt=""></a>
						</li>
						<?php } ?>
						<?php if(get_field('behance')) { ?>
						<li class="cr-social-list__item">
							<a href="<?php the_field('behance') ?>" target="_blank">
								<img src="<?php echo theme() ?>/src/images/icons/behance-black.svg" height="23" width="24" alt=""></a>
						</li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-md-7 col-sm-12">
					<div style="font-size: 18px;" class="inheritFontSize">
						<?php if (have_posts()) : while (have_posts()) : the_post();
							the_content();
						endwhile; endif; ?>
					</div>

				</div>

			</div>
		</div>

		<div class="container members-switcher hidden">
			<div class="row">
				<div class="col-sm-6 members-switcher-left">
					<?php if (get_previous_post_link()) { ?>
						<?php $prevPost = get_previous_post(true);
						$prev_post = get_adjacent_post(false, '', true);
						?>
						<a href="<?php echo $previous_post_url = get_permalink( get_adjacent_post(false,'',true)->ID ); ?>" class="prev-ivent">
							<div class="about-course-title hidden-xs"><?php  echo $prev_post->post_title ?></div>
							<div class="hidden-xs"><?php echo get_field('position', $prev_post->ID) ?></div>
						</a>
					<?php } ?>
				</div>
				<div class="col-sm-6 members-switcher-right">
					<?php if (get_next_post_link()) { ?>
						<?php $nextPost = get_next_post(true);
						$next_post = get_adjacent_post(false, '', false);
						?>
						<?php  ?>
						<a href="<?php echo $next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID ); ?>" class="next-ivent">
							<div class="about-course-title hidden-xs"><?php echo $next_post->post_title ?></div>
							<div class="hidden-xs"><?php echo get_field('position', $next_post->ID) ?></div>
						</a>
					<?php } ?>
				</div>
			</div>

		</div>
	</div>

<?php get_footer('shop') ?>
