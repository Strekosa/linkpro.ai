<?php
/**
 * Block Name: Team
 * Description: Team block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: team acf block
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
		// check if the nested repeater field has rows of data
		if (have_rows('team_list')): ?>
			<div class="<?php echo $slug; ?>__list">
				<?php while (have_rows('team_list')):
					the_row();
					$icon = get_sub_field('icon');
					$name = get_sub_field('name');
					$position = get_sub_field('position');

					?>

					<div class="<?php echo $slug; ?>__item flex justify-between align-center column w-100-sm">
						<?php if ($icon) : ?>
							<div class="<?php echo $slug; ?>__icon flex align-center justify-center">
								<img src="<?php echo esc_url($icon['url']); ?>"
									 alt="<?php echo esc_attr($icon['alt']); ?>"/>
							</div>
						<?php endif; ?>

						<?php
						if ($name) : ?>
							<h4 class="<?php echo $slug; ?>__name"><?php echo $name; ?></h4>
						<?php endif; ?>

						<?php
						if ($position) : ?>
							<div class="<?php echo $slug; ?>__position">
								<?php echo $position; ?>
							</div>
						<?php endif; ?>
					</div>


				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
