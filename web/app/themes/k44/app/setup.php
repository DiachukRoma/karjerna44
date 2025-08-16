<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    remove_theme_support('block-templates');
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage'),
    ]);

    remove_theme_support('core-block-patterns');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');

    add_theme_support('html5', [
        'caption',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    add_theme_support('customize-selective-refresh-widgets');
}, 20);

add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

add_action('wp_enqueue_scripts', function () {
    if (is_404()) {
        bundle('404')->enqueue();
    } elseif (is_singular('post') || is_singular('events')) {
        bundle('single')->enqueue();

        global $post;
        if (1) {
            // wp_enqueue_style('old-style', get_stylesheet_directory_uri() . '/js_composer.min.css');
        }
    } elseif (is_post_type_archive('ministers')) {
        bundle('archive-ministers')->enqueue();
    } elseif (is_post_type_archive('events') || (!is_front_page() && is_home()) || is_category() && !is_search()) {
        bundle('archive-events')->enqueue()->localize('loadmore_params', array('ajaxurl' => admin_url('admin-ajax.php')));
    } elseif (is_search()) {
        bundle('search')->enqueue();
    } else {
        global $post;
        $reserved = [
            'home',
            'history-of-the-church',
            'basics-of-belief',
            'contacts',
            'doctrine',
            'online',
            'schedule',
            'services',
            'songs',
        ];
        $post_slug = $post->post_name;

        if (in_array($post_slug, $reserved)) {
            bundle($post_slug)->enqueue();
        } else {
            bundle('template-standart-page')->enqueue();
        }
    }
}, 100);

/**
 * Add setting page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Головні налаштування',
        'menu_title' => 'Головні налаштування',
        'menu_slug' => 'theme-general-settings',
        'redirect' => false
    ));
}

/**
 * Dissable Gutenberg where use ACF
 */
add_action('admin_init', function () {
    if (array_key_exists('post', $_GET) || array_key_exists('post_ID', $_GET)) {
        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        if (!isset($post_id)) {
            return;
        }
        $groups = acf_get_field_groups(array('post_id' => $post_id));
        $disable_editor = false;
        foreach ($groups as $group) {
            if (is_array($group['hide_on_screen'])) {
                $hide_on_screen = $group['hide_on_screen'];
                if (in_array('the_content', $hide_on_screen)) {
                    $disable_editor = true;
                }
            }
        }
        if ($disable_editor) {
            $post_type = get_post_type($post_id);
            remove_post_type_support($post_type, 'editor');
        }
    }
}, 10);

/**
 * Add support excerpt on pages
 */
add_action('init', function () {
    add_post_type_support('page', 'excerpt');
});

/**
 * Remove some photo sizes and add some sizes
 */
// add_filter('intermediate_image_sizes_advanced', 'true_remove_default_sizes');
// function true_remove_default_sizes($sizes)
// {
//     unset($sizes['large']);
//     unset($sizes['medium_large']);
//     unset($sizes['1536x1536']);
//     unset($sizes['2048x2048']);
//     return $sizes;
// }

/**
 * Add new post type - Events
 */
add_action('init', function () {
    register_post_type('events', [
        'label' => null,
        'labels' => [
            'name' => 'Події',
            'singular_name' => 'Подія',
            'add_new' => 'Додати подію',
            'add_new_item' => 'Додати нову подію',
            'edit_item' => 'Редагувати',
            'new_item' => 'Нова подія',
            'view_item' => 'Подивитися',
            'search_items' => 'Знайти подію',
            'not_found' => 'Не знайдено',
            'not_found_in_trash' => 'Не знайдено у корзині',
            'menu_name' => 'Події',
        ],
        'menu_position' => 4,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-smiley',
        'supports' => ['title', 'excerpt', 'thumbnail'],
    ]);
});

/**
 * Add new post type - Ministers
 */
add_action('init', function () {
    register_post_type('ministers', [
        'label' => null,
        'labels' => [
            'name' => 'Служителі',
            'singular_name' => 'Служитель',
            'add_new' => 'Додати служителя',
            'add_new_item' => 'Додати нового служителя',
            'edit_item' => 'Редагувати',
            'new_item' => 'Новий служитель',
            'view_item' => 'Подивитися',
            'search_items' => 'Знайти служителя',
            'not_found' => 'Не знайдено',
            'not_found_in_trash' => 'Не знайдено у корзині',
            'menu_name' => 'Сдужителі',
        ],
        'menu_position' => 4,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => ['title', 'excerpt', 'thumbnail',],
    ]);
});

/**
 * Function to add Tag Selection to Custom Post Type
 */
add_action('init', function () {
    register_taxonomy_for_object_type('post_tag', 'ministers');
});
