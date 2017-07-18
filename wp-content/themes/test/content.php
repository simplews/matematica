<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php
      if ( is_singular() ) :
        the_title( '<h1 class="entry-title display-1">', '</h1>' );
      else :
        the_title( sprintf( '<h2 class="entry-title display-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
      endif;
    ?>
  </header>

  <div class="entry-content">
    <?php
      the_content( sprintf(
        __( 'Continue reading %s', 'matematica-test' ),
        the_title( '<span class="screen-reader-text">', '</span>', false )
      ) );

      wp_link_pages( array(
        'before'      => '<ul class="pagination">',
        'after'       => '</ul>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'matematica-test' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
      ) );

    ?>
  </div>

  <footer class="entry-footer">
    <?php edit_post_link( __( 'Edit', 'matematica-test' ), '<span class="edit-link">', '</span>' ); ?>
  </footer>

</article>
