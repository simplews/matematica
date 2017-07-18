<div class="col-md-4">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <header class="entry-header">
    <?php
    if ( is_singular() ) {
      echo '<p>Спасибо за ваш заказ:</p>';
      the_content();
    }
    else {
      the_title( sprintf( '<h2 class="entry-title display-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
    }
    ?>
  </header>
  <div class="entry-content">
    <?php
    the_content();
    ?>
  </div>

  <footer class="entry-footer">
  </footer>
</article>
</div>
