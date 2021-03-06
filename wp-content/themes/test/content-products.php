<div class="col-md-4">
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
    the_content();
    ?>
  </div>

  <footer class="entry-footer">
    <?php
    if ( is_single() ) { ?>
    <a class="btn btn-primary" a href="<?php echo get_page_link(21); ?>">Заказать</a>
    <?php }
    else { ?>
    <a class="btn btn-primary" a href="<?php echo get_permalink(); ?>">Заказать</a>
    <?php }
    ?>
  </footer>

</article>
</div>
