<?php

/**
 * Template part for displaying front page
 *
 * @link https://vk.com/feed
 *
 * @package ave
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
    <main class=" main home">
        <?php get_header(); ?>
        <!-- 2.1.BANNER START -->
        <section class="banner" style="background: url('<?php do_action('add_banner') ?>') center no-repeat;">
            <div class="container">
                <img class="banner__h1" src="http://study.ivit.pro/wp-content/themes/ave/images/ave.png" alt="AVE">
                <a class="banner__btn" href="<?php do_action('add_bannerBtnUrl') ?>"><?php do_action('add_bannerBtnName') ?></a>
            </div>

        </section>
        <!-- 2.1.BANNER END -->

        <?php
        // get_footer();
        ?>
        <!-- 2.3.LOOKBOOK START-->
        <section class="lookbook">
            <div class="lookbook__item lookbook__men">
                <h2>
                    Men's
                </h2>
                <span>
                    Lookbook
                </span>
                <p>Lorem ipsum dolor sit amet eras facilisis
                    consectetur adipiscing elit lor, integer lorem consecteur dignissim laciniqui.
                    Elementum metus facilisis ut phasellu.
                </p>
                <a href="#" class="lookbook__view btn__view">View now</a>
            </div>
            <div class="lookbook__item lookbook__women">
                <h2>
                    Women's
                </h2>
                <span>
                    Lookbook
                </span>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames .
                    Pellentesque laoreet quis enim et mattis. Quisque interdum felis tellus.</p>
                <a href="#" class="lookbook__view btn__view">View now</a>
            </div>
            <div class="lookbook__item lookbook__your">
                <h2>
                    Your
                </h2>
                <span>
                    Lookbook
                </span>
                <p>See an item you like and click the  button to add it to your lookbook where you can create your own
                    perfect look.
                    It’s like your own boutique!</p>
                <a href="#" class="lookbook__view btn__view">View now</a>
            </div>


        </section>
        <!-- 2.3.LOOKBOOK END-->
    </main>
</article>