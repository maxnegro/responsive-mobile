<?php
function wpem_limit_upcoming($query_args, $args) {
  $query_args['meta_query']['mes_wpem'] = array(
    'key' => '_event_start_date',
    'value' => date('Y-m-d', time()),
    'compare' => '>=',
    'type' => 'date'
  );
  $query_args[ 'orderby' ] =  array ('mes_wpem' => 'ASC'); //orderby will be according to data stored inside the particular meta key

  return ($query_args);
}
add_filter('get_event_listings_query_args', 'wpem_limit_upcoming', 20, 2);
