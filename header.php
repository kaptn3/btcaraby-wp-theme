<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php get_template_part( 'parts/analytics' ); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="header">
    <div class="container">
      <div class="header-wrapper">
        <div class="nav-n-search">
          <nav class="top-navbar">
            <?php $args = array(
              'theme_location' => 'top',
              'container'=> false,
              'menu_id' => 'top-nav-ul',
              'items_wrap' => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
              'menu_class' => 'top-menu'    
              );
              wp_nav_menu($args);
            ?>
          </nav>
          <a class="nav_mobile"><i class="fas fa-bars"></i></a>
        </div>
        <a href="/" class="logo">
          <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/logo.png">
        </a>
      </div>
    </div>
  </header>