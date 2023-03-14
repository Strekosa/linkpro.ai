<?php
/**
 * Block Name: Hero-contact
 * Description: Hero-contact banner block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: hero-contact acf block
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
$subtitle = get_field('subtitle');
$title = get_field('title');
$desc = get_field('desc');
$repeater = get_field('repeater');
$form = get_field('form');
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?> flex column align-center pos-rel"

>
	<div class="<?php echo $slug; ?>__main container-boxed flex-md-down-column pos-rel">

		<div class="<?php echo $slug; ?>__content flex column align-start pos-rel w-50 w-100-m-down md-align-center ">
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
			if ($form): ?>
				<div class="<?php echo $slug; ?>__form flex justify-center w-100 show-on-tablet"
					 style="background-image: url('<?= $bg_url; ?>');"
				>
					<?php foreach ($form as $p): // variable must NOT be called $post (IMPORTANT)
						$cf7_id = $p->ID;
						echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" ]');
					endforeach; ?>
				</div>
			<?php
			endif; ?>

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
		</div>


		<?php
		if ($form): ?>
			<div class="<?php echo $slug; ?>__form w-50 flex justify-end w-100-md w-100-sm justify-center-m-down  hide-on-tablet hide-mobile"
				 style="background-image: url('<?= $bg_url; ?>');"
			>
				<?php foreach ($form as $p): // variable must NOT be called $post (IMPORTANT)
					$cf7_id = $p->ID;
					echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" ]');
				endforeach; ?>
			</div>
		<?php
		endif; ?>

	</div>

</section>
