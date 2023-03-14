<?php
/**
 * Block Name: Info
 * Description: Info block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: info acf block
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
$desc = get_field('desc');
$link = get_field('link');

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
		if ($desc) : ?>
			<p class="<?php echo $slug; ?>__desc">
				<?php echo $desc; ?>
			</p>
		<?php endif; ?>

		<?php
		if ($link):
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $button['target'] : '_self';
			?>
			<a class="<?php echo $slug; ?>__link flex justify-center align-center"
			   href="<?php echo esc_url($link_url); ?>"
			   target="<?php echo esc_attr($link_target); ?>">
				<?php echo esc_html($link_title); ?>

				<svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
					<path d="M1.70386 3.99902H13.1039M13.1039 3.99902L10.106 0.999023M13.1039 3.99902L10.106 6.99902"
						  stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
			</a>
		<?php endif; ?>

	</div>
</section>
