<?php
/**
 * Block Name: Repeater
 * Description: Repeater block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: repeater acf block
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
	<div class="container-boxed column">
		<?php
		if ($title) : ?>
			<h3 class="title"><?php echo $title; ?></h3>
		<?php endif; ?>

		<?php
		// check if the nested repeater field has rows of data
		if (have_rows('repeater_list')): ?>
			<div class="<?php echo $slug; ?>__main">
				<?php while (have_rows('repeater_list')):
					the_row();
					$icon = get_sub_field('icon');
					$title = get_sub_field('title');
					$text = get_sub_field('text');
					$link = get_sub_field('link');
					?>

					<?php
					if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $button['target'] : '_self';
						?>
						<a class="<?php echo $slug; ?>__item flex justify-between column w-100-sm"
						   href="<?php echo esc_url($link_url); ?>"
						   target="<?php echo esc_attr($link_target); ?>">
							<div>
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
							<div class="<?php echo $slug; ?>__link">
								<?php echo esc_html($link_title); ?>
								<svg width="12" height="8" viewBox="0 0 12 8" fill="none"
									 xmlns="http://www.w3.org/2000/svg">
									<path d="M0.753174 3.99927H10.2532M10.2532 3.99927L7.75496 1.49927M10.2532 3.99927L7.75496 6.49927"
										  stroke="#8690F9" stroke-width="1.5" stroke-linecap="round"
										  stroke-linejoin="round"/>
								</svg>
							</div>
						</a>
					<?php endif; ?>

				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
