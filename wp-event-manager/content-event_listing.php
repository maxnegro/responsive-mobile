<div  class="line-layout">
<li  <?php event_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>">
  <div class="event-info-row-listing">
	<a href="<?php display_event_permalink(); ?>">
	   <div class="row">
            <div class="col-md-1">
                <div class="organizer-logo">
                    <?php  display_event_banner(); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="event-title">
                    <h4><?php echo esc_html( get_the_title() ); ?></h4>
                    <div class="boxes-view-listing-registered-code">
                        <?php do_action('event_already_registered_title');?>
                    </div>
                </div>
                <div class="event-organizer-name">
                    <?php display_organizer_name( '<normal>', '<normal>' ); ?>
                </div>
            </div>
            <div class="col-md-2">
    			   <div class="date">
    			        <date><?php display_event_start_date();?></date>
    			   </div>
	        </div>
	        <div class="col-md-3">
		        <div class="event-location"><i class="glyphicon glyphicon-map-marker"></i>
		          <?php if(get_event_location()=='Anywhere' || get_event_location() == ''): echo __('Online Event','wp-event-manager'); else:  display_event_location(false); endif; ?>
		       </div>
	        </div>
	        <div class="col-md-2">
                <div class="event-ticket"><?php echo '#'.get_event_ticket_option(); ?></div>
            </div>
            <div class="col-md-3"> <?php if ( get_option( 'event_manager_enable_event_types' ) ) { display_event_type(); } ?></div>
        </div>
      </a>
     </div>
   </li>
</div>

<!-- Box Layout -->
<aside class="col-sm-4">
<a href="<?php display_event_permalink(); ?>">
 <div class="card card-default">
   <div class="card-header"><?php the_title(); ?></div>
   <div class="card-body card-5-7" style="height: 250px;">
    <div class="card-left">
      <?php  display_event_banner(); ?>
    </div>
    <div class="card-right">
      da <?php display_event_start_date();?><br />
      a <?php display_event_end_date(); ?>
    </div>
    <div class="card-body">
    <?php if (!empty(get_event_description())) : ?>
      <?php display_event_description(); ?>
    <?php endif; ?>
    </div>
   </div>
   <div class="card-footer">
     <?php if (!empty(get_event_location())) : ?>
       <i class="glyphicon glyphicon-map-marker"></i>
       <?php display_event_location(false); ?>
     <?php endif; ?>
   </div>
  </div>

 </div>
</a>
</aside>
<!-- Box Layout end-->

<script>
jQuery(document).ready(function($)
{
   ContentEventListing.init();
});</script>
