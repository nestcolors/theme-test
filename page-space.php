<?php get_header( 'shop' );
/* Template Name: Space */
?>
<?php
$place = 'place';
?>
<div class="modal-view">
	<div class="cr-section mod-black cr-spaces">

        <div class="container modal-navbar">
            <ul class="cr-horizontal-list pull-left">
                <img class="cr-logo-mobile modal-navbar-logo" src="<?php echo theme() ?>/src/images/assets/logo-dh-w.svg" alt="logo">
                <li class="cr-horizontal-list__item"><a href="<?php echo home_url() ?>" class="cr-header__link">Навчання</a></li>
                <li class="cr-horizontal-list__item"><a href="#" class="cr-header__link">Послуги</a></li>
            </ul>
        </div>


		<?php if ($space = get_field('space' )) { $count = 0; ?>
            <section>
			<?php foreach ($space as $s) { ?>
                <div id="<?php echo $place . $count++; ?>" class="cr-spaces-slider visible-slider">
				<?php foreach ($s['slides'] as $sl) { ?>
                    <div class="cr-spaces-slider-img" style="background-image: url('<?php echo $sl['image'] ?>')"></div>
				<?php } ?>
                </div>
			<?php } ?>
            </section>
		<?php } ?>


		<?php if ($repeater_name = get_field('repeater_name' )) { ?>
			<?php foreach ($repeater_name as $name) { ?>
                <div class="item">
                    <img src="<?php echo image_src($name['image'], 'small'); ?>" alt="">
                    <strong><?php echo $name['title']; ?></strong>
                    <p><?php echo $name['text']; ?></p>
                </div>
			<?php } ?>
		<?php } ?>



		<div class="cr-spaces-container">
			<div class="row space-desc-wrapper">
				<?php if ($space = get_field('space' )) { $count = -1; ?>
                    <div class="col-md-5 col-xs-6 space-selector">
                        <?php foreach ($space as $s) { $count++; ?>
                            <h3><a href="#" class="<?php echo $place . $count; if($count == 0) { echo ' active-link'; } ?> space-selector-item" data-space-name="<?php echo $place . $count ?>"><?php echo $s['name']; ?></a></h3>
                        <?php } ?>
                    </div>
				<?php } ?>
				<div class="col-md-7 col-xs-6">
					<div class="space-desc-body">
						<?php if ($space = get_field('space' )) { $count = 0; ?>
								<?php foreach ($space as $s) { ?>
                                    <ul id="<?php echo $place . $count++ ?>-text" class="<?php if($count == 1) { echo 'active-text'; } ?>">
                                        <?php foreach ($s['list_items'] as $li) { ?>
                                            <li>- <?php echo $li['text'] ?></li>
                                        <?php } ?>
                                    </ul>
								<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="map-container js-cr-map">
				<!--           <div id="pogulanka-map" class="map-item active-map">pogulanka here</div>
						  <div id="vakhnianyna-map" class="map-item">vakhnianyna here</div>
						  <div id="dudaeva-map" class="map-item">dudaeva here</div> -->
			</div>
		</div>

	</div>
</div>
<script>
	<?php if ($space = get_field('space' )) { $count = -1; ?>
        <?php foreach ($space as $s) { $count++ ?>
            var place<?php echo $count; ?> = document.getElementsByClassName('place'+'<?php echo $count; ?>')[0];
    	<?php } ?>
	<?php } ?>

    var map;
    var markers = [];
	<?php if ($space = get_field('space' )) { $count = -1; ?>
        <?php foreach ($space as $s) { $count++ ?>
            place<?php echo $count ?>.addEventListener("click", function(){
                showMarker('place'+'<?php echo $count ?>');
            });

        <?php } ?>
    <?php } ?>
    function showMarker(markerName) {
        for (var i = 0; i < markers.length; i++) {
            // console.log(markers[i]);
            markers[i].setMap(null);
            if(markers[i].title == markerName) {
                console.log(markers[i].title);
                markers[i].setMap(map);
            }
        }
    }


    function initMap() {
        var bounds  = new google.maps.LatLngBounds();
        var locations = [
	        <?php if ($space = get_field('space' )) { $count = -1; ?>
                <?php foreach ($space as $s) { $count++ ?>
                    ['place'+'<?php echo $count; ?>',<?php echo $s['map']['lat']?>,<?php echo $s['map']['lng'] ?>],
                <?php } ?>
            <?php } ?>
        ];
        map = new google.maps.Map(document.getElementsByClassName('js-cr-map')[0], {
            disableDefaultUI: false,
            center: {lat: 0, lng: 0},
            zoom: 15
        });
        for (var i in locations) {
            var position = new google.maps.LatLng(locations[i][1], locations[i][2]);
            bounds.extend(position);
            var marker = new google.maps.Marker({
                position: position,
                map: map,
                title: locations[i][0]
            });
            markers.push(marker)
        }
        map.panToBounds(bounds);
        map.fitBounds(bounds);
        showMarker('place0');
    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVTcBwJMTXFz3mOnx21ghxp7TqzO2Mm9U&callback=initMap"></script>

<?php get_footer('shop'); ?>
