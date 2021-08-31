
<?php

/**
 * ave functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ave
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('ave_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ave_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ave, use a find and replace
		 * to change 'ave' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('ave', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'ave'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ave_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'ave_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ave_content_width()
{
	$GLOBALS['content_width'] = apply_filters('ave_content_width', 640);
}
add_action('after_setup_theme', 'ave_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ave_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'ave'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'ave'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'ave_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ave_scripts()
{
	wp_enqueue_style('ave-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('ave-style', 'rtl', 'replace');

	wp_enqueue_script('ave-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'ave_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
// test edit function.php
// Change error auth message
function no_wordpress_errors()
{
	return "Что-то не так";
}

add_filter('login_errors', 'no_wordpress_errors');

// Calc reading time 

function reading_time()
{
	$content = get_post_field('post_content', $post->ID);
	$word_count = str_word_count(strip_tags($content));
	$readingtime = ceil($word_count / 200);
	if ($readingtime == 1) {
		$timer = " minute";
	} else {
		$timer = " minutes";
	}
	$totalreadingtime = $readingtime . $timer;
	return $totalreadingtime;
}

// DELETE MARGIN-TOP !important
add_action('get_header', 'my_filter_head');

function my_filter_head()
{
	remove_action('wp_head', '_admin_bar_bump_cb');
}





// ADD CUSTOM CLASSES FOR <a> IN PRIMARY MENU
function my_menu_a_class($atts, $item, $args, $depth)
{
	if (
		$depth == 0
	) {
		$atts['class'] = (!empty($atts['class'])) ? "menu-a" : 'menu-a';
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'my_menu_a_class', 10, 4);

// ADD CUSTOM MENU STRUCTURE
class My_Menu_Walker extends Walker_Nav_Menu
{



	// function end_el(&$output, $item, $depth = 0, $args = null)
	// {
	// }
	function start_lvl(&$output, $item, $depth = 0, $args = [])
	{
		if (
			$depth == 1
		) {
			$output .= "<div class = 'header__sub-content'> <div class='header__nav-submenu'><ul class='header__nav-submenu-1'>";
		} else {
			$output .= "<ul>";
		}

		// $output .= "<div class = 'header__sub-content'> <div class='header__nav-submenu'> <ul class='header__nav-submenu-1'>";
		// $output .= $item->title;

	}
	function end_lvl(&$output, $item, $depth = 0, $args = [])
	{
		$output .= "</ul>";
		if (
			$depth == 1
		) {
			$output .= '<div class="header__submenu-sale"><div> Autumn sale! </div><span> up to 50% off</span></div>';
		}
	}
	function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
	{

		$output .= "<li class='" . implode(" ", $item->classes) . "'>";

		if (
			in_array('menu-item-has-children', $item->classes) &&
			$depth === 0
		) {
			$output .= "<a class = 'header__sub-parent menu-a' href = '" . $item->url . "'>";
		} else {
			$output .= "<a class = 'menu-a' href = '" . $item->url . "'>";
		}

		$output .= $item->title;

		$output .= "</a>";

		if ($args->walker->has_children) {
			$output .= "<button class='submenu-open'><span></span></button>";
		}
	}

	function end_el(&$output, $item, $depth = 0, $args = null)
	{
	}
}
