<?php
require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {
  $post_title = wp_strip_all_tags('Order of '.$_POST['product'].' from '.$_POST['firstname']);
  $post_content = $post_title.' '.wp_strip_all_tags($_POST['lastname']).' via '.wp_strip_all_tags($_POST['email']).'. Delivery: '.$_POST['delivery'];

  if ( trim( $_POST['firstname'] ) === '' ) {
    $postTitleError = 'Пожалуйста введите имя.';
    $hasError = true;
  }
  if ( trim( $_POST['lastname'] ) === '' ) {
    $postTitleError = 'Пожалуйста введите фамилию.';
    $hasError = true;
  }
  if ( trim( $_POST['email'] ) === '' ) {
    $postTitleError = 'Пожалуйста введите email.';
    $hasError = true;
  }

  $categoryID = get_term_by('name', $_POST['delivery'], 'delivery');

  $post_information = array(
    'post_title' => $post_title,
    'post_content' => $post_content,
    'post_type' => 'orders',
    'post_category' => array($_POST['delivery']),
    'post_status' => 'publish'
    );

  $pid = wp_insert_post( $post_information );
  $term_taxonomy_ids = wp_set_post_terms( $pid, array($categoryID->term_id), 'delivery', true );

  if ( $pid ) {
    wp_redirect( get_permalink($pid) );
    exit;
  }

}
else {
  echo "Что-то пошло не так...";
}
