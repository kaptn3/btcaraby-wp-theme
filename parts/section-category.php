<?php
$category_id = 348;
if (get_cat_name($category_id)) {
?>
  <section>
    <h2 class="header-section"><?php echo get_cat_name($category_id); ?></h2>
    <div class="row">
      <?php $args = array(
        'category_in' => $category_id,
        'orderby' => 'rand',
        'posts_per_page' => 3
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
        ?>
        <div class="col-12 col-md-4">
          <?php get_template_part('loop-post/tumb-top'); ?>
        </div>
      <?php  
        }
      }
      wp_reset_postdata(); ?>
    </div>
  </section>
<?php
} ?>