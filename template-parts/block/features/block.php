<?php
/**
 * Block Name: Features
 * Description: Features block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: features acf block
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

$title = get_field('title');
$subtitle = get_field('subtitle');
$image = get_field('background_image');
$url = $image['url'];
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>"
		style="background-image: url('<?= $url; ?>');"
>

	<div class="container-boxed column <?php echo $slug; ?>__main">
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
		// check if the nested repeater field has rows of data
		if (have_rows('features_list')):?>
			<div class="<?php echo $slug; ?>__list">
				<?php while (have_rows('features_list')): the_row();
					$icon = get_sub_field('icon');
					$text = get_sub_field('text');
					?>
					<div class="<?php echo $slug; ?>__item flex">

						<div class="<?php echo $slug; ?>__item-inner">
							<?php if ($icon) : ?>
								<div class="<?php echo $slug; ?>__item-icon">
									<img src="<?php echo esc_url($icon['url']); ?>"
										 alt="<?php echo esc_attr($icon['alt']); ?>"/>
								</div>
							<?php endif; ?>
							<?php
							if ($text) : ?>
								<?php echo $text; ?>
							<?php endif; ?>
						</div>

					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
