<?php
/**
 * Block Name: Accordion
 * Description: Accordion block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: accordion acf block
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

		<?php if (have_rows('accordion_list')): ?>

			<ul class="accordion-list ">

				<?php while (have_rows('accordion_list')): the_row();
					$icon = get_sub_field('icon');
					$title = get_sub_field('question');
					$text = get_sub_field('answer');
					?>

					<li class="accordion-item">

						<div class="question flex align-center justify-between">
							<div class="flex align-center">
								<?php
								if ($icon) : ?>
									<div class="question__image flex">
										<img src="<?php echo esc_url($icon ['url']); ?>"
											 alt="<?php echo esc_attr($icon ['alt']); ?>"/>
									</div>
								<?php endif; ?>
								<?php
								if ($title) : ?>
									<div class="question__title">
										<?php echo $title; ?>
									</div>
								<?php endif; ?>
							</div>
							<span class="question__icon"></span>
						</div>
						<div class="answer">
							<?php
							if ($text) : ?>
								<div class="answer__text">
									<?php echo $text; ?>
								</div>
							<?php endif; ?>
						</div>
					</li>
				<?php
				endwhile; ?>
			</ul>

		<?php endif; ?>
	</div>
</section>
