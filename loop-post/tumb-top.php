<article class="tumb-top">
  <div class="tumb-top__img">
    <a class="tumb-top__img-link" href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail( $id, 'medium' ); ?>
    </a>
  </div>
  <div class="tumb-top__content">
    <h2 class="tumb-top__title">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
  </div>
</article>