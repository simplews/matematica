<?php

class Custom_Taxonomy {
  function __construct($init) {
    $this->settings = $init;
    register_activation_hook(__FILE__,array($this,'activate'));
    add_action( 'init', array( &$this, 'create_taxonomies' ) );
  }

  function create_taxonomies() {
    register_taxonomy(
      $this->settings['slug'],
      'orders',
      array(
        'hierarchical' => true,
        'label' => __( $this->settings['name'] ),
        )
      );
  }
}
