<?php

include_once 'lib/wp-navwalker.php';

global $matematica_test_version;

$matematica_test_version = '1.0.0';

// Le sigh...
if ( ! isset( $content_width ) ) $content_width = 837;


if ( ! function_exists( 'matematica_test_widgets_init' ) ) :
  function matematica_test_widgets_init() {
    register_sidebar( array(
      'name' => __( 'Right Sidebar', 'matematica-test' ),
      'id' => 'right-sidebar',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ) );
  }
endif;
add_action( 'widgets_init', 'matematica_test_widgets_init' );


if ( ! function_exists( 'matematica_test_setup' ) ) :
  function matematica_test_setup() {

    add_theme_support( 'custom-background', array(
      'default-color' => 'ffffff',
    ) );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    register_nav_menus( array(
      'main_menu' => __( 'Main Menu', 'matematica-test' ),
      // 'footer_menu' => 'Footer Menu'
    ) );

    add_editor_style( 'css/bootstrap.min.css' );
  }
endif; // matematica_test_setup
add_action( 'after_setup_theme', 'matematica_test_setup' );


if ( ! function_exists( 'matematica_test_theme_styles' ) ) :
  function matematica_test_theme_styles() {
    global $matematica_test_version;
    wp_enqueue_style( 'matematica-test-styles', get_stylesheet_uri(), $matematica_test_version, true );
  }
endif;
add_action('wp_enqueue_scripts', 'matematica_test_theme_styles');


if ( ! function_exists( 'matematica_test_theme_scripts' ) ) :
  function matematica_test_theme_scripts() {
    global $matematica_test_version;
    wp_enqueue_script( 'matematica-test-scripts', get_template_directory_uri() . '/scripts.js', array( 'jquery' ), $matematica_test_version, true );
  }
endif;
add_action('wp_enqueue_scripts', 'matematica_test_theme_scripts');


function matematica_test_nav_li_class( $classes, $item ) {
  $classes[] .= ' nav-item';
  return $classes;
}
add_filter( 'nav_menu_css_class', 'matematica_test_nav_li_class', 10, 2 );


function matematica_test_nav_anchor_class( $atts, $item, $args ) {
  $atts['class'] .= ' nav-link';
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'matematica_test_nav_anchor_class', 10, 3 );
