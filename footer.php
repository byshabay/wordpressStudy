<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ave
 */

?>

<footer id="colophon" class="site-footer footer">
	<div class="container">
		<!-- FOOTER LINKS START -->
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'footer-menu',
				'menu_class' => 'footer__column',
				'container' => 'nav',
				'container_class' => 'footer__menu',
				'depth' => 3,

			)
		);
		?>
		<!-- FOOTER LINKS END -->

		<!-- FOOTER BANNERS START -->
		<div class="footer__banners">
			<div class="footer__banner-1">
				<div class="footer__bold-text">Award winner</div>
				<div>Fashion Awards 2016</div>
			</div>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social',
					'container' => 'div',
					'container_class' => 'footer__social',
					'depth' => 1,
				)
			);
			?>

		</div>
		<!-- FOOTER BANNERA END -->
	</div>
	<section class="footer__mini">
		<div class="container">
			<div class="footer__copyright">
				&copy;
				2016 Avenue Fashion
				<sup>TM</sup>
			</div>
			<div class="footer__autors">
				<address>Design by RobbyDesigns.com</address>
				<address>Dev by Loremipsum.com</address>
			</div>


		</div>
	</section>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>