<?php get_header(); ?>

  <div class="row">
<?php if ( is_home() ){
  get_template_part( 'loop', 'products' );
}
      else get_template_part( 'content', 'products' );
?>
<?php

?>
  </div>
<?php get_footer(); ?>
