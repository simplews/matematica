<?php
$args = array (
  'post_type' => 'products',
  'posts_per_page' => 6
  );
$product_query = new WP_Query( $args );

  if ( have_posts() ) :
    while ( $product_query->have_posts() ) : $product_query->the_post();
    echo '<div class="col-md-4">';
      get_template_part( 'content', 'products' );
    echo '</div>';
    endwhile;
    wp_reset_postdata();
  else :
    ?><p><?php _e( 'Sorry, no products matched your criteria.', 'matematica-test' ); ?></p><?php
  endif;
