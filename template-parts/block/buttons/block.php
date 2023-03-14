<?php
/**
 * Block Name: Buttons
 * Description: Buttons block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: buttons acf block
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

$text = get_field('text');

?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="<?php echo $slug; ?>__main container-boxed column">

		<?php
		// check if the nested repeater field has rows of data
		if (have_rows('buttons_list')): ?>
			<div class="<?php echo $slug; ?>__list flex flex-wrap">
				<?php while (have_rows('buttons_list')):
					the_row();
					$link = get_sub_field('link');
					?>
					<?php
					if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $button['target'] : '_self';
						?>
						<a class="<?php echo $slug; ?>__item flex justify-between column"
						   href="<?php echo esc_url($link_url); ?>"
						   target="<?php echo esc_attr($link_target); ?>">
							<?php echo esc_html($link_title); ?>
						</a>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
