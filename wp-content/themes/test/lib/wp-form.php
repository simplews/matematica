<?php
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_order") {

    $description = 'Order from '.$_POST('firstname').' '.$_POST('lastname').' for '.$_POST['product'].'.<br>Clients email '.$_POST('email');
    $tags = $_POST['post_tags'];

    // Add the content of the form to $post as an array
    $new_order = array(
        'post_title'    => 'Order from '.$_POST('firstname').' '.$_POST('lastname'),
        'post_content'  => $description,
        'post_status'   => 'publish',
        'post_type' => 'orders'
    );
    //save the new post
    if ( !isset( $id ) ) {
    $id = wp_insert_post( $new_order, true );
  }
}
var_dump($_POST['action']);
