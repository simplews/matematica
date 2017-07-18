<?php
/*
Plugin Name: CT dash filter
Plugin URI: https://github.com/simplews/matematica
Description: Used for showing custom taxonomy filter.
Version: 1.0.0
Author: Andriy Ozorovych
Author URI: https://github.com/simplews
License: N/A
Text Domain: main
*/

add_action('restrict_manage_posts', 'filter_post_type_by_taxonomy');
function filter_post_type_by_taxonomy() {
  global $typenow;
  $post_type = 'orders'; // change to your post type
  $taxonomy  = 'delivery'; // change to your taxonomy
  if ($typenow == $post_type) {
    $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
    $info_taxonomy = get_taxonomy($taxonomy);
    wp_dropdown_categories(array(
      'show_option_all' => __("Show All {$info_taxonomy->label}"),
      'taxonomy'        => $taxonomy,
      'name'            => $taxonomy,
      'orderby'         => 'name',
      'selected'        => $selected,
      'show_count'      => true,
      'hide_empty'      => false,
      'hierarchical' => 1,
    ));
  };
}

add_filter('parse_query', 'convert_id_to_term_in_query');
function convert_id_to_term_in_query($query) {
  global $pagenow;
  $post_type = 'orders'; // change to your post type
  $taxonomy  = 'delivery'; // change to your taxonomy
  $q_vars    = &$query->query_vars;
  if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
    $q_vars[$taxonomy] = $term->slug;
  }
}
add_filter('manage_edit-orders_columns', 'order_columns');
add_action('manage_posts_custom_column', 'order_custom_columns',10,2);

function order_columns($columns){
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Title',
        'orders-type' => 'Delivery',
        'date' => 'Ordered on'
    );
    return $columns;
}

function order_custom_columns($column,$id) {
    global $wpdb;
          $types = $wpdb->get_results("SELECT name FROM $wpdb->posts LEFT OUTER JOIN $wpdb->term_relationships ON ID = object_id LEFT OUTER JOIN $wpdb->terms ON term_taxonomy_id = term_id WHERE ID = {$id}");
          foreach($types as $loopId => $type) {
          echo $type->name;
          }
        }
