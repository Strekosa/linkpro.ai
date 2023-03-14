<?php
/**
 * Block Name: Values
 * Description: Values block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: values acf block
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
$text = get_field('text');

?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="<?php echo $slug; ?>__main container-boxed column">
		<?php
		if ($title) : ?>
			<h3 class="title"><?php echo $title; ?></h3>
		<?php endif; ?>

		<?php
		if ($text) : ?>
			<p class="<?php echo $slug; ?>__desc"><?php echo $text; ?></p>
		<?php endif; ?>

		<?php
		// check if the nested repeater field has rows of data
		if (have_rows('values_list')): ?>
			<div class="<?php echo $slug; ?>__list">
				<?php while (have_rows('values_list')):
					the_row();
					$icon = get_sub_field('icon');
					$title = get_sub_field('title');
					$text = get_sub_field('text');
					?>
					<div class="<?php echo $slug; ?>__item flex align-center flex-xs-column xs-align-start w-100-sm">
						<?php if ($icon) : ?>
							<div class="<?php echo $slug; ?>__icon flex align-center justify-center">
								<img src="<?php echo esc_url($icon['url']); ?>"
									 alt="<?php echo esc_attr($icon['alt']); ?>"/>
							</div>
						<?php endif; ?>
						<div class="flex column">
							<?php
							if ($title) : ?>
								<h4 class="<?php echo $slug; ?>__title"><?php echo $title; ?></h4>
							<?php endif; ?>

							<?php
							if ($text) : ?>
								<div class="<?php echo $slug; ?>__text">
									<?php echo $text; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
