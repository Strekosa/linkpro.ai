<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package linkpro
 */

get_header(); ?>
	<div class="flex">
		<?php
		while (have_posts()) :
		the_post();
		$do_not_duplicate = get_the_ID();
		$price_cost = get_field('price_cost', $do_not_duplicate);
		$price_subtitle = get_field('price_subtitle', $do_not_duplicate);
		$price_desc = get_field('price_desc', $do_not_duplicate);
		$price_text = get_field('price_text', $do_not_duplicate);
		$price_link = get_field('price_link', $do_not_duplicate);
		?><!-- BEGIN of Post -->
		<pre> <?php var_dump($do_not_duplicate); ?></pre>
		<div class="<?php echo $slug; ?>__item flex justify-between column w-100-sm">
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

		<?php endwhile; ?>
	</div>
<?php
get_footer();
