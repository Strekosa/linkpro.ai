<?php
/**
 * Block Name: Reviews
 * Description: Reviews block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: reviews acf block
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

?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="container-boxed column">
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
		<div class="<?php echo $slug; ?>__main">
			<?php
			// check if the nested repeater field has rows of data
			if (have_rows('reviews_list')):?>
				<div class="<?php echo $slug; ?>__list">
					<?php while (have_rows('reviews_list')): the_row();
						$image = get_sub_field('photo');
						$name = get_sub_field('name');
						$position = get_sub_field('position');
						$text = get_sub_field('text');
						?>
						<div class="<?php echo $slug; ?>__item">
							<div class="<?php echo $slug; ?>__top flex align-center">
								<?php
								if ($image) : ?>
									<div class="<?php echo $slug; ?>__img">
										<img src="<?php echo esc_url($image ['url']); ?>"
											 alt="<?php echo esc_attr($image ['alt']); ?>"/>
									</div>
								<?php endif; ?>
								<div>
									<?php if ($name) : ?>
										<p class="<?php echo $slug; ?>__name"><?php echo $name; ?></p>
									<?php endif; ?>
									<?php
									if ($position) : ?>
										<p class="<?php echo $slug; ?>__position"><?php echo $position; ?></p>
									<?php endif; ?>
								</div>
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
	</div>
</section>
