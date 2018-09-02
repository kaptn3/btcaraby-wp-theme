<?php get_header(); ?> 
<section>
  <div class="container">
    <div class="row page-wrapper">
      <div class="col-12 col-md-8">
        <h2 class="header-section"><?php printf('البحث عن طريق الخط: %s', get_search_query()); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php get_template_part('loop-post/tumb-right'); ?>
        <?php endwhile;
        else: echo '<p>غير معثور عليه</p>'; endif; ?>  
        <?php pagination(); ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>