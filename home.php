<?php get_header(); ?>

<div class="container home-page">
  <section class="recent-news">
    <?php get_template_part( 'parts/section-1' ); ?> 
  </section>
  <div class="row page-wrapper home-page__content">
    <div class="col-12 col-md-8">
      <div class="category-section">
        <?php wpb_postsbycategory('البلوكشين') ?>
        <?php wpb_postsbycategory('البيتكوين') ?>
        <?php wpb_postsbycategory('الريبل') ?>
        <?php wpb_postsbycategory('الإيثيريوم') ?>
        <?php wpb_postsbycategory('دول-الخليج') ?>
      </div>
      <?php get_template_part( 'parts/last-news' ); ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>