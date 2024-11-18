<?php
/**
 * Block Name: Powered by AI
 * Description: Powered by AI block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: powered-by-ai acf block
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


$image = get_field('image');
$subtitle = get_field('subtitle');
$title = get_field('title');
$desc = get_field('desc');

?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">

	<div class="<?php echo $slug; ?>__main container-boxed align-center flex-md-down-column-reverse">
		<div class="image-side flex w-50 w-100-m-down md-align-center justify-center-m-down ">
			<?php
			if ($image) : ?>
				<div class="<?php echo $slug; ?>__img">
					<img src="<?php echo esc_url($image ['url']); ?>"
						 alt="<?php echo esc_attr($image ['alt']); ?>"/>
				</div>
			<?php endif; ?>
		</div>
		<div class="<?php echo $slug; ?>__content flex column w-50 w-100-m-down md-align-center ">
			<div class="<?php echo $slug; ?>__inner flex align-start column">

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
					<div class="desc"><?php echo $desc; ?></div>
				<?php endif; ?>

			</div>
		</div>
	</div>

</section>
