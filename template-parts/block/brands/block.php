<?php
/**
 * Block Name: Repeater
 * Description: Repeater block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: repeater acf block
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

?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="container-boxed column">
		<?php
		if ($title) : ?>
			<h2 class="title"><?php echo $title; ?></h2>
		<?php endif; ?>

		<?php
		// check if the nested repeater field has rows of data
		if (have_rows('repeater_list')):?>
			<div class="<?php echo $slug; ?>__main flex justify-between flex-sm-column">
				<?php while (have_rows('repeater_list')): the_row();
					$icon = get_sub_field('icon');
					$title = get_sub_field('title');
					$text = get_sub_field('text');
					?>
					<div class="<?php echo $slug; ?>__item flex column w-100-sm">
						<div class="<?php echo $slug; ?>__top flex align-center">
							<?php if ($icon) : ?>
								<div class="<?php echo $slug; ?>__icon">
									<img src="<?php echo esc_url($icon['url']); ?>"
										 alt="<?php echo esc_attr($icon['alt']); ?>"/>
								</div>
							<?php endif; ?>
							<?php
							if ($title) : ?>
								<h3 class="<?php echo $slug; ?>__title"><?php echo $title; ?></h3>
							<?php endif; ?>
						</div>


						<?php
						if ($text) : ?>
							<div class="<?php echo $slug; ?>__text">
								<?php echo $text; ?>
							</div>
						<?php endif; ?>

					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
