<?php

/**
 * ave Theme Customizer
 *
 * @package ave
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ave_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'ave_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'ave_customize_partial_blogdescription',
			)
		);
	}

	// 1.BANNER START

	// 1.1.BANNER SECTION START

	$wp_customize->add_section('banner', array(
		'title' => 'Настройки банера',
	));

	// 1.1.BANNER SECTION END

	// 1.2.BANNER CONTROL CLASS START

	class banner_Control extends WP_Customize_Control
	{

		public function render_content()
		{
			echo "<label>";
			echo '<span>' . $this->label . '</span>';
			echo '<textarea rows="2" style ="width: 100%;"';
			$this->link();
			echo '>' . esc_textarea($this->value()) . '</textarea>';
			echo '</label>';
		}
	}

	// 1.2.BANNER CONTROL CLASS END

	// 1.3.BANNER SETTING START

	$wp_customize->add_setting('banner_setting', array(
		'default' => 'http://study.ivit.pro/wp-content/themes/ave/images/banner.png',
	));

	$wp_customize->add_setting('banner_btnName', array(
		'default' => "shop men's collection",
	));

	$wp_customize->add_setting('banner_btnUrl', array(
		'default' => '#',
	));

	// 1.3.BANNER SETTING END

	// 1.4.BANNER CONTROL START

	$wp_customize->add_control(new banner_Control(
		$wp_customize,
		'banner_setting',
		array(
			'label' => 'Ссылка на изображение баннера',
			'section' => 'banner',
			'setting' => 'banner_setting',
		)
	));

	$wp_customize->add_control(new banner_Control(
		$wp_customize,
		'banner_btnName',
		array(
			'label' => 'Имя кнопки баннера',
			'section' => 'banner',
			'setting' => 'banner_btnName',
		)
	));

	$wp_customize->add_control(new banner_Control(
		$wp_customize,
		'banner_btnUrl',
		array(
			'label' => 'Ссылка кнопки баннера',
			'section' => 'banner',
			'setting' => 'banner_btnUrl'
		)
	));
	// 1.4.BANNER CONTROL END

	// 1.BANNER END

	// 2.HOME LOOKBOOK START

	// 2.1.HOME LOOKBOOK SECTION START

	$wp_customize->add_section('homeLoolbook', array(
		'title' => 'Настройки блока LOOKBOOK на домашней странице',
	));

	// 2.1.HOME LOOKBOOK SECTION END

	// 2.2.HOME LOOKBOOK SETTING START

	$wp_customize->add_setting('homeLookbook_img', array(
		'default' => '#',
	));

	$wp_customize->add_setting('homeLookbook_h1', array(
		'default' => 'h1',
	));

	$wp_customize->add_setting('homeLookbook_h2', array(
		'default' => 'h2',
	));

	$wp_customize->add_setting('homeLookbook_p', array(
		'default' => 'p',
	));

	// 2.2.HOME LOOKBOOK SETTING END

	// 2.3.HOME LOOKBOOK CONTROL START

	// $wp_customize->add_control(new banner_Control(
	// 	$wp_customize,
	// 	'homeLookbook_img',
	// 	array(
	// 		'label' => 'Настройки картинки блока 1', 
	// 		'section' => 'homeLookbook',
	// 	)
	// ))

	// 2.3.HOME LOOKBOOK CONTROL END

	// 2.HOME LOOKBOOK END

}
add_action('customize_register', 'ave_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ave_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ave_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ave_customize_preview_js()
{
	wp_enqueue_script('ave-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'ave_customize_preview_js');
