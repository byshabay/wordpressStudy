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
    <?php get_header(); ?>
    <main class=" main home">
        <!-- 2.1.BANNER START -->
        <section class="banner" style="background: url('<?php do_action('add_banner') ?>') center no-repeat;">
            <div class="container">
                <img class="banner__h1" src="http://study.ivit.pro/wp-content/themes/ave/images/ave.png" alt="AVE">
                <a class="banner__btn" href="<?php do_action('add_bannerBtnUrl') ?>"><?php do_action('add_bannerBtnName') ?></a>
            </div>

        </section>
        <!-- 2.1.BANNER END -->

        <!-- 2.2.CATALOG START -->
        <section class="catalog container">
            <hr>
            <div id="tabs" class="catalog__tabs">
                <ul class="catalog__tab">
                    <li>
                        <a class="active-tab" href="#tab-1">Popular</a>
                    </li>
                    <li>
                        <a href="#tab-2">new arrivals </a>
                    </li>
                    <li>
                        <a href="#tab-3">best sellers</a>
                    </li>
                    <li>
                        <a href="#tab-4">special offers</a>
                    </li>
                    <li>
                        <a href="#tab-5">coming soon</a>
                    </li>
                </ul>
                <div class="catalog__items">
                    <div class="catalog__item" id="tab-1">
                        <section class="catalog__group-content">
                            <?php
                            do_action('ave_home_catalog_popular');
                            ?>
                        </section>
                    </div>
                    <div class="catalog__item" id="tab-2">
                        <section class="catalog__group-content">
                            <?php
                            do_action('ave_home_catalog_new');
                            ?>
                        </section>
                    </div>
                </div>




                <!-- <ul class="catalog__tab">
                    <li>
                        <a class="active-tab" href="#tab-1">Popular</a>
                    </li>
                    <li>
                        <a href="#tab-2">new arrivals </a>
                    </li>
                    <li>
                        <a href="#tab-3">best sellers</a>
                    </li>
                    <li>
                        <a href="#tab-4">special offers</a>
                    </li>
                    <li>
                        <a href="#tab-5">coming soon</a>
                    </li>
                </ul>
                <div class="catalog__items">
                    <div class="catalog__item" id="tab-1">
                        <section class="catalog__group-content">
                            <div class="product">
                                <div class="product__price">
                                    <sup>&pound;</sup>
                                    20
                                </div>
                                <div class="product__info">
                                    <a href="pages/product.html"> <img src="images/info.png" alt=""> </a>
                                </div>
                                <img class="product__main-img" src="images/cat_1.png" alt="">
                                <div class="product__descr">
                                    <div class="product__name">Womens burnt orange casual tee £29.95</div>
                                    <div>Classic casual t-shirt for women on the move.
                                        100% cotton.</div>
                                    <div class="product__btns">
                                        <a class="product__btn" href="#">
                                            <div class="product__cart"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__wish"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__size"></div>
                                        </a>
                                    </div>

                                </div>
                                <div class="product__mini-imgs">
                                    <img class="product__mini" src="images/cat_1.png" alt="">
                                    <img class="product__mini" src="images/cat_2.png" alt="">
                                </div>



                            </div>
                            <div class="product">
                                <div class="product__price">
                                    <sup>&pound;</sup>
                                    20
                                </div>
                                <img class="product__main-img" src="images/cat_2.png" alt="">
                                <div class="product__descr">
                                    <div class="product__name">Womens burnt orange casual tee £29.95</div>
                                    <div>Classic casual t-shirt for women on the move.
                                        100% cotton.</div>
                                    <div class="product__btns">
                                        <a class="product__btn" href="#">
                                            <div class="product__cart"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__wish"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__size"></div>
                                        </a>
                                    </div>

                                </div>
                                <div class="product__mini-imgs">
                                    <img class="product__mini" src="images/cat_1.png" alt="">
                                    <img class="product__mini" src="images/cat_2.png" alt="">
                                </div>
                                <div class="product__info">
                                    <a href="pages/product.html"> <img src="images/info.png" alt=""></a>
                                </div>
                            </div>
                            <div class="product">
                                <div class="product__price">
                                    <sup>&pound;</sup>
                                    20
                                </div>
                                <img class="product__main-img" src="images/cat_1.png" alt="">
                                <div class="product__descr">
                                    <div class="product__name">Womens burnt orange casual tee £29.95</div>
                                    <div>Classic casual t-shirt for women on the move.
                                        100% cotton.</div>
                                    <div class="product__btns">
                                        <a class="product__btn" href="#">
                                            <div class="product__cart"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__wish"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__size"></div>
                                        </a>
                                    </div>

                                </div>
                                <div class="product__mini-imgs">
                                    <img class="product__mini" src="images/cat_1.png" alt="">
                                    <img class="product__mini" src="images/cat_2.png" alt="">
                                </div>
                                <div class="product__info">
                                    <img src="images/info.png" alt="">
                                </div>
                            </div>
                            <div class="product">
                                <div class="product__price">
                                    <sup>&pound;</sup>
                                    20
                                </div>
                                <div class="product__info">
                                    <a href="pages/product.html"> <img src="images/info.png" alt=""> </a>
                                </div>
                                <img class="product__main-img" src="images/cat_2.png" alt="">
                                <div class="product__descr">
                                    <div class="product__name">Womens burnt orange casual tee £29.95</div>
                                    <div>Classic casual t-shirt for women on the move.
                                        100% cotton.</div>
                                    <div class="product__btns">
                                        <a class="product__btn" href="#">
                                            <div class="product__cart"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__wish"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__size"></div>
                                        </a>
                                    </div>

                                </div>
                                <div class="product__mini-imgs">
                                    <img class="product__mini" src="images/cat_1.png" alt="">
                                    <img class="product__mini" src="images/cat_2.png" alt="">
                                </div>



                            </div>
                            <div class="product">
                                <div class="product__price">
                                    <sup>&pound;</sup>
                                    20
                                </div>
                                <img class="product__main-img" src="images/cat_2.png" alt="">
                                <div class="product__descr">
                                    <div class="product__name">Womens burnt orange casual tee £29.95</div>
                                    <div>Classic casual t-shirt for women on the move.
                                        100% cotton.</div>
                                    <div class="product__btns">
                                        <a class="product__btn" href="#">
                                            <div class="product__cart"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__wish"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__size"></div>
                                        </a>
                                    </div>

                                </div>
                                <div class="product__mini-imgs">
                                    <img class="product__mini" src="images/cat_1.png" alt="">
                                    <img class="product__mini" src="images/cat_2.png" alt="">
                                </div>
                                <div class="product__info">
                                    <a href="pages/product.html"> <img src="images/info.png" alt=""></a>
                                </div>
                            </div>
                            <div class="product">
                                <div class="product__price">
                                    <sup>&pound;</sup>
                                    20
                                </div>
                                <img class="product__main-img" src="images/cat_2.png" alt="">
                                <div class="product__descr">
                                    <div class="product__name">Womens burnt orange casual tee £29.95</div>
                                    <div>Classic casual t-shirt for women on the move.
                                        100% cotton.</div>
                                    <div class="product__btns">
                                        <a class="product__btn" href="#">
                                            <div class="product__cart"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__wish"></div>
                                        </a>
                                        <a class="product__btn" href="#">
                                            <div class="product__size"></div>
                                        </a>
                                    </div>

                                </div>
                                <div class="product__mini-imgs">
                                    <img class="product__mini" src="images/cat_1.png" alt="">
                                    <img class="product__mini" src="images/cat_2.png" alt="">
                                </div>
                                <div class="product__info">
                                    <img src="images/info.png" alt="">
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="catalog__item" id="tab-2">
                        текст 2
                    </div>
                </div> -->
            </div>
            <hr>
        </section>
        <!-- 2.2.CATALOG END -->

        <!-- 2.3.LOOKBOOK START-->
        <section class="lookbook">
            <div class="lookbook__item lookbook__men" style="background-image: url('<?php do_action('homelookbook_img') ?>');">
                <h2>
                    <?php do_action('homelookbook_h1') ?>
                </h2>
                <span>
                    <?php do_action('homelookbook_h2') ?>
                </span>
                <p>
                    <?php do_action('homelookbook_p') ?>
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

<?php
get_footer();
?>