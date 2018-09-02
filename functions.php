<?php

add_theme_support('title-tag');

register_nav_menus(array(
  'top' => 'Top',
  'bottom' => 'Bottom'
));

add_theme_support('post-thumbnails');
set_post_thumbnail_size(250, 150);
add_image_size('big-thumb', 400, 400, true);

register_sidebar(array(
  'name' => 'Сайдбар',
  'id' => "sidebar",
  'description' => 'Обычная колонка в сайдбаре',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => "</div>\n",
  'before_title' => '<span class="widgettitle">',
  'after_title' => "</span>\n",
));

if (!class_exists('clean_comments_constructor')) {
  class clean_comments_constructor extends Walker_Comment {
    public function start_lvl( &$output, $depth = 0, $args = array()) {
      $output .= '<ul class="comment__children">' . "\n";
    }
    public function end_lvl( &$output, $depth = 0, $args = array()) {
      $output .= "</ul><!-- end children -->\n";
    }
      protected function comment( $comment, $depth, $args ) {
        $classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' comment__author' : '');
        echo '<li id="comment-'.get_comment_ID().'" class="'.$classes.' media">'."\n";
        echo '<div class="comment__content">';
        echo '<div class="comment__body">';
        echo '<span class="meta comment__title">'.get_comment_author()."\n";
        echo get_comment_date('F j, Y в H:i')."\n";
        if ( '0' == $comment->comment_approved ) echo '<br><em class="comment-awaiting-moderation">Ваш комментарий будет опубликован после проверки модератором.</em>'."\n";
        echo "</span>";
          comment_text()."\n";
          $reply_link_args = array( 
            'depth' => $depth,
            'reply_text' => 'Ответить',
        'login_text' => 'Вы должны быть зарегистрированы'
          );
          echo get_comment_reply_link(array_merge($args, $reply_link_args));
          echo '</div>'."\n";
          echo '<div class="comment__avatar">'.get_avatar($comment, 64, '', get_comment_author(), array('class' => 'comment__avatar-object'))."</div>\n";
          echo '</div>';
      }
      public function end_el( &$output, $comment, $depth = 0, $args = array() ) {
      $output .= "</li><!-- #comment-## -->\n";
    }
  }
}

if (!function_exists('pagination')) {
  function pagination() {
    global $wp_query;
    $big = 999999999;
    $links = paginate_links(array(
      'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'type' => 'array',
      'prev_text'    => 'المنشور السابق',
      'next_text'    => 'المنصب القادم',
      'total' => $wp_query->max_num_pages,
      'show_all'     => false,
      'end_size'     => 2,
      'mid_size'     => 1,
      'add_args'     => false,
      'add_fragment' => '',
      'before_page_number' => '',
      'after_page_number' => ''
    ));
    if( is_array( $links ) ) {
        echo '<ul class="pagination">';
        foreach ( $links as $link ) {
          if ( strpos( $link, 'current' ) !== false ) echo "<li class='active'>$link</li>";
            else echo "<li>$link</li>"; 
        }
        echo '</ul>';
     }
  }
}

add_action('wp_footer', 'add_scripts');
if (!function_exists('add_scripts')) {
  function add_scripts() {
      if(is_admin()) return false;
      wp_deregister_script('jquery');
      wp_enqueue_script('jquery','//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','','',true);
      wp_enqueue_script('fontawesome', get_template_directory_uri().'/js/fontawesome.min.js','','',true);
      wp_enqueue_script('main', get_template_directory_uri().'/js/main.js','','',true);
  }
}

add_action('wp_print_styles', 'add_styles');
if (!function_exists('add_styles')) {
  function add_styles() {
    if(is_admin()) return false;
    wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/normalize.css' );
    wp_enqueue_style( 'bt-grid', get_template_directory_uri().'/css/bootstrap-grid.css' );
    wp_enqueue_style( 'reset', get_template_directory_uri().'/css/reset.css' );
    wp_enqueue_style( 'main', get_template_directory_uri().'/style.css' );
  }
}


if (!function_exists('content_class_by_sidebar')) {
  function content_class_by_sidebar() {
    if (is_active_sidebar( 'sidebar' )) {
      echo 'col-sm-9';
    } else {
      echo 'col-sm-12';
    }
  }
}

function wpb_postsbycategory($category, $title = '') {
  $string = '';
  // the query
  $the_query = new WP_Query(
    array(
      'category_name' => $category,
      'posts_per_page' => 3
    )
  ); 
 
  // The Loop
  if ( $the_query->have_posts() ) {
    $string .= '<section>';
    $string .= '<div class="header-section link-and-header">';
	  if ($title) {
		$string .= '<h2>' . $title . '</h2>';
	  } else {
      	$string .= '<h2>' . get_category_by_slug($category)->cat_name . '</h2>';
	  }
    $cat_id = get_category_by_slug($category)->cat_ID;
      $string .= '<a class="header-category-link" href="' . get_category_link($cat_id) . '">اظهار الكل</a>';
    $string .= '</div>';
    $string .= '<div class="row">';
    while ( $the_query->have_posts() ) {
      $the_query->the_post();

      $string .= '<div class="col-12 col-md-4"><article class="tumb-top">';
      $string .= '<div class="tumb-top__img">';
        $string .= '<a class="tumb-top__img-link" href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $id, 'medium' ) . '</a>';
      $string .= '</div>';
      $string .= '<div class="tumb-top__content">';
      $string .= '<h2 class="tumb-top__title"><a href="' . get_the_permalink() . '">'. get_the_title() .'</a></h2>';
      $string .= '<span class="tumb-top__date">' . get_the_date() . ' <i class="far fa-calendar-alt"></i></span>';
      $string .= '</div>';
      $string .= '</article></div>';
    }

    $string .= '</div></section>';
   
    echo $string;
  } else {
    # else
  }
   
  /* Restore original Post Data */
  wp_reset_postdata();
}
// Add a shortcode
add_shortcode('categoryposts', 'wpb_postsbycategory');
 
// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');

function wpb_postsbycategory_2($category) {
  $string = '';
  // the query
  $the_query = new WP_Query(
    array(
      'category_name' => $category,
      'posts_per_page' => 1
    )
  ); 
 
  // The Loop
  if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
      $the_query->the_post();

      $string .= '<article class="post-card">';
        $string .= '<div class="post-card__img">';
          $string .= '<a class="post-card__img-link" href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $id, 'medium' ) . '</a>';
        $string .= '</div>';
        $string .= get_the_category_list();
        $string .= '<div class="post-card__meta">';
          $string .= '<a class="post-card__title" href="' . get_the_permalink() . '">'. get_the_title() .'</a>';
          $string .= '<span class="post-card__date">' . get_the_date() . ' <i class="far fa-calendar-alt"></i></span>';
        $string .= '</div>';
      $string .= '</article>';
    }
   
    echo $string;
  } else {
    # else
  }
   
  /* Restore original Post Data */
  wp_reset_postdata();
}
// Add a shortcode
add_shortcode('categoryposts_2', 'wpb_postsbycategory_2');
 
// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');

remove_filter('widget_text_content', 'wpautop');

?>
