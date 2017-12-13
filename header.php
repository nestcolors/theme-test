<?php
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 3600));
header('Content-Type: text/html; charset=utf-8');
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header('X-UA-Compatible: IE=Edge,chrome=1');
/*
// HTML Compress
function ob_html_compress($buf){
return preg_replace(array('/<!--(?>(?!\[).)(.*)(?>(?!\]).)-->/Uis','/[[:blank:]]+/'),array('',' '),str_replace(array("\n","\r","\t"),'',$buf));
}
ob_start('ob_html_compress');
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <title><?php wpa_title(); ?></title>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
<!--    <meta name="theme-color" content="#6aa35b">--><!--add color-->
    <meta name="format-detection" content="telephone=no">
<!--    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="--><?php //echo theme('images/favicon.png'); ?><!--" sizes="16x16 32x32 48x48">-->
<!--    <link rel="shortcut icon" type="image/x-icon" href="--><?php //echo theme('images/favicon.png'); ?><!--" sizes="16x16">-->
<!--    <link rel="icon" type="image/x-icon" href="--><?php //echo theme('images/favicon.png'); ?><!--" sizes="16x16">-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>  data-hash="<?php wpa_fontbase64(true); ?>" data-a="<?php echo admin_url('admin-ajax.php'); ?>">
  <div class="loading-curtain">
    <div style="margin-top: 45vh; text-align: center;">
      <img width="190px" height="auto" class="cr-logo-mobile" src="<?php echo theme() ?>/src/images/assets/logo-creative.svg" alt="logo">
      <br>
      <!-- <p style="font-size: 20px; color: grey; margin-top: 10px; font-family: `sans-serif`; font-weight: 400 !important;">DESIGN SCHOOL</p> -->
    </div>
  </div>
  <div class="website-container" style="display: none">
    <div class="home-page page-wrapper" id="home-page">
        <div class="cr-header" id="js-header">
            <div class="cr-header__motto">design in you, design for you</div>
            <div class="cr-header__mobile hidden-md hidden-lg">
                <a href="<?php echo home_url() ?>" class="cr-header__logo">
                    <img class="cr-logo-mobile" src="<?php echo theme() ?>/src/images/assets/logo-creative.svg" alt="logo">
                </a>
                <div class="cr-burger-btn"></div>
            </div>
            <div class="cr-header__fixed-part">
                <div class="container hidden-xs hidden-sm">
                    <div class="row">
	                    <?php if ($left_menu = get_field('left_menu','option' )) { ?>
                            <ul class="cr-horizontal-list pull-left">
	                            <?php foreach ($left_menu as $lm) { ?>
                                    <li class="cr-horizontal-list__item <?php if ($lm['submenu'] == true) { echo 'cr-sublist-container'; } ?>"><a href="<?php echo $lm['link'] ?>" class="cr-header__link"><?php echo $lm['text'] ?></a>
	                                    <?php if ($lm['submenu'] == true) { ?>
                                            <ul class="cr-horizontal-list-sub-menu hidden-sm hidden-xs">
                                            <?php foreach ($lm['submenu'] as $l) { ?>
                                                <li class="cr-sub-menu-item"><a href="<?php echo $l['link'] ?>" class="cr-header__link"><?php echo $l['text'] ?></a></li>
                                            <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
	                            <?php } ?>
                            </ul>
	                    <?php } ?>
                        <a href="<?php echo home_url() ?>" class="cr-header__logo hidden-sm hidden-xs">
                            <img src="<?php echo theme() ?>/src/images/assets/logo-creative.svg" alt="logo" class="hidden-sm hidden-xs cr-logo">
                            <img src="<?php echo theme() ?>/src/images/assets/logo-creative-w.svg" alt="logo" class="hidden-md hidden-lg cr-logo">
                        </a>
	                    <?php if ($right_menu = get_field('right_menu','option' )) { ?>
                            <ul class="cr-horizontal-list pull-right">
			                    <?php foreach ($right_menu as $rm) { ?>
                                    <li class="cr-horizontal-list__item <?php if ($rm['submenu'] == true) { echo 'cr-sublist-container'; } ?>"><a href="<?php echo $rm['link'] ?>" class="cr-header__link"><?php echo $rm['text'] ?></a>
					                    <?php if ($rm['submenu'] == true) { ?>
                                            <ul class="cr-horizontal-list-sub-menu hidden-sm hidden-xs">
							                    <?php foreach ($rm['submenu'] as $r) { ?>
                                    <li class="cr-sub-menu-item"><a href="<?php echo $r['link'] ?>" class="cr-header__link"><?php echo $r['text'] ?></a></li>
							                    <?php } ?>
                                            </ul>
					                    <?php } ?>
                                    </li>
			                    <?php } ?>
                                <li class="cr-horizontal-list__item js-popup-container"><a href="<?php echo theme() ?>/contacts" class="cr-header__link">Контакти</a>
                                    <div class="cr-header-popup">
                                        <div class="cr-contacts">
<!--	                                        --><?php //the_field( 'contact_information','option' ); ?>
                                            <div class="cr-contacts--location">
	                                            <?php the_field( 'office','option' ); ?>
                                            </div>
                                            <div class="cr-contacts--address">
	                                            <a target="_blank" class="outher-link" href="https://www.google.com.ua/maps/place/CREATIVE/@49.8292881,24.0517869,19.66z/data=!4m5!3m4!1s0x473add5003f132b7:0xd87ecdd2c87a97a5!8m2!3d49.8295061!4d24.0516586?hl=en"><?php the_field( 'address','option' ); ?></a>
                                            </div>
                                            <div class="cr-contacts--working-hour">
	                                            <?php the_field( 'hours','option' ); ?>
                                            </div>
                                            <div class="cr-contacts--phone">
                    	                        <a class="outher-link" href="tel:<?php the_field( 'phone','option' ); ?>"><?php the_field( 'phone','option' ); ?></a> |
                                              <a class="outher-link" href="tel:<?php the_field( 'phone_2','option' ); ?>"><?php the_field( 'phone_2','option' ); ?></a>
                                            </div>
	                                        <?php the_field( 'email','option' ); ?>
                                            <hr>
                                            <ul class="cr-social-list">
                                              <li class="cr-social-list__item"><a href="<?php the_field('facebook','option') ?>" class="outher-link" target="_blank" >
                                                <img src="<?php echo theme() ?>/src/images/icons/fb-black.svg" height="23" width="24" alt="">
                                                  </a>
                                              </li>
                                              <li class="cr-social-list__item"><a href="<?php the_field('instagram','option') ?>" class="outher-link" target="_blank" >
                                                <img src="<?php echo theme() ?>/src/images/icons/insta-black.svg" height="23" width="24" alt="">
                                                  </a>
                                              </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="cr-black-curtain"></div>
	                    <?php } ?>
<!--                        <a class="cr-close-btn"></a>-->
                    </div>
                </div>
                <div class="cr-mobile-menu-wrapper hidden-md hidden-lg">
                <div class="container">
	                <?php if ($left_menu = get_field('left_menu','option' )) { ?>
                        <ul class="cr-vertical-list">
			                <?php foreach ($left_menu as $lm) { ?>
                                <li class="cr-vertical-list__item"><a href="<?php echo $lm['link'] ?>"><?php echo $lm['text'] ?></a>
                                  <?php if ($lm['submenu'] == true) { ?>
                                      <ul class="cr-horizontal-list-sub-menu mobile-submenu-list">
                                      <?php foreach ($lm['submenu'] as $r) { ?>
                                          <li class="cr-vertical-list__item mobile-submenu"><a href="<?php echo $r['link'] ?>" class=""><?php echo $r['text'] ?></a></li>
                                      <?php } ?>
                                      </ul>
                                  <?php } ?>
                                </li>
			                <?php } ?>
                        </ul>
	                <?php } ?>
	                <?php if ($right_menu = get_field('right_menu','option' )) { ?>
                        <ul class="cr-vertical-list">
			                <?php foreach ($right_menu as $rm) { ?>
                                <li class="cr-vertical-list__item"><a href="<?php echo $rm['link'] ?>"><?php echo $rm['text'] ?></a></li>
			                <?php } ?>
                        </ul>
                        <div class="cr-black-curtain"></div>
	                <?php } ?>
                    <div class="cr-contacts">
                        <hr>
                        <div class="cr-contacts--location">
	                        <?php the_field( 'office','option' ); ?>
                        </div>
                        <ul class="cr-social-list">
                            <li class="cr-social-list__item"><a class="outher-link" target="_blank" href="<?php the_field('facebook','option') ?>">
                                    <img src="<?php echo theme() ?>/src/images/icons/fb-white.svg" height="30" width="30" alt="">
                                </a></li>
                            <li class="cr-social-list__item"><a class="outher-link" target="_blank" href="<?php the_field('instagram','option') ?>">
                                    <img src="<?php echo theme() ?>/src/images/icons/insta_white.svg" height="30" width="30" alt="">
                                </a></li>
                        </ul>
	                    <?php the_field( 'email','option' ); ?>
                        <div class="cr-contacts--phone">
                          <a class="outher-link" href="tel:<?php the_field( 'phone','option' ); ?>"><?php the_field( 'phone','option' ); ?></a> |
                          <a class="outher-link" href="tel:<?php the_field( 'phone_2','option' ); ?>"><?php the_field( 'phone_2','option' ); ?></a>
                        </div>
                        <div class="cr-contacts--address">
	                        <?php the_field( 'address','option' ); ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <span class="cr-burger-btn hidden-md hidden-lg"></span>
        </div>
