<?php get_header(); ?>
<div class="row">
  <div class="col-md-6">
    <form id="new_order" name="new_order" method="post"  action="<?php echo get_template_directory_uri(); ?>/lib/wp-form.php">
      <div class="form-group products">
        <label for="product">Выберите продукт:</label>
        <select class="form-control required" id="product" name="product">
          <option>Выберите продукт:</option>
          <?php
          $args = array (
            'post_type' => 'products',
            'posts_per_page' => -1
            );
          $product_list = new WP_Query( $args );
          if ( have_posts() ) :
            while ( $product_list->have_posts() ) : $product_list->the_post();
          echo '<option>';
          the_title();
          echo '</option>';
          endwhile;
          wp_reset_postdata();
          else :
            ?><p><?php _e( 'Sorry, no products matched your criteria.', 'matematica-test' ); ?></p><?php
          endif;
          ?>
        </select>
      </div>
      <div class="form-group userdata">
        <?php
        $current_user = wp_get_current_user();
        ?>
        <label for="firstname">Имя:</label>
        <input class="form-control required" type="text" id="firstname" name="firstname" placeholder="Укажите ваше имя" value="<?php echo $current_user->first_name; ?>">
        <label for="lastname">Фамилия:</label>
        <input class="form-control required" type="text" id="lastname" name="lastname" placeholder="Укажите вашу фамилию" value="<?php echo $current_user->last_name; ?>">
        <label for="email">Email:</label>
        <input class="form-control required" type="email" id="email" name="email" placeholder="Укажите Email" value="<?php echo $current_user->user_email; ?>">
      </div>
      <div class="form-group delivery">
        <label for="delivery">Выберите способ доставки:</label>
        <select class="form-control required" id="delivery" name="delivery">
          <option>Выберите способ доставки:</option>
          <?php
          $terms = get_terms( [
            'taxonomy' => 'delivery',
            'hide_empty' => false,
            ]);
          if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
            foreach ( $terms as $term ) {
              echo '<option>'.$term->name.'</option>';
            }
          }
          ?>
        </select>
      </div>
      <input type="hidden" name="submitted" id="submitted" value="true" />
      <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
      <input type="submit" class="btn btn-primary" value="Order">
    </form>
  </div>
</div>
<?php get_footer(); ?>
