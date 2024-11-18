<?php
/**
 * Block Name: Price cards query
 * Description: Price cards query block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: price-cards-query  acf block
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
$price_tabs = get_field('price_tabs');
$title = get_field('title');
$text = get_field('text');
$per_month = get_field('per_month');
$link = get_field('link')
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="<?php echo $slug; ?>__main container-boxed column align-center"
		 style="background-image: url('<?= $bg_url; ?>');">

		<?php
		// check if the nested repeater field has rows of data
		if (have_rows('price_tabs')): ?>
			<div class="<?php echo $slug; ?>__tabs flex">
				<?php while (have_rows('price_tabs')):
					the_row();
					$tab = get_sub_field('tab');
					?>
					<div class="<?php echo $slug; ?>__tab flex align-center column ">

						<?php
						if ($tab) : ?>
							<div class="<?php echo $slug; ?>__text">
								<?php echo $tab; ?>
							</div>
						<?php endif; ?>

					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

		<?php $arg = array(
				'post_type' => 'price',
				'order' => 'ASC',
				'orderby' => 'date',
				'posts_per_page' => 3,

		);
		$the_query = new WP_Query($arg);
		if ($the_query->have_posts()) : ?>
			<div class="<?php echo $slug; ?>__cards flex">
				<?php while ($the_query->have_posts()) :
				$the_query->the_post();
				$do_not_duplicate = get_the_ID();
				$price_cost = get_field('price_cost', $do_not_duplicate);
				$price_subtitle = get_field('price_subtitle', $do_not_duplicate);
				$price_desc = get_field('price_desc', $do_not_duplicate);
				$price_text = get_field('price_text', $do_not_duplicate);
				$price_link = get_field('price_link', $do_not_duplicate);
				?><!-- BEGIN of Post -->
				<div class="<?php echo $slug; ?>__card flex justify-between column w-100-sm">
					<?php
					if ($price_subtitle = get_field('subtitle')) : ?>
						<p class="<?php echo $slug; ?>__subtitle">
							<?php echo $price_subtitle; ?>
						</p>
					<?php endif; ?>

					<h4><?php the_title(); ?></h4>


					<?php
					if ($price_desc = get_field('price_desc')) : ?>
						<p class="<?php echo $slug; ?>__desc">
							<?php the_field('price_desc'); ?>
						</p>
					<?php endif; ?>

					<?php
					if ($price_link = get_field('price_link')):
						$link_url = $price_link['url'];
						$link_title = $price_link['title'];
						$link_target = $price_link['target'] ? $button['target'] : '_self';
						?>
						<a class="<?php echo $slug; ?>__link button flex justify-center align-center w-100-xs"
						   href="<?php echo esc_url($link_url); ?>"
						   target="<?php echo esc_attr($link_target); ?>">
							<?php echo esc_html($link_title); ?>
						</a>
					<?php endif; ?>

					<?php
					if ($price_text = get_field('price_text')) : ?>
						<div class="<?php echo $slug; ?>__text">
							<?php echo $price_text ?>
						</div>
					<?php endif; ?>
					<pre> <?php var_dump($price_text); ?></pre>
					<?php the_post_thumbnail(); ?>

					<?php
					// check if the nested repeater field has rows of data
					if (have_rows('included_list')): ?>
						<div class="<?php echo $slug; ?>__list">
							<?php while (have_rows('included_list')):
								the_row();
								$text = get_sub_field('text');
								?>
								<div class="<?php echo $slug; ?>__item flex align-center column w-100-sm">

									<?php
									if ($text) : ?>
										<div class="<?php echo $slug; ?>__text">
											<?php echo $text; ?>
										</div>
									<?php endif; ?>

								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

				</div>
				<?php endwhile; ?><!-- END of Post -->

			</div><!-- END of .post-type -->
		<?php endif;
		wp_reset_query();
		?>

		<div class="started-free">
			<?php
			if ($title) : ?>
				<h5 class="started-free__title">
					<?php echo $title; ?>
				</h5>
			<?php endif; ?>

			<div class="started-free__main flex align-start justify-between">
				<div class="flex align-start">
					<?php
					if ($text) : ?>
						<div class="started-free__text">
							<?php echo $text; ?>
						</div>
					<?php endif; ?>

					<?php
					if ($per_month) : ?>
						<div class="started-free__cost flex">
							<?php echo $per_month; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php
				if ($link):
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $button['target'] : '_self';
					?>
					<a class="started-free__link btn flex justify-center align-center w-100-xs"
					   href="<?php echo esc_url($link_url); ?>"
					   target="<?php echo esc_attr($link_target); ?>">
						<?php echo esc_html($link_title); ?>
					</a>
				<?php endif; ?>
			</div>

		</div>

	</div>
</section>
