<?php get_header(); ?>

<div class="container">
  <div class="row page-wrapper">
    <div class="col-12 col-md-8">
      <h2 class="header-section"><?php single_cat_title(); ?></h2>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'loop-post/tumb-right' ); ?>
      <?php endwhile; ?>
      <?php pagination(); ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>