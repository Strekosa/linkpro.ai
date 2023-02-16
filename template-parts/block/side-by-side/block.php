<?php
/**
 * Block Name: Side by side
 * Description: Side by side block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: side-by-side acf block
 * Supports: { "align":false, "anchor":true }
 *
 * @package Codeska
 *
 * @var array $block
 */

$slug = str_replace('acf/', '', $block['name']);
$block_id = $slug . '-' . $block['id'];
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset($block['className']) ? $block['className'] : '';

$image_position = get_field('image_position');
$image = get_field('image');
$subtitle = get_field('subtitle');
$title = get_field('title');
$text = get_field('text');
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="container-boxed column">
		<div class="flex flex-sm-column <?php echo $image_position; ?>">
			<div class="image-side flex w-50 w-100-sm">
				<?php
				if ($image) : ?>
					<div class="image-side__img">
						<img src="<?php echo esc_url($image ['url']); ?>"
							 alt="<?php echo esc_attr($image ['alt']); ?>"/>
					</div>
				<?php endif; ?>
			</div>
			<div class="content-side flex w-50 w-100-sm">
				<?php
				if ($subtitle) : ?>
					<h2 class="title"><?php echo $subtitle; ?></h2>
				<?php endif; ?>
				<?php
				if ($title) : ?>
					<h2 class="title"><?php echo $title; ?></h2>
				<?php endif; ?>

				<?php
				if ($text) : ?>
					<?php echo $text; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
