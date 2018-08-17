<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-default">
            <div class="collapse navbar-collapse" id="topnav">
              <?php $args = array(
                'theme_location' => 'top',
                'container'=> false,
                'menu_id' => 'top-nav-ul',
                'items_wrap' => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
                'menu_class' => 'top-menu'    
                );
                wp_nav_menu($args);
              ?>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>