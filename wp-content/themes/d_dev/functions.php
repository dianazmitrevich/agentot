<?php

// хуки на подключение стилей и скриптов
add_action('wp_enqueue_scripts', 'project_styles');
add_action('wp_enqueue_scripts', 'project_scripts');

function project_styles() {
    // wp_enqueue_style('project_styles', get_stylesheet_uri());
    wp_enqueue_style('project_styles', get_template_directory_uri() . '/assets/css/main.css');
}

function project_scripts() {
    wp_enqueue_script('project_scripts', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}

// поддержка лого
add_theme_support( 'custom-logo');

// поддержка меню
add_theme_support( 'menus' );

// добавляет SVG в список разрешенных для загрузки файлов
add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){
		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}
	}

	return $data;
}

// Включаемые области
add_action( 'init', 'true_register_includes_init' );

// Включаемые области
// регистрация записей
function true_register_includes_init() {
  $labels = array(
      'name' => 'Включаемые области',
      'singular_name' => 'Включаемая область',
      'add_new' => 'Добавить включаемую область',
      'add_new_item' => 'Добавить новую включаемую область',
      'edit_item' => 'Редактировать включаемую область',
      'new_item' => 'Новая включаемая область',
      'all_items' => 'Все включаемые области',
      'view_item' => 'Просмотр включаемыех областей на сайте',
      'search_items' => 'Искать включаемую область',
      'not_found' =>  'Включаемые области не найдены.',
      'not_found_in_trash' => 'В корзине нет включаемые областей.',
      'menu_name' => 'Включаемые области'
  );
  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => false,
      'show_in_admin_bar' => true,
      'has_archive' => true,
      'menu_position' => 10,
      'supports' => array( 'title', 'editor'), // включить заголовок, редактор, комментарии, автор, миниатюра записи
      'exclude_from_search' => true,
      'publicly_queryable' => true,
  );
  register_post_type('includes', $args);
}

// Шорткоды для включаемых областей
add_shortcode( 'area', 'area_func' );

function area_func( $attributes ){
    echo get_post($attributes['id'])->post_content;
	return true;
}

// Услуга
// добавление нового типа записей в меню
add_action( 'init', 'true_register_project_type_init' );

// Услуга
// регистрация записей
function true_register_project_type_init() {
  $labels = array(
      'name' => 'Услуги',
      'singular_name' => 'Услуга',
      'add_new' => 'Добавить услугу',
      'add_new_item' => 'Добавить новую услугу',
      'edit_item' => 'Редактировать услугу',
      'new_item' => 'Новая услуга',
      'all_items' => 'Все услуги',
      'view_item' => 'Просмотр услуги на сайте',
      'search_items' => 'Искать услуги',
      'not_found' =>  'Услуг не найдено.',
      'not_found_in_trash' => 'В корзине нет услуг.',
      'menu_name' => 'Услуги'
  );
  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'has_archive' => true,
      'menu_position' => 20,
      'supports' => array( 'title', 'author', 'thumbnail'), // включить заголовок, автор, миниатюра записи
      'rewrite'   => array(
          'slug' => 'service',
          'with_front' => false
      ),
      'exclude_from_search' => false,
      'publicly_queryable' => true,
  );
  register_post_type('service', $args);
}

// Сотрудники
add_action( 'init', 'true_register_technologies_init' );

// Сотрудники
// регистрация записей
function true_register_technologies_init() {
  $labels = array(
      'name' => 'Сотрудники',
      'singular_name' => 'Сотрудник',
      'add_new' => 'Добавить сотрудника',
      'add_new_item' => 'Добавить нового сотрудника',
      'edit_item' => 'Редактировать сотрудника',
      'new_item' => 'Новый сотрудник',
      'all_items' => 'Все сотрудники',
      'view_item' => 'Просмотр сотрудника на сайте',
      'search_items' => 'Искать сотрудника',
      'not_found' =>  'Сотрудников не найдено.',
      'not_found_in_trash' => 'В корзине нет сотрудников.',
      'menu_name' => 'Сотрудники'
  );
  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => false,
      'show_in_admin_bar' => true,
      'has_archive' => true,
      'menu_position' => 20,
      'supports' => array( 'title', 'thumbnail'), // включить заголовок, редактор, комментарии, автор, миниатюра записи
      'exclude_from_search' => true,
      'publicly_queryable' => true,
  );
  register_post_type('employees', $args);
}

// Контакты
add_action( 'init', 'true_register_contact_init' );

// Контакты
// регистрация записей
function true_register_contact_init() {
  $labels = array(
      'name' => 'Контакты',
      'singular_name' => 'Контакт',
      'add_new' => 'Добавить контакт',
      'add_new_item' => 'Добавить новый контакт',
      'edit_item' => 'Редактировать контакт',
      'new_item' => 'Новый контакт',
      'all_items' => 'Все контакты',
      'view_item' => 'Просмотр контакта на сайте',
      'search_items' => 'Искать контакт',
      'not_found' =>  'Контакты не найдены.',
      'not_found_in_trash' => 'В корзине нет контактов.',
      'menu_name' => 'Контакты'
  );
  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => false,
      'show_in_admin_bar' => true,
      'has_archive' => true,
      'menu_position' => 20,
      'supports' => array( 'title', 'thumbnail'), // включить заголовок, редактор, комментарии, автор, миниатюра записи
      'exclude_from_search' => true,
      'publicly_queryable' => true,
  );
  register_post_type('contact', $args);
}

// Клиенты
add_action( 'init', 'true_register_client_init' );

// Клиенты
// регистрация записей
function true_register_client_init() {
  $labels = array(
      'name' => 'Клиенты',
      'singular_name' => 'Клиент',
      'add_new' => 'Добавить клиента',
      'add_new_item' => 'Добавить нового клиента',
      'edit_item' => 'Редактировать клиента',
      'new_item' => 'Новый клиент',
      'all_items' => 'Все клиенты',
      'view_item' => 'Просмотр клиента на сайте',
      'search_items' => 'Искать клиента',
      'not_found' =>  'Клиенты не найдены.',
      'not_found_in_trash' => 'В корзине нет клиентов.',
      'menu_name' => 'Клиенты'
  );
  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => false,
      'show_in_admin_bar' => true,
      'has_archive' => true,
      'menu_position' => 20,
      'supports' => array( 'title', 'thumbnail'), // включить заголовок, редактор, комментарии, автор, миниатюра записи
      'exclude_from_search' => true,
      'publicly_queryable' => true,
  );
  register_post_type('client', $args);
}

// свой класс построения меню
class My_Walker_Nav_Menu extends Walker_Nav_Menu {

    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = NULL ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'dropdown dropdown__items',
            // 'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    // add main/sub classes to li's and links
    function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        global $wp_query;

        // Restores the more descriptive, specific name for use within this method.
        $item = $data_object;

        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // depth dependent classes
        $depth_classes = array(
            'header__nav-item'
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // build html
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
?>