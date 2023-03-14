<?php
/**
 * Block Name: Hero
 * Description: Hero banner block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: hero acf block
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

$bg_image = get_field('bg_image');
$bg_url = $bg_image ['url'];
$image = get_field('image');
$subtitle = get_field('subtitle');
$title = get_field('title');
$desc = get_field('desc');
$repeater = get_field('repeater');
$link = get_field('link');
$footnote = get_field('footnote');
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?> flex column align-center pos-rel"

>
	<div class="<?php echo $slug; ?>__main container-boxed flex-md-down-column align-center pos-rel">

		<div class="<?php echo $slug; ?>__content flex column align-start pos-rel w-50 w-100-sm">
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
				<p class="<?php echo $slug; ?>__desc">
					<?php echo $desc; ?>
				</p>
			<?php endif; ?>

			<?php
			// check if the nested repeater field has rows of data
			if (have_rows('repeater')): ?>
				<div class="<?php echo $slug; ?>__repeater">
					<?php while (have_rows('repeater')):
						the_row();
						$icon = get_sub_field('icon');
						$text = get_sub_field('text');
						?>

						<div class="<?php echo $slug; ?>__item flex align-center w-100-sm">
							<?php if ($icon) : ?>
								<div class="<?php echo $slug; ?>__item-icon flex align-center justify-center">
									<img src="<?php echo esc_url($icon['url']); ?>"
										 alt="<?php echo esc_attr($icon['alt']); ?>"/>
								</div>
							<?php endif; ?>

							<?php
							if ($text) : ?>
								<div class="<?php echo $slug; ?>__item-text">
									<?php echo $text; ?>
								</div>
							<?php endif; ?>
						</div>

					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php
			if ($link):
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $button['target'] : '_self';
				?>
				<a class="<?php echo $slug; ?>__link button flex justify-center align-center w-100-xs"
				   href="<?php echo esc_url($link_url); ?>"
				   target="<?php echo esc_attr($link_target); ?>">
					<?php echo esc_html($link_title); ?>

					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
						<path d="M1.70386 3.99902H13.1039M13.1039 3.99902L10.106 0.999023M13.1039 3.99902L10.106 6.99902"
							  stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
					</svg>
				</a>
			<?php endif; ?>

			<?php
			if ($footnote) : ?>
				<p class="<?php echo $slug; ?>__footnote">
					<?php echo $footnote; ?>
				</p>
			<?php endif; ?>
		</div>

		<?php
		if (have_rows('media')):
			// Loop through rows.
			while (have_rows('media')) : the_row();
				?>

				<?php
				if (get_row_layout() == 'image'):
					$image = get_sub_field('image');
					$text = get_sub_field('text');
					?>

					<?php if ($image) : ?>
					<div class="<?php echo $slug; ?>__image flex column w-50 w-100-sm hide-mobile"
						 style="background-image: url('<?= $bg_url; ?>');">
						<img src="<?php echo esc_url($image['url']); ?>"
							 alt="<?php echo esc_attr($image['alt']); ?>"/>
					</div>
				<?php endif; ?>
				<?php elseif
				(get_row_layout() == 'form'):
					$form = get_sub_field('form');
					if ($form): ?>
						<div class="<?php echo $slug; ?>__form w-50 flex justify-end w-100-md w-100-sm justify-center-m-down "
							 style="background-image: url('<?= $bg_url; ?>');"
						>
							<?php foreach ($form as $p): // variable must NOT be called $post (IMPORTANT)
								$cf7_id = $p->ID;
								echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" ]');
							endforeach; ?>
						</div>
					<?php endif;
				endif; ?>
			<?php
			endwhile;
		endif;
		?>
	</div>
	<?php if ($image) : ?>
		<div class="<?php echo $slug; ?>__image w-100-sm show-on-mobile flex column"
			 style="background-image: url('<?= $bg_url; ?>');">
			<img src="<?php echo esc_url($image['url']); ?>"
				 alt="<?php echo esc_attr($image['alt']); ?>"/>
		</div>
	<?php endif; ?>
</section>
