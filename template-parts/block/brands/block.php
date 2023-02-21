<?php
/**
 * Block Name: Brands
 * Description: Brands block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: brands acf block
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
$slider = get_field('brands_list');
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="<?php echo $slug; ?>__main container-boxed column">
		<?php
		if ($title) : ?>
			<p class="<?php echo $slug; ?>__title">
				<?php echo $title; ?>
			</p>
		<?php endif; ?>

		<?php
		// check if the nested repeater field has rows of data
		if (have_rows('brands_list')):
			echo '<div class="brands-slider hide-mobile">';

			// loop through the rows of data
			foreach ($slider as $slide) {
				echo '<div class="brands-item flex align-center justify-center"><img src="' . $slide['url'] . '" alt="' . $slide['alt'] . '"></div>';
			}
			echo '</div>';
			?>
		<?php endif; ?>

	</div>
	<?php
	// check if the nested repeater field has rows of data
	if (have_rows('brands_list')):
		echo '<div class="brands-slider show-on-mobile">';

		// loop through the rows of data
		foreach ($slider as $slide) {
			echo '<div class="brands-item flex align-center justify-center"><img src="' . $slide['url'] . '" alt="' . $slide['alt'] . '"></div>';
		}
		echo '</div>';
		?>
	<?php endif; ?>
</section>
