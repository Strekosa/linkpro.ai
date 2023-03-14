<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package linkpro
 */

get_header();
$not_found_bg = get_field('not_found_bg', 'options');
$bg_url = $not_found_bg ['url'];
$not_found_image = get_field('not_found_image', 'options');
?>

	<div id="primary" class="content-area">
		<section id="main" class="site-main" role="main">

			<section class="error-404 not-found container-boxed justify-between flex-sm-column-reverse"
					 style="background-image: url('<?= $bg_url; ?>');"
			>

				<div class="page-content flex column justify-center">
					<h2 class="page-title"><?php esc_html_e('Page not found', 'wp_dev'); ?></h2>
					<p class="error-404__text"><?php esc_html_e('It seems something went wrong. The page you are looking for doesn\'t exist or has been moved.', 'wp_dev'); ?></p>

					<a class="error-404__link flex justify-center align-center w-100-xs"
					   href="<?php echo home_url(); ?>">
						<?php esc_html_e('Take me home'); ?>
					</a>

				</div><!-- .page-content -->
				<?php if ($not_found_image) : ?>
					<div class="error-404__image flex column w-100-sm">
						<img src="<?php echo esc_url($not_found_image['url']); ?>"
							 alt="<?php echo esc_attr($not_found_image['alt']); ?>"/>
					</div>
				<?php endif; ?>


			</section><!-- .error-404 -->

		</section><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
