<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

<!--	--><?php
//		/**
//		 * woocommerce_before_main_content hook.
//		 *
//		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
//		 * @hooked woocommerce_breadcrumb - 20
//		 */
//		do_action( 'woocommerce_before_main_content' );
//	?>
<!---->
<!--		--><?php //while ( have_posts() ) : the_post(); ?>
<!---->
<!--			--><?php //wc_get_template_part( 'content', 'single-product' ); ?>
<!---->
<!--		--><?php //endwhile; // end of the loop. ?>
<!---->
<!--	--><?php
//		/**
//		 * woocommerce_after_main_content hook.
//		 *
//		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
//		 */
//		do_action( 'woocommerce_after_main_content' );
//	?>
<!---->
<!--	--><?php
//		/**
//		 * woocommerce_sidebar hook.
//		 *
//		 * @hooked woocommerce_get_sidebar - 10
//		 */
//		do_action( 'woocommerce_sidebar' );
//	?>
	<div class="cr-hero-container">
		<div class="cr-hero" style="background-image: url(<?php the_field('background') ?>)">
			<!-- <img src="" alt=""> -->
		</div>
	</div>

	<div class="cr-section mod-margin-to-hero info-table-container">
		<div class="container no-margin-tablet">
			<div class="col-xs-12 no-margin-tablet">
				<div class="cr-course-block">

					<div class="row">
						<div class="col-xs-12 col-sm-7">
							<div class="cr-section__header">
								<h1 class="cr-section__header-top"><span id="course-title"><?php the_field('ukrainian_title_version') ?></span> —  </h1>
								<?php the_field('english_title_version') ?>
							</div>
						</div>
						<div class="col-xs-10 col-sm-5">
							<span class="product-level-selector">*вибір рівня</span>
							<div class="cr-type-select">
								<strong>
									<?php
									// get all product cats for the current post
									$categories = get_the_terms( get_the_ID(), 'product_cat' );
									// wrapper to hide any errors from top level categories or products without category
									if ( $categories && ! is_wp_error( $category ) ) :
										// loop through each cat
										foreach($categories as $category) :
											// get the children (if any) of the current cat
											$children = get_categories( array ('taxonomy' => 'product_cat', 'parent' => $category->term_id ));
											if ( count($children) == 0 ) {
												// if no children, then echo the category name.
												echo $category->name;
											}
										endforeach;
									endif;
									?>
								</strong>
								<?php if ($next_posts = get_field('next_posts' )) { ?>
									<ul class="cr-type-select-value show-on-click">
									<?php foreach ($next_posts as $n) { ?>
										<li><a href="<?php echo $n['course'] ?>"><strong><?php echo $n['text'] ?></strong></a></li>
									<?php } ?>
									</ul>
								<?php } ?>
							</div>
						</div>
					</div>

					<div class="row cr-flex-table cr-schedule-table">
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="cr-flex-table__item">
								<div class="thead">Тривалість курсу:</div>
							</div>
							<div class="cr-flex-table__item">
								<?php the_field('duration') ?>
							</div>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<div class="cr-flex-table__item">
								<div class="thead">Розклад:</div>
							</div>
							<div class="cr-flex-table__item">
								<?php the_field('shedule') ?>
							</div>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-3">
							<div class="cr-flex-table__item">
								<div class="thead">Ціна:</div>
							</div>
							<div class="cr-flex-table__item">
								<?php the_field('price') ?>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-3">
							<div class="cr-flex-table__item">
								<div class="thead">Початок:</div>
							</div>
							<div class="cr-flex-table__item">
								<?php the_field('start') ?>
							</div>
						</div>
					</div><!-- schedule table -->

					<div class="row privat-payment-info">
						<div class="col-xs-12 col-sm-4 hidden-xs">
							<img src="<?php echo theme() ?>/src/images/logo-opcha.png" style="margin: 0 auto; display: block;" height="auto" width="100" alt="">
						</div>
						<div class="col-xs-12 col-sm-8">
							<div class="m-top-25">
								<p class="t-a-right t-bold mobile-t-center">При розрахунку можна скористатися послугою Оплата частинами від Приватбанку, <a href="https://chast.privatbank.ua/" target="_blank"  rel="nofollow noopener"class="">деталі тут.</a></p>
							</div>
						</div>
					</div>
					<hr>
					<div class="row cr-course-block__footer">
						<div class="col-xs-10 col-xs-offset-2 col-sm-3 col-sm-offset-0 back-to  margin-top-sm">
							<a href="<?php echo home_url() ?>/product-category/dizajn/" class="cr-back-link">назад до списку</a>
						</div>
						<div class="col-xs-12 col-sm-9">
							<div class="pull-right">
								<a href="<?php echo home_url() ?>/faq" class="cr-button-accent register-link hidden-sm hidden-md hidden-xs">часті питання</a>
								<a href="<?php the_field('google_form_link') ?>" class="cr-button register-link">зареєструватися</a>
								<a href="<?php the_field('google_form_link') ?>" class="google-registration hidden-sm hidden-md hidden-lg">реєстрація через google form</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="fixed-to-screen">
		<div class="container">
			<div class="row cr-course-block__footer">
				<div class="col-xs-4 col-xs-offset-0 col-sm-3 col-sm-offset-0 back-to">
					<a href="<?php echo home_url() ?>/product-category/dizajn/" class="cr-back-link">назад <span class="hidden-xs">до списку</span></a>
				</div>
				<div class="col-xs-8 col-xs-offset-0 col-sm-9 col-sm-offset-0 ">
					<div class="pull-right">
						<a href="<?php echo home_url() ?>/faq" class="cr-button-accent hidden-sm hidden-md hidden-xs">часті питання</a>
						&nbsp;
						<a href="<?php the_field('google_form_link') ?>" class="cr-button">зареєструватися</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="cr-section display-flex-on-small">
		<div class="cr-slider__text-block mod-left-side">
			<div class="about-course-black-board cr-black-board js-paralax-effect1 mobile-no-parallax">
				<h3 class="tc-white">ПРО КУРС —</h3>
				<?php the_field('about_text') ?>
			</div>
		</div>
		<div class="cr-block-with-img mod-left-side">
			<div class="cr-img-div" style="background-image: url('<?php echo the_field('about_bg') ?>');">
				<!-- <img src="<?php the_field('about_bg') ?>" height="502" width="828" alt=""> -->
			</div>
		</div>
	</div>
	<div class="cr-section cr-two-columns">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6 course-program-container">
					<div class="cr-two-columns__header">програма —   </div>
					<hr>
					<?php the_field('programm') ?>
				</div>
				<div class="col-xs-12 col-md-6 course-whom-container">
					<div class="cr-two-columns__header">для кого —   </div>
					<hr>
					<?php the_field( 'for_whom' ); ?>
				</div>
			</div>

			<div class="row">
				<div class="cr-full-program-container">
					<a href="#" class="open-full-program-popup outher-link cr-button-accent mod-small mod-white t-c-white">
						повний опис
					</a>
					<div class="cr-full-program-popup-body">
						<div class="cr-full-program-popup col-xs-12">
							<a href="#" class="close-full-program-popup outher-link"><div class="close-icon"></div></a>
							<div class="full-program-title">
								<div class="cr-two-columns__header">Повний опис —   </div>
							</div>
							<hr>
							<div class="full-program-body ">
                  <?php the_field('full_text'); ?>
              </div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="hidden-xs">
				<p class="t-a-center">
          Бажаєте отримати повну програму курсу? <br>
          Залиште Вашу електронну адресу і ми вишлемо Вам!
        </p>
				<div class="t-a-center">
					<?php echo do_shortcode('[contact-form-7 id="4" title="Contact form"]') ?>
