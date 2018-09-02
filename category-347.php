<?php get_header(); ?>

<div class="container">
  <div class="row page-wrapper">
    <div class="col-12 col-md-8">
	  <?php wpb_postsbycategory('رئيسي-العملات الرقمية') ?>
      <?php wpb_postsbycategory('البلوكشين') ?>
      <?php wpb_postsbycategory('البيتكوين') ?>
      <?php wpb_postsbycategory('الريبل') ?>
      <?php wpb_postsbycategory('الإيثيريوم') ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>