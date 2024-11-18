<?php
/**
 * Block Name: Comment
 * Description: Comment block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: comment acf block
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


$photo = get_field('photo');
$bg_image = get_field('bg_image');
$bg_url = $bg_image ['url'];
$bg_photo = get_field('bg_photo');
$bg_photo_url = $bg_photo ['url'];
$text = get_field('text');


?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">

	<div class="<?php echo $slug; ?>__main container-boxed justify-between align-center flex-sm-column-reverse"
		 style="background-image: url('<?= $bg_url; ?>');"
	>

		<?php
		if ($text) : ?>
			<div class="<?php echo $slug; ?>__text w-100-sm"><?php echo $text; ?></div>
		<?php endif; ?>

		<div class="<?php echo $slug; ?>__image flex w-100-sm sm-align-center justify-center-sm "
			 style="background-image: url('<?= $bg_photo_url ; ?>');"
		>
			<?php
			if ($photo) : ?>
				<div class="<?php echo $slug; ?>__photo ">
					<img src="<?php echo esc_url($photo  ['url']); ?>"
						 alt="<?php echo esc_attr($photo  ['alt']); ?>"/>
				</div>
			<?php endif; ?>
		</div>
	</div>

</section>
