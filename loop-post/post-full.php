<article class="post-article" id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
  <div class="article__img">
    <?php the_post_thumbnail( $id, 'full' ); ?>
	<div class="article__img-alt">
      <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
  	</div>
  </div>
  <div class="article__content">
    <div class="article__categories">
      <?php the_category() ?>
    </div>
    <h2 class="article__title"><?php the_title(); ?></h2>
    <span class="article__meta"><?php the_time(get_option('date_format')); ?> <i class="far fa-calendar-alt"></i> <?php echo get_comments_number(); ?> comments <i class="far fa-comments"></i></span>
    <?php the_content(); ?>
  </div>            
</article>