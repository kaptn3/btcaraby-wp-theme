<article class="tumb-right">
  <div class="tumb-right__content row justify-content-between">
    <div class="tumb-right__img col-12 col-md-5">
      <a class="tumb-right__img-link" href="<?php the_permalink() ?>">
        <?php the_post_thumbnail( $id, 'medium' ); ?>
      </a>
    </div>    
    <div class="tumb-right__data col-12 col-md-7">
      <div class="tumb-right__categories">
        <?php the_category() ?>
      </div>
      <h2 class="tumb-right__title">
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
      </h2>
      <span class="tumb-right__meta"><?php the_time(get_option('date_format')); ?> <i class="far fa-calendar-alt"></i></span>
      <div class="tumb-right__excerpt">
        <?php the_content(''); ?>
      </div>
    </div>
  </div>
</article>