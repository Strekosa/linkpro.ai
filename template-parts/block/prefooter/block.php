<?php
/**
 * Block Name: Prefooter
 * Description: Prefooter block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: prefooter acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package linkpro
 *
 * @var array $block
 */

$slug = str_replace('acf/', '', $block['name']);
$block_id = $slug . '-' . $block['id'];
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset($block['className']) ? $block['className'] : '';

$title = get_field('title');
$image = get_field('bg_image');
$url = $image['url'];
$form = get_field('form');

?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>"

>


	<div class="<?php echo $slug; ?>__main container-boxed column pos-rel"
		 style="background-image: url('<?php echo $url; ?>');"
	>
		<?php if ($image) : ?>
			<div class="<?php echo $slug; ?>__bg show-on-mobile">
				<img src="<?php echo esc_url($image['url']); ?>"
					 alt="<?php echo esc_attr($image['alt']); ?>"/>
			</div>
		<?php endif; ?>
		<?php
		if ($title) : ?>
			<h3 class="<?php echo $slug; ?>__title">
				<?php echo $title; ?>
			</h3>
		<?php endif; ?>

		<?php
		$featured_posts = $form;
		if ($featured_posts):
			?>
			<div class="<?php echo $slug; ?>__form flex justify-center">
				<?php foreach ($featured_posts as $p):

					// Setup this post for WP functions (variable must be named $post).
					setup_postdata($p);

					?>
					<?php
					$cf7_id = $p->ID;
					echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" ]');
					?>

				<?php
				endforeach; ?>
			</div>
			<?php
			// Reset the global post object so that the rest of the page works correctly.
			wp_reset_postdata();
			?>

		<?php endif; ?>

	</div>
</section>
