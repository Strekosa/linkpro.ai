<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package linkpro
 */

$title = get_field('prefooter_title', 'options');
$image = get_field('image_bg', 'options');
$url = $image['url'];
?>

</main><!-- #content -->

<footer id="footer-container" class="site-footer" role="contentinfo">

	<div class="container-boxed column">

		<nav class="nav-footer">
			<?php
			if (has_nav_menu('footer_menu')) :
				wp_nav_menu(
						[
								'theme_location' => 'footer_menu',
								'menu_id' => 'footer-menu',
								'walker' => new codeska_navwalker(),
						]
				);
			endif;
			?>
		</nav><!-- .nav-primary -->

		<div class="footer-copyright flex justify-between flex-sm-column align-center">

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
