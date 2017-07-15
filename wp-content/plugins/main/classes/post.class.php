<?php
class Custom_Post_Types{

  public function __construct($init){
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
