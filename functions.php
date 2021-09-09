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
				'footer-menu' => esc_html__('footer-menu', 'ave'),
				'social' => esc_html__('social', 'ave'),
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

	wp_enqueue_script('my-jquery', get_template_directory_uri() . '/js/jquery.js');

	wp_enqueue_script('my-script', get_template_directory_uri() . '/js/script.js');
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
		$depth == 0 &&
		$args->theme_location == 'menu-1'
	) {
		$atts['class'] = (!empty($atts['class'])) ? "menu-a" : 'menu-a';
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'my_menu_a_class', 10, 4);

// ADD CUSTOM MENU STRUCTURE
class My_Menu_Walker extends Walker_Nav_Menu
{

	function start_lvl(&$output, $depth = 0, $args = null)
	{
		if (
			$depth = 1
		) {
			$output .= "<div class = 'header__sub-content'> <div class='header__nav-submenu'><ul class='header__nav-submenu-1'>";
		} else {
			$output .= "<ul>";
		}
	}
	function end_lvl(&$output, $depth = 0, $args = null)
	{
		$output .= "</ul>";
		if (
			$depth = 1
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

// BANNER START

function bannerAve()
{
	echo esc_html_e(get_theme_mod('banner_setting'));
}

add_action('add_banner', 'bannerAve');

function banner_btnName()
{
	echo esc_html_e(get_theme_mod('banner_btnName'));
}

add_action('add_bannerBtnName', 'banner_btnName');

function banner_btnUrl()
{
	echo esc_html_e(get_theme_mod('banner_btnUrl'));
}

add_action('add_bannerBtnUrl', 'banner_btnUrl');

// BANNER END

// HOME LOOKBOOK START

function hl_img()
{
	echo esc_html_e(get_theme_mod('homeLookbook_img'));
}

add_action('homelookbook_img', 'hl_img');

function hl_h1()
{
	echo esc_html_e(get_theme_mod('homeLookbook_h1'));
}

add_action('homelookbook_h1', 'hl_h1');

function hl_h2()
{
	echo esc_html_e(get_theme_mod('homeLookbook_h2'));
}

add_action('homelookbook_h2', 'hl_h2');

function hl_p()
{
	echo esc_html_e(get_theme_mod('homeLookbook_p'));
}

add_action('homelookbook_p', 'hl_p');

// HOME LOOKBOOK END

// HOME CATALOG START

function show_product_short_description()
{
	global $post;

	$product = wc_get_product($post->ID);

	if ($tmp_desc = $product->get_short_description()) {
		echo " . $tmp_desc .";
	}
}

add_action('woocommerce_after_shop_loop_item_title', 'show_product_short_description');

// HOME CATALOG END

// ADD TO CART START

/**
 * Get the add to cart template for the loop.
 *
 * @param array $args Arguments.
 */
function woocommerce_template_loop_add_to_cart($args = array())
{
	global $product;

	echo "<div class = 'product__btn'>";

	if ($product) {
		$defaults = array(
			'quantity'   => 1,
			'class'      => implode(
				' ',
				array_filter(
					array(
						'button',
						'product__cart',
						'product_type_' . $product->get_type(),
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
					)
				)
			),
			'attributes' => array(
				'data-product_id'  => $product->get_id(),
				'data-product_sku' => $product->get_sku(),
				'aria-label'       => $product->add_to_cart_description(),
				'rel'              => 'nofollow',
			),
		);

		$args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);

		if (isset($args['attributes']['aria-label'])) {
			$args['attributes']['aria-label'] = wp_strip_all_tags($args['attributes']['aria-label']);
		}

		wc_get_template('loop/add-to-cart.php', $args);
	}
	echo "</div>";
	echo '<div class="product__btn">' . do_shortcode('[woosw]') . '</div>';
?>
	<a class="product__btn" href="<?= $product->get_permalink() ?>">
		<div class="product__size"></div>
	</a>
<?php
}

// ADD TO CART END

// DESCRIPTION OF PRODUCT START 

function woocommerce_template_loop_product_title()
{
	echo '<div class="product__descr"> <h2 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

// DESCRTIPTION OF PRODUCT END

// HOME CATALOG START

function add_popular_product_to_home()
{
	$query = new WP_Query(['post_type' => 'product']);
	while ($query->have_posts()) {
		$query->the_post();

		if (get_field('popular')[0] == 'popular') {
			$id = get_the_ID();
			$product = new WC_Product($id);
			ave_product_constructor($product);
		}
	}
	wp_reset_postdata();
}

add_action('ave_home_catalog_popular', 'add_popular_product_to_home');

function add_new_product_to_home()
{
	$query = new WP_Query(['post_type' => 'product']);
	while ($query->have_posts()) {
		$query->the_post();

		if (get_field('popular')[0] == 'new') {
			$id = get_the_ID();
			$product = new WC_Product($id);
			ave_product_constructor($product);
		}
	}
	wp_reset_postdata();
}

add_action('ave_home_catalog_new', 'add_new_product_to_home');

function ave_product_constructor($product)
{
?>
	<div class="product">
		<div class="product__price">
			<sup><?= get_woocommerce_currency_symbol(); ?></sup>
			<?= $product->get_regular_price($context = 'view'); ?>
			<?= $product->get_sale_price($context = 'view'); ?>
		</div>
		<div class="product__info">
			<a href="<?= $product->get_permalink() ?>">
				<img src="http://study.ivit.pro/wp-content/themes/ave/images/info.png" alt=""> </a>
		</div>
		<div class="product__main-img">
			<?= $product->get_image($size = 'woocommerce_thumbnail', $attr = array(), $placeholder = true); ?>
		</div>
		<div class="product__descr">
			<div class="product__name">
				<a href="<?= $product->get_permalink() ?>">
					<?php the_title(); ?>
				</a>
			</div>
			<div>
				<?= $product->get_description($context = 'view'); ?>
			</div>

			<?php
			echo '<div class="product__btns">';
			do_action('woocommerce_after_shop_loop_item');
			echo '</div>';
			?>


		</div>
		<div class="product__mini-imgs">
			<img class="product__mini" src="<?= wp_get_attachment_url($product->get_gallery_image_ids($context = 'view')[0]) ?>">
			<img class="product__mini" src="<?= wp_get_attachment_url($product->get_gallery_image_ids($context = 'view')[1]) ?>">
		</div>



	</div>
<?php
}

// add_action('product_contructor', 'ave_product_constructor');

// HOME CATALOG END