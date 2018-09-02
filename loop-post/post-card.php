<article class="post-card">
  <div class="post-card__img">
    <a href="<?php the_permalink() ?>" class="post-card__img-link">
      <?php the_post_thumbnail( $id, 'full' ); ?>
      <div class="post-card__mask"></div>
    </a>
  </div>
  <div class="post-card__meta">
    <?php the_category() ?>
    <a href="<?php the_permalink() ?>" class="post-card__title"><?php the_title(); ?></a>
    <span class="post-card__date"><?php the_time(get_option('date_format')) ?> <i class="far fa-calendar-alt"></i></span>
  </div>
</article>