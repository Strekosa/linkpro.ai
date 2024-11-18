<?php
/**
 * Block Name: Price cards
 * Description: Price cards block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: price-cards acf block
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
$link = get_field('link');
$label_tabs = [];
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>"
		style="background-image: url('<?= $bg_url; ?>');">
	<div class="<?php echo $slug; ?>__main container-boxed column align-center"
	>

		<?php
		// check if the nested repeater field has rows of data
		if (have_rows('price_tabs')): ?>
			<div class="<?php echo $slug; ?>__tabs flex">
				<?php $counter=0; ?>
				<?php while (have_rows('price_tabs')):
					the_row();
					$tab = get_sub_field('tab');
					$label = get_sub_field('label');
					array_push($label_tabs, $label);
					$counter++;
					?>
					<div data-tab="<?php echo $label; ?>" class="<?php echo $slug; ?>__tab flex align-center column <?php if($counter==1): echo 'active'; endif; ?>">
						<?php
						if ($tab) : ?>
							<?php echo $tab; ?>
						<?php endif; ?>

					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>


		<?php
		$featured_posts = get_field('cards');
		if ($featured_posts): ?>
			<div class="<?php echo $slug; ?>__cards">
				<?php foreach ($featured_posts

							   as $featured_post):
					$permalink = get_permalink($featured_post->ID);
					$title = get_the_title($featured_post->ID);
					$custom_field = get_field('field_name', $featured_post->ID);
					$price_cost = get_field('price_cost', $featured_post->ID);
					$price_subtitle = get_field('price_subtitle', $featured_post->ID);
					$price_desc = get_field('price_desc', $featured_post->ID);
					$price_text = get_field('price_text', $featured_post->ID);
					$price_link = get_field('price_link', $featured_post->ID);
					$included_list = get_field('included_list', $featured_post->ID);
					$style = get_field('price_style', $featured_post->ID);
					$marker = get_field('price_marker', $featured_post->ID);

					?>
					<div class="<?php echo $slug; ?>__card flex column <?php echo $style; ?>">

						<?php
						if ($price_subtitle) : ?>
							<p class="<?php echo $slug; ?>__card-subtitle">
								<?php echo $price_subtitle; ?>
							</p>
						<?php endif; ?>

						<div class="<?php echo $slug; ?>__card-heading flex">
							<?php
							if ($marker) : ?>
								<div class="<?php echo $slug; ?>__card-marker"
									 style="background-color: <?php echo $marker; ?>">
								</div>
							<?php endif; ?>
							<?php
							if ($title) : ?>
								<h5 class="<?php echo $slug; ?>__card-title">
									<?php echo $title; ?>
								</h5>
							<?php endif; ?>
						</div>

						<?php
						// check if the nested repeater field has rows of data
						if (have_rows('price_cost', $featured_post->ID)): ?>
							<div class="">
								<?php while (have_rows('price_cost', $featured_post->ID)):
									the_row();
									$one_month = get_sub_field('one_month');
									$three_month = get_sub_field('three_month');
									$twelve_month = get_sub_field('twelve_month');
									?>

									<?php
									if ($one_month) : ?>
										<div class="<?php echo $slug; ?>__card-cost <?php echo $label_tabs[0]; ?> active">
											<?php echo $one_month; ?>
										</div>
									<?php endif; ?>
									<?php
									if ($three_month) : ?>
										<div class="<?php echo $slug; ?>__card-cost <?php echo $label_tabs[1]; ?>">
											<?php echo $three_month; ?>
										</div>
									<?php endif; ?><?php
									if ($twelve_month) : ?>
										<div class="<?php echo $slug; ?>__card-cost <?php echo $label_tabs[2]; ?>">
											<?php echo $twelve_month; ?>
										</div>
									<?php endif; ?>

								<?php endwhile; ?>
							</div>
						<?php endif; ?>

						<?php
						if ($price_desc) : ?>
							<p class="<?php echo $slug; ?>__card-desc">
								<?php echo $price_desc;; ?>
							</p>
						<?php endif; ?>

						<?php
						if ($price_link):
							$link_url = $price_link['url'];
							$link_title = $price_link['title'];
							$link_target = $price_link['target'] ? $button['target'] : '_self';
							?>
							<a class="<?php echo $slug; ?>__card-link btn flex justify-center align-center w-100-xs"
							   href="<?php echo esc_url($link_url); ?>"
							   target="<?php echo esc_attr($link_target); ?>">
								<?php echo esc_html($link_title); ?>
							</a>
						<?php endif; ?>

						<?php
						if ($price_text) : ?>
							<div class="<?php echo $slug; ?>__card-text">
								<?php echo $price_text ?>
							</div>
						<?php endif; ?>

						<?php
						// check if the nested repeater field has rows of data
						if (have_rows('included_list', $featured_post->ID)): ?>
							<ul class="<?php echo $slug; ?>__card-included">
								<?php while (have_rows('included_list', $featured_post->ID)):
									the_row();
									$text1 = get_sub_field('text');
									$included = get_sub_field('included');
									?>

									<?php if ('yes' == get_sub_field('included')): ?>
									<?php
									if ($text1) : ?>
										<li class="included">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
												 viewBox="0 0 20 20" fill="none">
												<path d="M14.2145 8.25798C14.5779 7.91883 14.5975 7.34932 14.2583 6.98594C13.9192 6.62257 13.3497 6.60293 12.9863 6.94208L8.45754 11.1689L7.01448 9.82208C6.65111 9.48293 6.08159 9.50257 5.74244 9.86594C5.40329 10.2293 5.42293 10.7988 5.78631 11.138L7.84345 13.058C8.18924 13.3807 8.72584 13.3807 9.07162 13.058L14.2145 8.25798Z"
													  fill="#46556A"></path>
												<path fill-rule="evenodd" clip-rule="evenodd"
													  d="M10.0004 19.6C15.3023 19.6 19.6004 15.302 19.6004 10C19.6004 4.69809 15.3023 0.400024 10.0004 0.400024C4.69846 0.400024 0.400391 4.69809 0.400391 10C0.400391 15.302 4.69846 19.6 10.0004 19.6ZM10.0004 17.8C14.3082 17.8 17.8004 14.3078 17.8004 10C17.8004 5.6922 14.3082 2.20002 10.0004 2.20002C5.69257 2.20002 2.20039 5.6922 2.20039 10C2.20039 14.3078 5.69257 17.8 10.0004 17.8Z"
													  fill="#46556A"></path>
											</svg>
											<?php echo $text1; ?>
										</li>
									<?php endif; ?>
								<?php else: ?>
									<?php
									if ($text1) : ?>
										<li class="not-included">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
												 viewBox="0 0 20 20" fill="none">
												<path d="M8.23679 6.96363C7.88531 6.61216 7.31547 6.61216 6.96399 6.96363C6.61252 7.3151 6.61252 7.88495 6.96399 8.23642L8.7276 10L6.96399 11.7636C6.61252 12.1151 6.61252 12.6849 6.96399 13.0364C7.31547 13.3879 7.88531 13.3879 8.23679 13.0364L10.0004 11.2728L11.764 13.0364C12.1155 13.3879 12.6853 13.3879 13.0368 13.0364C13.3883 12.6849 13.3883 12.1151 13.0368 11.7636L11.2732 10L13.0368 8.23642C13.3883 7.88495 13.3883 7.3151 13.0368 6.96363C12.6853 6.61216 12.1155 6.61216 11.764 6.96363L10.0004 8.72723L8.23679 6.96363Z"
													  fill="#90A2BC"></path>
												<path fill-rule="evenodd" clip-rule="evenodd"
													  d="M19.6004 10C19.6004 15.302 15.3023 19.6 10.0004 19.6C4.69846 19.6 0.400391 15.302 0.400391 10C0.400391 4.69809 4.69846 0.400024 10.0004 0.400024C15.3023 0.400024 19.6004 4.69809 19.6004 10ZM17.8004 10C17.8004 14.3078 14.3082 17.8 10.0004 17.8C5.69257 17.8 2.20039 14.3078 2.20039 10C2.20039 5.6922 5.69257 2.20002 10.0004 2.20002C14.3082 2.20002 17.8004 5.6922 17.8004 10Z"
													  fill="#90A2BC"></path>
											</svg>
											<?php echo $text1; ?>
										</li>
									<?php endif; ?>
								<?php endif; ?>

								<?php endwhile; ?>
							</ul>
						<?php endif; ?>

					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

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
						<div class="started-free__cost flex hide-mobile">
							<?php echo $per_month; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php
				if ($per_month) : ?>
					<div class="started-free__cost flex show-on-mobile">
						<?php echo $per_month; ?>
					</div>
				<?php endif; ?>
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
