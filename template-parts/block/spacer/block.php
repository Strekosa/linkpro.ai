<?php
/**
 * Block Name: Spacer
 * Description: It is spacer ACF Block.
 * Category: common
 * Icon: list-view
 * Keywords: spacer acf block example
 * Supports: { "align":false, "anchor":true }
 *
 * @package Mogul
 *
 * @var array $block
 */
$slug = str_replace('acf/', '', $block['name']);
$block_id = $slug . '-' . $block['id'];
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset($block['className']) ? $block['className'] : '';

$is_local = get_field('globallocal');
if ($is_local) {
	$heightdesk = get_field('space_desktop');
	$heighttablet = get_field('space_tablet');
	$heightmob = get_field('space_mobile');
} else {
	$heightdesk = get_field('space_desktop', 'options');
	$heighttablet = get_field('space_tablet');
	$heightmob = get_field('space_mobile');
}

?>
<div id="<?php echo $block_id; ?>"
	 class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>"
	 style="--space-desktop: <?php echo $heightdesk; ?>px; --space-tablet: <?php echo $heighttablet; ?>px; --space-mobile: <?php echo $heightmob; ?>px">

</div>

