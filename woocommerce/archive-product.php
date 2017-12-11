<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see           https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       2.0.0
 */
if ( ! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
add_filter( 'body_class', 'filter_function_name_9314', 10, 2 );
function filter_function_name_9314( $classes, $class ){
    $classes[] = 'courses-list-body';
    return $classes;
}

get_header('shop');
$curent_category = get_queried_object();
function get_top_cat($parent = '')
{
	$taxonomy       = 'product_cat';
	$orderby        = 'name';
	$show_count     = 0;      // 1 for yes, 0 for no
	$pad_counts     = 0;      // 1 for yes, 0 for no
	$hierarchical   = 1;      // 1 for yes, 0 for no
	$title          = '';
	$empty          = 0;
	$args           = array(
		'taxonomy'     => $taxonomy,
		'orderby'      => $orderby,
		'show_count'   => $show_count,
		'pad_counts'   => $pad_counts,
		'hierarchical' => $hierarchical,
		'title_li'     => $title,
		'hide_empty'   => $empty,
		'parent'       => $parent
	);
	$all_categories = get_categories($args);

	return $all_categories;
}

$all_categories = get_top_cat();
function category_has_children($term_id)
{
	$children = get_term_children($term_id, "product_cat");
	if (is_array($children)) {
		return $children;
	} else {
		return false;
	}
}

?>
<div id="courses-list">
    <div class="modal-view">
        <div class="cr-section mod-black">
            <div class="container" style="opacity: 0; z-index: 99999; position: relative;">
                <div class="row cr-modal-header-row">
                    <div class="col-xs-12">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="cr-header__logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/images/assets/logo-creative-w.svg" alt="logo" class="">
                        </a>
                        <div class="row cr-modal-header">
                            <div class="col-xs-12 col-sm-10 no-paddings">
                                <div class="cr-section__header">
                                    <div class="cr-section__header-top">всі <span id='eng-course-ua-title'></span> курси та напрямки —</div>
                                    <span id='eng-course-title'></span> courses
                                </div>
																<div class="level-list-container">
																	<ul class="level-list-ul">
																		<?php
																		foreach (array_reverse($all_categories) as $cat1) {
																			if ($cat1->category_parent == 0) {
																				$category_id = $cat1->term_id;
																				echo '<li class="cat-selector ' . $cat1->slug . '-selector"><a href="' . get_term_link($cat1->slug, 'product_cat') . '">' . $cat1->name . '</a></li>';
																			}
																		}
																		?>
																	</ul>
																</div>
                            </div>
                            <div class="col-xs-12 col-sm-4 hidden">
                                <div class="cr-type-select">
																		<?php echo $curent_category->name; ?>
                                    <ul class="cr-type-select-value show-on-click">
																			<?php
																			foreach ($all_categories as $cat) {
																				if ($cat->category_parent == 0) {
																					$category_id = $cat->term_id;
																					echo '<li><a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a></li>';
																				}
																			}
																			?>
                                    </ul>
                                </div>
                                <span class="level-selector">*вибір напрямку</span>
                            </div>
                        </div>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <div class="close-icon"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container" style="opacity: 0;">
                <div id="courses-list-container" class="courses-list-page row">
                    <div class="cta filter">
                        <a class="all active" data-filter="all" href="#" role="button">Показати всі</a>
													<?php
													$all_categories = get_top_cat($curent_category->term_id);
													foreach ($all_categories as $cat) {
														$category_id = $cat->term_id;
														echo '<a href="#" class="' . $cat->slug . '" data-filter="' . $cat->slug . '" role="button">' . $cat->name . '</a>';
													}
													?>
                    </div>


                    <div class="signature-container">
											<p><span class="course-level course-level-normal-signature">курс</span> &nbsp;- набір проводиться</p>
											<p><span class="course-level course-level-normal">курс</span> &nbsp;- попередня реєстрація</p>
										</div>

                    <div class="col-xs-12 boxes">
						<?php
						$all_categories = get_top_cat($curent_category->term_id);
						foreach ($all_categories as $cat) : ?>
							<?php
							$catslug = $cat->slug;
							$category_id = $cat->term_id; ?>
                  <div class="color-container row <?php echo $catslug; ?>" data-category="<?php echo $cat->slug; ?>-container">
                    <a href="#<?php echo $catslug; ?>"><h3 class="boxes-title" id="<?php echo $catslug; ?>"><?php echo $cat->name; ?> —</h3></a>
								<?php
								$args = array(
									'post_type'      => 'product',
									'posts_per_page' => -1,
									'tax_query'      => array(
										array(
											'taxonomy' => 'product_cat',
											'field'    => 'slug',
											'terms'    => $cat->slug,
										)
									)
								);
								$query         = new WP_Query;
								$products_list = $query->query($args);
								foreach ($products_list as $post): ?>
									<?php $_product = wc_get_product($post->ID);?>
                                    <div class="box col-lg-3 col-md-4 col-sm-4 col-xs-12 <?php echo $cat->slug ?>" data-category="<?php echo $catslug; ?>">
                            			<div class="cr-courses__item mode-gray <?php the_field('collection_group', $post->ID) ?> <?php the_field('status', $post->ID) ?>">
											<?php
											$cat_name_inner = '';
											$args           = array(
												'taxonomy'   => 'product_cat',
												'hide_empty' => false,
												'object_ids' => $post->ID
											);
											$terms          = get_terms($args);
											foreach ($terms as $cat) {
												if (category_has_children($cat->term_id) == false) {
													$cat_name_inner = $cat->name;
												}
											}
											?>
                                            <span class="course-level course-level-normal"><?php echo $cat_name_inner ?></span>
                                            <p class="cr-courses__title">
												<?php echo $post->post_title; ?>
                                            </p>
                                            <p class="course-start">
                                                Початок: <strong><?php the_field('start_mounse', $post->ID); ?></strong>
                                            </p>
                                            <p class="course-price">
                                                Вартість: <strong><?php echo $_product->get_regular_price(); ?> грн.</strong>
                                            </p>
                                            <p class="discount">
												<?php the_field('discount_text', $post->ID); ?>
                                            </p>
                                            <a class="cr-button center-block" href="<?php the_permalink($post->ID); ?>">переглянути</a>
                                        </div>
                                    </div>
									<?php
								endforeach;
								wp_reset_postdata();
								?>
                            </div>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer('shop'); ?>
