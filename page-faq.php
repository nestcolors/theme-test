<?php get_header('shop');
/* Template Name: FAQ */ ?>
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
								<div class="cr-section__header-top">ПОШИРЕНІ ПИТАННЯ ТА ВІДПОВІДІ </div>
								FAQ
							</div>
						</div>
					</div>
					<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
						<div class="close-icon"></div>
					</a>
				</div>
			</div>
		<?php if ($faq = get_field('faq' )) { ?>
			<div class="row cr-events-list modal-body cr-faq-modal">
				<!--         <div class="cr-faq-modal__header">
						  <div class="cr-faq-modal__header-top">поширені питання та відповіді  —  </div>
						  <div class="cr-faq-modal__header-bottom">faq</div>
						  <a class="cr-faq-modal__close-btn" href="./home-page.html">
							<span></span><span></span>
						  </a>
						</div> -->

			<?php foreach ($faq as $f) { ?>
				<div class="row">
					<div class="col-xs-12 col-md-5">
						<div class="cr-faq-row-caption">
							<?php echo $f['question']?>
						</div>
					</div>
					<div class="col-xs-12 col-md-7">
						<p class="cr-faq-row-answer">
							<?php echo $f['answer']?>
						</p>
					</div>
				</div>
			<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>
<?php get_footer('shop'); ?>
