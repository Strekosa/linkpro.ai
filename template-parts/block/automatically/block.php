<?php
/**
 * Block Name: Automatically
 * Description: Automatically block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: automatically acf block
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

$subtitle = get_field('subtitle');
$title = get_field('title');
$image = get_field('image');
$image_bg = get_field('bg_image');
$url = $image_bg['url'];
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?> pos-rel"
>
	<?php if ($image_bg) : ?>
		<div class="<?php echo $slug; ?>__bg ">
			<img src="<?php echo esc_url($image_bg['url']); ?>"
				 alt="<?php echo esc_attr($image_bg['alt']); ?>"/>
		</div>
	<?php endif; ?>
	<div class="<?php echo $slug; ?>__main container-boxed column align-center">

		<div class="flex align-center column">
			<?php
			if ($subtitle) : ?>
				<div class="sub-title">
					<p><?php echo $subtitle; ?></p>
				</div>
			<?php endif; ?>
			<?php
			if ($title) : ?>
				<h2 class="title"><?php echo $title; ?></h2>
			<?php endif; ?>

		</div>

		<?php
		if ($image) : ?>
			<div class="<?php echo $slug; ?>__image flex column"

			>
				<img src="<?php echo esc_url($image ['url']); ?>"
					 alt="<?php echo esc_attr($image ['alt']); ?>"/>
			</div>
		<?php endif; ?>

	</div>
</section>
