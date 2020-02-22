<?php
function wpem_limit_upcoming($query_args, $args) {
  $query_args['meta_query'][] = array(
    'key' => '_event_start_date',
    'value' => date('Y-m-d', time()),
    'compare' => '>=',
    'type' => 'date'
  );
  return ($query_args);
}
add_filter('get_event_listings_query_args', 'wpem_limit_upcoming', 20, 2);

function mes_custom_orderby( $query_args ) {
    $query_args[ 'orderby' ] = 'meta_value'; //orderby will be according to data stored inside the particular meta key
    $query_args[ 'order' ] = 'DESC';
    return $query_args;
}

add_filter( 'event_manager_get_listings_args', 'mes_custom_orderby', 99 );
