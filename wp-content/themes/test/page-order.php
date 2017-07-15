<?php get_header(); ?>
<div class="row">
  <div class="col-md-6">
    <form id="new_order" name="new_order" method="post"  action="<?php echo get_template_directory_uri(); ?>/lib/wp-form.php">
    <div class="form-group products">
    <label for="product">Select product:</label>
      <select class="form-control" id="product" name="product">
      <option>Select product:</option>
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
      <label for="firstname">First name:</label>
      <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Submit Your first name" value="<?php echo $current_user->first_name; ?>">
      <label for="lastname">Last name:</label>
      <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Submit Your last name" value="<?php echo $current_user->last_name; ?>">
      <label for="email">Email:</label>
      <input class="form-control" type="email" id="email" name="email" placeholder="Email" value="<?php echo $current_user->user_email; ?>">
    </div>
    <div class="form-group delivery">
    <label for="delivery">Select delivery method:</label>
      <select class="form-control" id="delivery" name="delivery">
        <option>Пункт 1</option>
        <?php
        $terms = get_terms( 'delivery' );
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
            echo '<option>';
            foreach ( $terms as $term ) {
                echo $term->name;
            }
            echo '</option>';
        }
        ?>
      </select>
    </div>
    <input type="submit" class="btn btn-primary" value="Order">
    </form>
  </div>
</div>
<?php get_footer(); ?>
