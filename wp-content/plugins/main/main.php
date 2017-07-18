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

define( 'MAIN__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
require_once( MAIN__PLUGIN_DIR . '/classes/post.class.php' );
require_once( MAIN__PLUGIN_DIR . '/classes/taxonomy.class.php' );

$orders_param = array(
  'slug' => 'orders',
  'name' => 'Orders',
  'singular_name' => 'order',
  'is_public' => true,
  'has_archive' => false,
  'taxonomies' => array('delivery'),
  'supports' => array('title', 'editor'),
  );

$products_param = array(
  'slug' => 'products',
  'name' => 'Products',
  'singular_name' => 'product',
  'is_public' => true,
  'has_archive' => false,
  'taxonomies' => array('category', 'post_tag' )
  );

$tax_param = array(
  'slug' => 'delivery',
  'name' => 'Delivery'
  );

$status_param = array(
  'slug' => 'status',
  'name' => 'Status'
  );

$orders = new Custom_Post_Types ($orders_param);
$products = new Custom_Post_Types ($products_param);
$delivery = new Custom_Taxonomy ($tax_param);
$status = new Custom_Taxonomy ($status_param);


function add_terms() {
  wp_insert_term('Самовывоз','delivery', array('slug'=>'samovyvoz'));
  wp_insert_term('Доставка почтой','delivery', array('slug'=>'dostavka-pochtoj'));
  wp_insert_term('Курьерская доставка','delivery', array('slug'=>'kurjerskaya-dostavka'));
  wp_insert_term('Обрабатывается','status', array('slug'=>'obrabatyvaetsia'));
  wp_insert_term('Отправлен','status', array('slug'=>'otpravlen'));
  wp_insert_term('Отклонен','status', array('slug'=>'otklonen'));
}
add_action('init','add_terms');
