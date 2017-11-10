<?php get_header('shop') ?>
	<div class="modal-view">
		<div class="cr-section mod-black">
			<div class="container" style="opacity: 0;">
				<div class="row">
					<div class="col-xs-12">
						<a href="<?php echo home_url() ?>" class="cr-header__logo">
							<img src="<?php echo theme() ?>/src/images/assets/logo-creative-w.svg" alt="logo" class="">
						</a>
						<div class="cr-section__header" style="padding: 90px 0 30px">
							<div class="cr-section__header-top"><?php the_field( 'category' ); ?> | <?php the_field( 'year' ); ?>  —  </div>
							<?php the_field( 'author' ); ?>
						</div>
						<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
							<div class="close-icon"></div>
						</a>
					</div>
				</div>
			</div>
			<?php
			$images = get_field('gallery');
			if( $images ): ?>
			<div class="container cr-album modal-body" style="opacity: 0;">
				<div class="row">
					<div class="col-md-12">
						<div class="cr-album-slider">
							<?php foreach( $images as $image ): ?>
								<div>
									<img src="<?php echo $image['url']; ?>">
								</div>
							<?php endforeach; ?>
						</div>
						<h2 class="tc-white"><?php the_field( 'caption' ); ?></h2>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer('shop') ?>
