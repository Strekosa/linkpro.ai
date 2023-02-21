<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package linkpro
 */

$logo = get_field('logo', 'options');
$logo_name = get_field('logo_name', 'options');
$logo_text = get_field('logo_text', 'options');
?>

</main><!-- #content -->

<footer id="footer-container" class="site-footer" role="contentinfo">
	<div class="container-boxed column">

		<div class="site-footer__main flex flex-sm-column ">
			<div class="">

				<a class="site-footer__logo flex align-center justify-center-sm "
				   href="<?php echo esc_url(home_url()); ?>">
					<?php
					if ($logo) : ?>
						<img class="site-footer__logo-img" src="<?php echo esc_url($logo ['url']); ?>"
							 alt="<?php echo esc_attr($logo ['alt']); ?>"/>
					<?php endif; ?>
					<?php
					if ($logo_name) : ?>
						<p>
							<?php echo $logo_name; ?>
						</p>
					<?php endif; ?>
				</a>

				<div class="site-footer__text">
					<?php
					if ($logo_text) : ?>
						<p class="">
							<?php echo $logo_text; ?>
						</p>
					<?php endif; ?>

				</div>
			</div>
			<nav class="nav-footer">
				<?php
				if (has_nav_menu('footer_menu')) :
					wp_nav_menu(
							[
									'theme_location' => 'footer_menu',
									'menu_id' => 'footer-menu',
									'menu_class' => 'footer-menu',

							]
					);
				endif;
				?>
			</nav><!-- .nav-primary -->
		</div>

		<div class="site-footer__copyright flex justify-between flex-sm-column align-center">

			<?php if ($copyright = get_field('copyright', 'options')): ?>
				<?php echo $copyright; ?>
			<?php endif; ?>

			<div class="socials flex ">
				<?php if (have_rows('social_networks', 'options')): ?>
					<ul class="socials-list flex">

						<?php while (have_rows('social_networks', 'options')): the_row(); ?>
							<?php if (($icon = get_sub_field('icon')) && ($link = get_sub_field('link'))): ?>
								<li>
									<a href="<?php echo $link['url']; ?>"><img
												src="<?php echo $icon['sizes']['thumbnail'] ?>"
												alt=""></a>
								</li>
							<?php endif; ?>
						<?php endwhile; ?>

					</ul>
				<?php endif; ?>
			</div>

		</div>

	</div>

</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
