    <div class="cr-section sm-margin cr-map__wrapper">
        <div class="container">
            <div class="cr-map__small-heder">головний офіс  —
            </div>
            <div class="cr-map__big-header">lviv,<br>Pogulanka, 5
            </div>
        </div>
        <div class="cr-map js-cr-map" >
	        <?php if ($contact_map = get_field('map', 'option')) { ?>
		        <?php echo do_shortcode('[googlemap id="contact_map" height="280px" icon="" coordinates="' .$contact_map['lat']. ', ' .$contact_map['lng']. '"][/googlemap]'); ?>
	        <?php } ?>
        </div>
    </div>
    <div class="cr-footer t-a-center">
        <div class="container">
            <ul class="cr-social-list pull-left">
                <li class="cr-social-list__item"><a href="<?php the_field('instagram','option') ?>">
                        <img src="<?php echo theme() ?>/src/images/icons/insta_white.svg" height="18" width="19" alt="">
                    </a></li>
                <li class="cr-social-list__item"><a href="<?php the_field('facebook','option') ?>">
                        <img src="<?php echo theme() ?>/src/images/icons/fb-white.svg" height="18" width="19" alt="">
                    </a></li>
            </ul>
            <a href="<?php echo home_url() ?>/prostori" class="cr-button mod-white pull-right tc-white">Простір</a>
	        <?php if ($footer_menu = get_field('footer_menu','option' )) { ?>
                <ul class="cr-horizontal-list">
	                <?php foreach ($footer_menu as $fm) { ?>
                    <li class="cr-horizontal-list__item"><a href="<?php echo $fm['link'] ?>" class="cr-link--white"><?php echo $fm['text'] ?></a></li>
	                <?php } ?>
                </ul>
	        <?php } ?>

            <div class="cr-footer__copyright">De House <?php echo date('Y'); ?></div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</div>
</body>
</html>
