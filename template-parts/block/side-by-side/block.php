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
$link = get_field('link');
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">

	<div class="container-boxed flex-md-down-column-reverse <?php echo $image_position; ?>">
		<div class="image-side flex w-50 w-100-m-down md-align-center justify-center-m-down ">
			<?php
			if ($image) : ?>
				<div class="image-side__img">
					<img src="<?php echo esc_url($image ['url']); ?>"
						 alt="<?php echo esc_attr($image ['alt']); ?>"/>
				</div>
			<?php endif; ?>
		</div>
		<div class="content-side flex column w-50 w-100-m-down md-align-center ">
			<div class="content-side__inner flex align-start column">
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

				<?php
				if ($link):
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $button['target'] : '_self';
					?>
					<a class="link w-100-xs flex justify-center"
					   href="<?php echo esc_url($link_url); ?>"
					   target="<?php echo esc_attr($link_target); ?>">
						<?php echo esc_html($link_title); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

</section>
