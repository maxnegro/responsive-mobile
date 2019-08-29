<?php
global $post;
$start_date = get_event_start_date ();
$end_date = get_event_end_date ();
wp_enqueue_script('wp-event-manager-slick-script');
wp_enqueue_style( 'wp-event-manager-slick-style');
do_action('set_single_listing_view_count');
?>
<div class="single_event_listing" itemscope
	itemtype="http://schema.org/EventPosting">
	<meta itemprop="title"
		content="<?php echo esc_attr( $post->post_title ); ?>" />

	<div class="wpem-main wpem-single-event-page">
		<?php if ( get_option( 'event_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status ) : ?>
		<div class="event-manager-info wpem-alert wpem-alert-danger"><?php _e( 'This listing has been expired.', 'wp-event-manager' ); ?></div>
		<?php else : ?>
			<?php if ( is_event_cancelled() ) : ?>
              <div class="wpem-alert wpem-alert-danger">
              	<span class="event-cancelled" itemprop="eventCancelled"><?php _e( 'This event has been cancelled', 'wp-event-manager' ); ?></span>
			  </div>
            <?php elseif ( ! attendees_can_apply() && 'preview' !== $post->post_status ) : ?>
               <div class="wpem-alert wpem-alert-danger">
               	<span class="listing-expired" itemprop="eventExpired"><?php _e( 'Registrations have closed', 'wp-event-manager' ); ?></span>
               </div>
	        <?php endif; ?>
		<?php
			/**
			 * single_event_listing_start hook
			 */
			do_action ( 'single_event_listing_start' );
			?>
		<div class="wpem-single-event-wrapper">
			<div class="wpem-single-event-header-top">
				<div class="wpem-row">

				 <div class="wpem-col-xs-12 wpem-col-sm-7 wpem-col-md-8 wpem-single-event-images">
				 <?php
			$event_banners = get_event_banner ();
			if (is_array ( $event_banners ) && sizeof ( $event_banners ) > 1) :
				?>
				 <div class="wpem-single-event-slider-wrapper">
							<div class="wpem-single-event-slider">
				 		<?php foreach( $event_banners as $banner_key => $banner_value ) :  ?>
				 			<div class="wpem-slider-items">
									<img src="<?php echo $banner_value;?>" alt="<?php the_title();?>" />
								</div>
				 		<?php endforeach;?>
				 	</div>
						</div>
				 <?php else : ?>
				 	<div class="wpem-event-single-image-wrapper">
							<div class="wpem-event-single-image"><?php display_event_banner();?></div>
						</div>
				 <?php endif;?>
				 </div>
					<div class="wpem-col-xs-12 wpem-col-md-4 wpem-single-event-short-info">
						<div class="wpem-event-date">
							<div class="wpem-event-date-type">
        					<?php if (isset($start_date) && isset($end_date)) :  ?>
                          <div class="wpem-from-date">
									<div class="wpem-date"><?php echo date_i18n('d',strtotime($start_date));?></div>
									<div class="wpem-month"><?php echo date_i18n('M',strtotime($start_date));?></div>
								</div>
								<div class="wpem-to-date">
									<div class="wpem-date-separator">-</div>
									<div class="wpem-date"><?php echo date_i18n('d',strtotime($end_date));?></div>
									<div class="wpem-month"><?php echo date_i18n('M',strtotime($end_date));?></div>
								</div>
        					<?php endif;?>
                        </div>
						</div>
						<div class="wpem-event-details">
							<?php if(get_event_venue_name()) : ?>
							<?php  display_event_venue_name(); ?>
							<div class="clearfix">&nbsp;</div>
							<?php endif;?>
              <?php if(get_event_address()){ display_event_address(); echo ',';} ?> <?php display_event_location();?>

							<?php if (get_organizer_name()) : ?>
							<div class="clearfix">&nbsp;</div>
							<div><strong>Organizzato da:</strong></div>
							<div class="wpem-event-organizer">
								<div class="wpem-event-organizer-name">
									<?php do_action('single_event_organizer_name_start');?>
									<?php echo get_organizer_name() ;?>
									<?php do_action('single_event_organizer_name_end');?>
								</div>
							</div>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
			<div class="wpem-single-event-body">
				<div class="wpem-row">
					<div class="wpem-col-xs-12 wpem-single-event-left-content">
               <?php do_action('single_event_overview_before');?>
              <div class="wpem-single-event-body-content">
               <?php do_action('single_event_overview_start');?>
               	<?php echo apply_filters( 'display_event_description', get_the_content() ); ?>
               <?php do_action('single_event_overview_end');?>
              </div>
               <?php do_action('single_event_overview_after');?>
          </div>

					<div class="clearfix" style="margin-top: 20px"> </div>
					<div class="card card-body bg-transparent col-12">
						<h3>Informazioni utili</h3>
						<div class="row">
							<?php
							$mm_icon = [
								'_event_link_to_eventpage' => 'fas fa-globe',
								'_organizer_email' => 'fas fa-envelope',
								'_cellulare' => 'fas fa-mobile',
								'_telefono' => 'fas fa-phone',
								'_organizer_facebook' => 'fab fa-facebook',
							];
							$custom = get_post_custom($post->ID);
							$custom["_fulladdress"][0] = sprintf("%s - %s",
								$custom['_event_address'][0],
								$custom['_event_location'][0]
							);

							foreach (array_keys($mm_icon) as $campo) {
								if (!empty($custom[$campo][0])) {
									printf('<aside class="col-12">');
									printf('<div class="iconbox">');
									printf('<div class="icon-wrap"><i class="%s"></i></div> ', $mm_icon[$campo]);
									// printf('<div class="icon-wrap"><span class="glyphicon glyphicon-%s" aria-hidden="true"></span></div> ', $mm_icon[$campo]);
									switch ($campo) {
										case '_organizer_email':
											printf('<div class="text-wrap"><p><a href="mailto:%s">%s</a></p></div>', $custom[$campo][0], $custom[$campo][0]);
											break;
										case '_event_link_to_eventpage':
										case '_organizer_facebook':
											printf('<div class="text-wrap"><p><a href="%s" rel="nofollow" target="_blank">%s</a></p></div>', $custom[$campo][0], $custom[$campo][0]);
											break;
										default:
											printf('<div class="text-wrap"><p>%s</p></div>', $custom[$campo][0]);
									}
									printf("</div>\n");
									printf("</aside>\n");
								}
							}
							if (!empty($custom['_fulladdress'][0])) {
								printf('<div class="w-100 p-5">');
								printf('<iframe style="width: 100%%; height: 480px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=%s&z=14&output=embed"></iframe>', $custom['_fulladdress'][0]);
								printf('</div>');
							}
							?>
						</div>
					</div>


			</div>

	<?php

			// get_event_manager_template_part( 'content', 'single-event_listing-organizer' );
			/**
			 * single_event_listing_end hook
			 */
			do_action ( 'single_event_listing_end' );
			?>
  <?php endif; ?>
			<!-- Main if condition end -->
		</div>
		<!-- / wpem-wrapper end  -->

	</div>
	<!-- / wpem-main end  -->
</div>
