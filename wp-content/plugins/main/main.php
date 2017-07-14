<?php
/*
Plugin Name: Main plugin for website
Plugin URI: https://github.com/simplews/matematica
Description: Used for creating custom post types and taxonomies.
Version: 1.0.0
Author: Andriy Ozorovych
Author URI: https://github.com/simplews
License: N/A
Text Domain: main
*/
class Custom_Post_Types{

  function __construct($init){
    $this->settings = $init;
    add_action( 'init', array(&$this, 'add_custom_post_type') );
  }
  function add_custom_post_type(){
    register_post_type( $this->settings['slug'],
    array(
      'labels' => array(
        'name' => __( $this->settings['name'] ),
        'singular_name' => __( $this->settings['singular_name'] )
        ),
      'taxonomies' => $this->settings['taxonomies'],
      'public' => $this->settings['is_public'],
      'has_archive' => $this->settings['has_archive']
      )
     );
  }
}

class Custom_Taxonomy{

  function __construct($init){
    $this->settings = $init;
    add_action( 'init', array(&$this, 'add_custom_taxonomies') );
  }
  function add_custom_taxonomies(){
    register_taxonomy(
    $this->settings['slug'],
    'orders',
    array(
      'label' => __( $this->settings['name'] ),
    )
  );
  }

}

$orders_param = array(
    "slug" => "orders",
    "name" => "Orders",
    "singular_name" => "order",
    "is_public" => true,
    "has_archive" => false,
    "taxonomies" => array('delivery')
);

$products_param = array(
    "slug" => "products",
    "name" => "Products",
    "singular_name" => "product",
    "is_public" => true,
    "has_archive" => false,
    "taxonomies" => array('category', 'post_tag' )
);

$tax_param = array(
  "slug" => "delivery",
  "name" => "Delivery"
);

$status_param = array(
  "slug" => "status",
  "name" => "Status"
);

$orders = new Custom_Post_Types ($orders_param);
$products = new Custom_Post_Types ($products_param);
$delivery = new Custom_Taxonomy($tax_param);
$status = new Custom_Taxonomy($status_param);
