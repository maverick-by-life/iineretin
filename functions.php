<?php
/* регистрация скриптов и стилей */
function iineretin_enqueue_scripts()
{
    wp_enqueue_style("iineretin-style", get_template_directory_uri() . "/assets/css/style.css", array(), time(), "all");

    wp_enqueue_script("jquery-ui-autocomplete");
    wp_register_script("iineretin-ajax-search-script", get_template_directory_uri() .
        "/assets/js/ajax-search.js", array('jquery', 'jquery-ui-autocomplete'));
    wp_localize_script("iineretin-ajax-search-script", "ajaxSearch", array('ajax_url' => admin_url("admin-ajax.php")));
    wp_enqueue_script("iineretin-ajax-search-script");

    wp_enqueue_script("iineretin-script", get_template_directory_uri() . "/assets/js/main.js", array('jquery'), time(),
        true);
}

add_action("wp_enqueue_scripts", "iineretin_enqueue_scripts");

/* регистрация меню, подключение картинок, формат постов  */
function iineretin_them_init()
{
    register_nav_menus([
        'main-menu' => 'Главное меню',
    ]);

    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', ['video', 'quote', 'image', 'gallery']);
}

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
            'all_items' => 'Новости',
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
            'all_items' => 'Методики',
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

    unset($args);
    $args = array(
        'label' => esc_html__('Опросы', 'iineretin'),
        'labels' => array(
            'name' => 'Опросы',
            'singular_name' => 'Опрос',
            'add_new' => 'Добавить опрос',
            'add_new_item' => 'Добавить опрос',
            'edit_item' => 'Редактировать опрос',
            'new_item' => 'Новый опрос',
            'all_items' => 'Опросы',
            'menu_name' => 'Опросы'
        ),
        'supports' => ['title', 'editor', 'thumbnail'],
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'quizzes'],
        'show_in_rest' => true,
        'menu_position' => 22,
        'menu_icon' => 'dashicons-pets',
    );
    register_post_type('quiz', $args);
}

add_action('init', 'iineretin_register_post_type');

/* количество постов новостей на странице */
function iineretin_post_size($query)
{
    if (is_admin() || !$query->is_main_query())
        return;
    if ($query->is_post_type_archive('novelty')) {
        $query->set('posts_per_page', 3);
    }
}

add_action('pre_get_posts', 'iineretin_post_size');

/* отключение админ панели */
show_admin_bar(false);

/* ajax поиск */
function iineretin_search_form($form)
{
    $form = '
    <div class="search"  >     
		<form role="search" method="POST" id="search-form" action="' . home_url('/') . '">
			<label>  
			    <input type="text" value="' . get_search_query() . '" name="s"  id="s" placeholder="Поиск..." autofocus />
			    <img src="' . get_template_directory_uri() . '/assets/img/search.svg" alt="Поиск"/>
			</label>
			 <div class="search__spinner">
			    <img src="' . get_bloginfo('template_directory') . '/assets/img/spinner.gif" alt="спиннер"/>
			</div>
		</form>
		   <ul class="search__list"></ul>
		</div>
	';
    return $form;
}

add_filter('get_search_form', 'iineretin_search_form');

function iineretin_ajax_search()
{
    $args = array(
        's' => $_POST['term'],
        'posts_per_page' => 10,
        'post_type' => 'methodical',
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            ?>
            <li class="search__item">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
            <?php
        }
    } else {
        ?>
        <li class="search__item">
            Ничего не найдено, попробуйте другой запрос
        </li>
        <?php
    }
    exit;
}

add_action('wp_ajax_nopriv_iineretin_ajax_search', 'iineretin_ajax_search');
add_action('wp_ajax_iineretin_ajax_search', 'iineretin_ajax_search');











