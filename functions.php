<?php
/* регистрация скриптов и стилей */
function iineretin_enqueue_scripts()
{
	wp_enqueue_style("iineretin-style", get_template_directory_uri() . "/assets/css/style.css", array(), "1.0", "all");
	wp_enqueue_script("iineretin-inputmask", get_template_directory_uri() . "/assets/js/inputmask.min.js", array('jquery'), "1.0", true);
	wp_enqueue_script("iineretin-script", get_template_directory_uri() . "/assets/js/main.js", array('jquery'), "1.0", true);
};
add_action("wp_enqueue_scripts", "iineretin_enqueue_scripts");

/* регистрация меню, подключение картинок, формат постов  */
function iineretin_them_init()
{
	register_nav_menus([
		'main-menu' => 'Главное меню',
	]);

	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', ['video', 'quote', 'image', 'gallery']);
};
add_action('after_setup_theme', 'iineretin_them_init', 0);

/* регистрация постов новостей	и метод разработок */
function iineretin_register_post_type()
{
	$args = array(
		'label' => esc_html__('Информация и новости', 'iineretin'),
		'labels' => array(
			'name' => 'Информация и новости',
			'singular_name' => 'Новость',
			'add_new' => 'Добавить новость',
			'add_new_item' => 'Добавить новость',
			'edit_item' => 'Редактировать новость',
			'new_item' => 'Свежая новость',
			'all_items' => 'Все новости',
			'menu_name' => 'Мои новости'
		),
		'supports' => ['title', 'editor', 'thumbnail'],
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'news'],
		'show_in_rest' => true,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-megaphone',
	);
	register_post_type('novelty', $args);

	unset($args);
	$args = array(
		'label' => esc_html__('Метод разработки', 'iineretin'),
		'labels' => array(
			'name' => 'Методические разработки',
			'singular_name' => 'Методика',
			'add_new' => 'Добавить методику',
			'add_new_item' => 'Добавить методику',
			'edit_item' => 'Редактировать методику',
			'new_item' => 'Свежая методика',
			'all_items' => 'Все методики',
			'menu_name' => 'Метод разработки'
		),
		'supports' => ['title', 'editor', 'thumbnail'],
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'methodic'],
		'show_in_rest' => true,
		'menu_position' => 22,
		'menu_icon' => 'dashicons-beer',
	);
	register_post_type('methodical', $args);
};
add_action('init', 'iineretin_register_post_type');

/* количество постов новостей на странице */
function iineretin_post_size($query)
{
	if (is_admin() || !$query->is_main_query())
		return;
	if ($query->is_post_type_archive('novelty')) {
		$query->set('posts_per_page', 3);
	}
};
add_action('pre_get_posts', 'iineretin_post_size',);

/* отключение админ панели */
show_admin_bar(false);
