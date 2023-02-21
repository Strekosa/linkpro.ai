<?php
/**
 * Block Name: About price
 * Description: About price managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: about price acf block
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

$image = get_field('bg_image');
$url = $image['url'];
$subtitle = get_field('subtitle');
$title = get_field('title');
$desc = get_field('desc');
$link = get_field('link');
$footnote = get_field('footnote');
$card_title = get_field('card_title');
$card_price = get_field('card_price');
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>"
		style="@media screen and (max-width: 768px) {background-image: url('<?= $url; ?>');}"
>


	<div class="<?php echo $slug; ?>__main container-boxed flex-md-down-column justify-center align-center-m-down">

		<div class="<?php echo $slug; ?>__text flex column w-50 w-100-sm md-align-center ">

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
			if ($desc) : ?>
				<p class="<?php echo $slug; ?>__desc"><?php echo $desc; ?></p>
			<?php endif; ?>

		</div>

		<div class="<?php echo $slug; ?>__card flex w-50  w-100-m-down align-center justify-center pos-rel">
			<?php if ($image) : ?>
				<div class="<?php echo $slug; ?>__card-bg ">
					<img src="<?php echo esc_url($image['url']); ?>"
						 alt="<?php echo esc_attr($image['alt']); ?>"/>
				</div>
			<?php endif; ?>

			<div class="<?php echo $slug; ?>__card-inner ">

				<?php
				if ($card_title) : ?>
					<h3 class="<?php echo $slug; ?>__card-title"><?php echo $card_title; ?></h3>
				<?php endif; ?>

				<?php
				if ($card_price)  : ?>
					<h2 class="<?php echo $slug; ?>__card-price"><?php echo $card_price; ?></h2>
				<?php endif; ?>

				<?php
				if ($link):
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $button['target'] : '_self';
					?>
					<a class="<?php echo $slug; ?>__card-link w-100-xs flex justify-center align-center"
					   href="<?php echo esc_url($link_url); ?>"
					   target="<?php echo esc_attr($link_target); ?>">
						<?php echo esc_html($link_title); ?>
						<svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1.25323 3.99902H10.7532M10.7532 3.99902L8.25502 1.49902M10.7532 3.99902L8.25502 6.49902"
								  stroke="#111622" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</a>
				<?php endif; ?>

				<?php
				if ($footnote)  : ?>
					<p class="<?php echo $slug; ?>__card-footnote"><?php echo $footnote; ?></p>
				<?php endif; ?>


				<?php
				// check if the nested repeater field has rows of data
				if (have_rows('qualities')):?>
					<div class="<?php echo $slug; ?>__card-qualities">

						<?php while (have_rows('qualities')): the_row();
							$icon = get_sub_field('icon');
							$text = get_sub_field('text');
							?>
							<div class="<?php echo $slug; ?>__card-quality flex align-center">

								<?php if ($icon) : ?>
									<div class="<?php echo $slug; ?>__card-quality-icon flex">
										<img src="<?php echo esc_url($icon['url']); ?>"
											 alt="<?php echo esc_attr($icon['alt']); ?>"/>
									</div>
								<?php endif; ?>

								<?php
								if ($text) : ?>
									<p class="<?php echo $slug; ?>__card-quality-text">
										<?php echo $text; ?>
									</p>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

</section>
