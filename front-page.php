<?php get_header(); ?>

    <div class="cr-hero cr-home-hero">
        <div id="school-title" class="cr-section__header">
            <div class="cr-section__header-top">школа дизайну —  </div>
            Design school
        </div>
	    <?php if ($slider = get_field('slider' )) { ?>
            <div class="cr-hero-slider hidden-xs hidden-sm">
	            <?php foreach ($slider as $sl) { ?>
                    <div class="cr-hero-slide">
                        <video id="myVideo" class="cr-hero-video" poster="<?php echo $sl['video_poster'] ?>" autoplay nocontrols loop muted>
                            <source src="<?php echo $sl['video_url'] ?>" type="video/mp4">
                        </video>
                    </div>
	            <?php } ?>
            </div>
            <div class="cr-mobile-home-hero hidden-lg hidden-md">
                <div class="cr-mobile-hero-slider">
	                <?php foreach ($slider as $sl) { ?>
                        <div class="cr-mobile-img" style="background: url('<?php echo $sl["video_poster"] ?>')"></div>
	                <?php } ?>
                </div>
            </div>
	    <?php } ?>
      <div class="social-container">
        <ul>
          <li class=""><a target="_blank" class="outher-link" href="<?php the_field('facebook','option') ?>">
                  <img src="<?php echo theme() ?>/src/images/icons/fb-white.svg" height="20" width="20" alt="">
              </a></li>
          <li class=""><a target="_blank" class="outher-link" href="<?php the_field('instagram','option') ?>">
                  <img src="<?php echo theme() ?>/src/images/icons/insta_white.svg" height="20" width="20" alt="">
              </a></li>
        </ul>
      </div>
    </div>
        <a href="./about-course-page.html" class="cr-button cr-courses-list-btn tc-white hidden-md hidden-lg transparent" >список курсів</a>
        <?php if ($mega_menu = get_field('mega_menu' )) { ?>
            <div class="cr-main-menu-wrapper hidden-xs hidden-sm">
                <div class="cr-panel" id="js-main-menu">
                    <div class="cr-section__header-top">навчання —  </div><br>
	                <?php foreach ($mega_menu as $cl1) { ?>
                        <div class="cr-panel__item">
                            <div class="cr-panel__item-title"><?php echo $cl1['text'] ?></div>
		                    <?php if ($cl1['subcategory']) { ?>
                            <ul class="cr-panel__item-content">
			                    <?php foreach ($cl1['subcategory'] as $cl2) { ?>
                                <li class="cr-hover-menu">
                                    <div class="cr-hover-menu__title"><?php echo $cl2['category_level_2'] ?></div>
				                    <?php if ($cl2['subcategory']) { ?>
                                    <ul class="cr-hover-menu__content">
					                    <?php foreach ($cl2['subcategory'] as $cl3) { ?>
                                        <li class="cr-accordeon">
                                            <div class="cr-accordeon__title"><?php echo $cl3['category_level_3'] ?></div>
						                    <?php if ($cl3['subcategory']) { ?>
                                            <div class="cr-accordeon__content">
                                                <ul class="cr-menu-list">
							                        <?php foreach ($cl3['subcategory'] as $cl4) { ?>
                                                    <li class="cr-menu-list__item">
                                                        <a href="<?php echo $cl4['link'] ?>">
                                                            <?php echo $cl4['category_level_4'] ?>
                                                        </a>
                                                        <div class="cr-course-info">
                                                            <strong><?php echo $cl4['dates'] ?> </strong>&nbsp;<?php echo $cl4['info'] ?>
								                            <?php if ($cl4['price']) { ?>
                                                            <div class="cr-course--price">
                                                                ціна:
                                                                <div>
                                                                    <strong><?php echo $cl4['price'] ?></strong>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
						                    <?php } ?>
                                        </li>
					                    <?php } ?>
                                    </ul>
				                    <?php } ?>
                                </li>
			                    <?php } ?>
                            </ul>
		                    <?php } ?>
                        </div>
	                <?php } ?>
                </div>
                <div class="all-courses-link-container">
                    <a href="<?php echo theme() ?>/shop" class="cr-button pull-right">всі курси</a>
                </div>
            </div>
        <?php } ?>

        <!-- <button class="cr-button--vertical mod-white hidden-xs">
		</button> -->
        <!-- <a href="" style="color: black;" class="cr-button__label tc-mint"><img src="./src/images/icons/mouse.svg" alt="">події</a> -->
    </div>
    <div class="cr-section less-margin">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="cr-section__header">
                        <div class="cr-section__header-top">події —  </div>
                        Events
                    </div>
                </div>
            </div>
        </div>
	    <?php
	    $events = get_field('events');
	    if( $events ): ?>
        <div class="container cr-events-container cursor-pointer">
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
            <hr class="hidden-sm hidden-xs">
                <?php foreach( $events as $ev ): // variable must NOT be called $post (IMPORTANT) ?>
                    <a class="courses-link <?php the_field('mark_events', $ev->ID) ?>" href="<?php echo get_the_permalink($ev->ID); ?>">
                        <div class="row">
                            <div class="cr-table__row-caption col-md-4 col-sm-5">
                                <div class="about-course-title"><?php echo get_the_title($ev->ID) ?></div>
                                <div class="about-course-title"><?php the_field( 'author', $ev->ID); ?></div>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <div class="t-bold"><span class="cr-cell-label hidden-sm hidden-md hidden-lg">Де:</span><?php the_field( 'place_name', $ev->ID ); ?></div>
                                <div><?php the_field( 'place_address', $ev->ID ); ?></div>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <div class="t-bold"><span class="cr-cell-label  hidden-sm hidden-md hidden-lg">Коли:</span><?php the_field( 'date_time', $ev->ID ); ?></div>
                                <div><?php the_field( 'date_text', $ev->ID ); ?></div>
                            </div>
                            <div class="col-md-3 col-md-offset-0 col-sm-6 col-sm-offset-5">
                                <div class="t-bold"><span class="cr-cell-label hidden-md hidden-lg">Вартість:</span><?php the_field( 'price', $ev->ID ); ?></div>
                                <div><?php the_field( 'price_text', $ev->ID ); ?></div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <div class="row">
                <div class="col-sm-9 col-xs-7 col-xs-offset-2">
                    <a href="<?php echo theme() ?>/events/" class="cr-button pull-right center-block">всі події</a>
                </div>
            </div>
        </div>
	    <?php endif; ?>
    </div>

    <div class="cr-section extra-margin">
        <div class="container">
            <div class="cr-quote"><?php the_field( 'text' ); ?>
                <div class="cr-quote__author">
                    - <?php the_field( 'author' ); ?>
                </div>
            </div>

        </div>
    </div>
<?php include 'dehouse.php' ?>


<?php get_footer(); ?>
