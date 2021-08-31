<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ave
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'ave'); ?></a>

        <header id="masthead" class="site-header header">
            <!-- 1.1.HEADER TOP MENU START -->
            <section class="header__top-menu ">
                <div class="container">
                    <div class="header__currency">
                        Currency:
                        <select id="currency" class="header__currency-list">
                            <option value="GBP">Test</option>
                            <option value="EUR">EUR</option>
                            <option value="MYR">MYR</option>
                            <option value="HRD">HRD</option>
                            <option value="RUB">RUB</option>
                        </select>
                    </div>

                    <ul class="header__auth">
                        <li class="header__register"><a href="http://study.ivit.pro/my-account/">Register</a></li>
                        <li class="header__sign-in"><a href="http://study.ivit.pro/my-account/">Sign In</a></li>
                        <li class="header__cart header__parent-li">
                            <img src="http://study.ivit.pro/wp-content/uploads/2021/08/cart.png" alt="Корзина">
                            <span> empty</span>
                            <img class="header__cart-btn" src="http://study.ivit.pro/wp-content/uploads/2021/08/cart-button.png">
                            <div class="header__sub-content">

                            </div>

                        </li>
                    </ul>
                </div>
            </section>
            <!-- 1.1.HEADER TOP MENU END -->
            <!-- 1.2.HEADER NAVIGATION MENU START -->
            <section class="header__nav-block">
                <div class="container">
                    <div class="site-branding header__logo">
                        <?php
                        the_custom_logo();
                        ?>
                    </div><!-- .site-branding -->
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'menu_class' => 'header__nav-list',
                            'container' => 'nav',
                            'container_class' => "header__nav",
                            'after' => '<button class="submenu-open"><span></span></button>',
                            'depth' => 3,
                            'walker' => new My_Menu_Walker(),
                        )
                    );
                    ?>

                    <?php get_search_form($args); ?>
                </div>
            </section>
            <!-- 1.2.HEADER NAVIGATION MENU END -->
        </header><!-- #masthead -->