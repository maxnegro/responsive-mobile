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