<!--					<input type="email" name="email" class="cr-type-email" placeholder="office.creativeschool@gmail.com">-->
<!--					<a class="cr-button-write mod-small mod-white t-c-white">Отримати</a>-->
				</div>
			</div>
		</div>
	</div>
	<div class="cr-section about-course-our-works">
		<div class="container hidden-xs">
			<div class="cr-section__header">
				<div class="cr-section__header-top"><h2 class="header2-small-title"><?php the_field( 'works_caption' ); ?>(<?php echo count(get_field('works')) ?>) —  </h2></div>
				<?php the_field( 'works_title' ); ?>
			</div>
		</div>
		<?php
		$posts = get_field('works');
		if( $posts ) { ?>
            <div class="cr-our-works hidden-xs">
	            <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                    <div class="album-link">
											<a href="<?php echo get_permalink( $p->ID ); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url($p->ID) ?>" alt="" class="img img-responsive">
                        <div class="work-author">
													<span>
                            <strong><?php the_field('caption', $p->ID ); ?> <br></strong>
                          	<?php the_field('author',$p->ID) ?>
													</span>
                        </div>
											</a>
                    </div>
	            <?php endforeach; ?>
            </div>
		<?php } else { ?>
            <div class="cr-our-works hidden-xs">
				<?php

				$images = get_field('work_gallery');
				if( $images ): ?>
                    <?php foreach( $images as $image ): ?>
                        <div>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img img-responsive"/>
                        </div>
                    <?php endforeach; ?>
				<?php endif; ?>
            </div>
		<?php } ?>
		<div class="cr-slider__text-block small-on-tablet">
			<div class="cr-black-board">
				<h3 class="tc-white">РЕЗУЛЬТАТ —</h3>
				<?php the_field('works_text') ?>
				<a href="<?php echo home_url() ?>/faq" class="cr-button mod-small mod-white t-c-white mod-left hidden">часті питання</a>
				<a href="<?php the_field('google_form_link') ?>" target="_blank"  rel="nofollow noopener"class="cr-button-registration mod-small mod-white t-c-white hidden">зареєструватися</a>
			</div>
		</div>

	</div>
	<div class="cr-section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<div class="cr-people-slider__header">
						лектори(<?php echo count(get_field('teachers')) ?>) —
						<div class="cr-arrow-wrapper arrows-slider-1"></div>
					</div>
				</div>

				<?php
				$posts = get_field('teachers');
				if( $posts ): ?>
				<div class="col-xs-12 col-md-9">
					<div class="cr-people-slider about-course-people">
					<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
						<div>
							<a href="<?php echo get_permalink( $p->ID ); ?>">
								<?php echo get_the_post_thumbnail($p->ID) ?>
								<div class="cr-people__descr"><?php the_field('position',$p->ID) ?></div>
								<div class="cr-people__name"><?php echo get_the_title( $p->ID ); ?></div>
							</a>
						</div>
					<?php endforeach; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php
	$courses = get_field('related_courses');
	if( $courses ): ?>
	<div class="cr-section sm-margin">
		<div class="container">
			<div class="cr-people-slider__header recommended-courses">
				рекомендовані курси(<?php echo count(get_field('related_courses')) ?>) —
				<div class="cr-arrow-wrapper arrows-slider-1"></div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-10 col-md-offset-2">
					<div class="cr-courses-slider">
						<?php foreach( $courses as $p ): // variable must NOT be called $post (IMPORTANT) ?>
							<?php $_product = wc_get_product($p->ID); ?>
                            <div class="cr-courses__item mode-gray">
								<?php echo get_the_category($p->ID) ?>(базус)
								<p class="cr-courses__title">
									<?php echo get_the_title( $p->ID ); ?>
								</p>
								<p class="course-start">
									Початок: <strong><?php the_field('start_mounse',$p->ID) ?></strong>
								</p>
								<p class="course-price">
									Вартість: <strong><?php echo $_product->get_regular_price(); ?> грн,</strong>
								</p>
								<p class="discount">
									<?php the_field('discount_text',$p->ID); ?>
								</p>
								<a href="<?php echo get_permalink( $p->ID ); ?>" class="cr-button mod-white center-block">Переглянути</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<a href="<?php echo home_url() ?>/product-category/dizajn/" class="cr-button center-block all-courses-link">всі курси</a>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
    <?php
    $testimonials = get_field('testimonials');
    if( $testimonials ): ?>
	<div class="cr-section hidden-xs">
		<div class="container">
			<div class="cr-section__header">
				<div class="cr-section__header-top">відгуки —  </div>
				testimonials
			</div>
			<div class="cr-respond-item cr-reviews-slider">
				<?php foreach( $testimonials as $p ): // variable must NOT be called $post (IMPORTANT) ?>
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
    <?php include 'dehouse.php' ?>
<!--	<div class="cr-section sm-margin">-->
<!--		<div class="cr-map">-->
<!--			<div class="container">-->
<!--				<div class="cr-map__small-header">головний офіс  —-->
<!--				</div>-->
<!--				<div class="cr-map__big-header">lviv,<br>Gorodotska, 5-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->

<?php get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
