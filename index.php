<?php get_header(); ?>

<div class="container">
<?php
  if ( have_posts() ){
    while ( have_posts() ){
      the_post();
      echo '<h3><a href="'. get_permalink() .'">'. get_the_title() .'</a></h3>';
      echo get_the_excerpt();
    }
  }
  // елси записей не найдено
  else{
    echo ' <p>Записей нет...</p>';
  }
?>
</div>

<?php get_footer(); ?>