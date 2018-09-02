<?php get_header(); ?>

<div class="container">
  <div class="row page-wrapper">
    <div class="col-12 col-md-8">

      <?php if(have_posts()){ while(have_posts()){ the_post();
        get_template_part('loop-post/tumb-right');
}
pagination();
} ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>