<?php
/**
 * Block Name: Teamwork
 * Description: Teamwork block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: teamwork acf block
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

$subtitle = get_field('subtitle');
$title = get_field('title');

?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="<?php echo $slug; ?>__main container-boxed column align-center">
		<?php
		if ($subtitle) : ?>
			<div class="sub-title">
				<p><?php echo $subtitle; ?></p>
			</div>
		<?php endif; ?>

		<?php
		if ($title) : ?>
			<h3 class="title"><?php echo $title; ?></h3>
		<?php endif; ?>

		<?php
		// check if the nested repeater field has rows of data
		if (have_rows('teamwork_list')): ?>
			<div class="<?php echo $slug; ?>__list">
				<?php while (have_rows('teamwork_list')):
					the_row();
					$icon = get_sub_field('icon');
					$title = get_sub_field('title');
					$text = get_sub_field('text');
					?>
					<div class="<?php echo $slug; ?>__item flex align-center column w-100-sm">
						<?php if ($icon) : ?>
							<div class="<?php echo $slug; ?>__icon flex align-center justify-center">
								<img src="<?php echo esc_url($icon['url']); ?>"
									 alt="<?php echo esc_attr($icon['alt']); ?>"/>
							</div>
						<?php endif; ?>

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
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
