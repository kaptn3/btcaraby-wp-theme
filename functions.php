<?php

add_theme_support('title-tag');

register_nav_menus(array(
  'top' => 'Top', // Верхнее
  'bottom' => 'Bottom' // Внизу
));

add_theme_support('post-thumbnails');
set_post_thumbnail_size(250, 150);
add_image_size('big-thumb', 400, 400, true);

register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
  'name' => 'Сайдбар', // Название в админке
  'id' => "sidebar", // идентификатор для вызова в шаблонах
  'description' => 'Обычная колонка в сайдбаре', // Описалово в админке
  'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
  'after_widget' => "</div>\n", // разметка после вывода каждого виджета
  'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
  'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));

if (!class_exists('clean_comments_constructor')) { // если класс уже есть в дочерней теме - нам не надо его определять
  class clean_comments_constructor extends Walker_Comment { // класс, который собирает всю структуру комментов
    public function start_lvl( &$output, $depth = 0, $args = array()) { // что выводим перед дочерними комментариями
      $output .= '<ul class="children">' . "\n";
    }
    public function end_lvl( &$output, $depth = 0, $args = array()) { // что выводим после дочерних комментариев
      $output .= "</ul><!-- .children -->\n";
    }
      protected function comment( $comment, $depth, $args ) { // разметка каждого комментария, без закрывающего </li>!
        $classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' author-comment' : ''); // берем стандартные классы комментария и если коммент пренадлежит автору поста добавляем класс author-comment
          echo '<li id="comment-'.get_comment_ID().'" class="'.$classes.' media">'."\n"; // родительский тэг комментария с классами выше и уникальным якорным id
        echo '<div class="media-left">'.get_avatar($comment, 64, '', get_comment_author(), array('class' => 'media-object'))."</div>\n"; // покажем аватар с размером 64х64
        echo '<div class="media-body">';
        echo '<span class="meta media-heading">Автор: '.get_comment_author()."\n"; // имя автора коммента
        //echo ' '.get_comment_author_email(); // email автора коммента, плохой тон выводить почту
        echo ' '.get_comment_author_url(); // url автора коммента
        echo ' Добавлено '.get_comment_date('F j, Y в H:i')."\n"; // дата и время комментирования
        if ( '0' == $comment->comment_approved ) echo '<br><em class="comment-awaiting-moderation">Ваш комментарий будет опубликован после проверки модератором.</em>'."\n"; // если комментарий должен пройти проверку
        echo "</span>";
          comment_text()."\n"; // текст коммента
          $reply_link_args = array( // опции ссылки "ответить"
            'depth' => $depth, // текущая вложенность
            'reply_text' => 'Ответить', // текст
        'login_text' => 'Вы должны быть залогинены' // текст если юзер должен залогинеться
          );
          echo get_comment_reply_link(array_merge($args, $reply_link_args)); // выводим ссылку ответить
          echo '</div>'."\n"; // закрываем див
      }
      public function end_el( &$output, $comment, $depth = 0, $args = array() ) { // конец каждого коммента
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
      'prev_text'    => 'Prev',
        'next_text'    => 'Next',
      'total' => $wp_query->max_num_pages,
      'show_all'     => false,
      'end_size'     => 15,
      'mid_size'     => 15,
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
      wp_enqueue_script('main', get_template_directory_uri().'/js/main.js','','',true);
  }
}

add_action('wp_print_styles', 'add_styles');
if (!function_exists('add_styles')) {
  function add_styles() {
    if(is_admin()) return false;
    wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/normalize.css' );
    wp_enqueue_style( 'bt-grid', get_template_directory_uri().'/bootstrap-grid.css' );
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

?>
