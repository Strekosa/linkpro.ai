<?php
/**
 * Block Name: Calculator
 * Description: Calculator block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: calculator acf block
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

$image = get_field('bg_image');
$url = $image['url'];
$title = get_field('title');
$content_title = get_field('content_title');
$icon = get_field('icon');
$calculator = get_field('calculator');
$text = get_field('text');
$link = get_field('link');
?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>"
		style="background-image: url('<?= $url; ?>');"
>
	<?php
	if ($title) : ?>
		<h3 class="title text-center"><?php echo $title; ?></h3>
	<?php endif; ?>
	<div class="<?php echo $slug; ?>__main container-boxed flex-sm-column">

		<div class="<?php echo $slug; ?>__content flex justify-between column w-100-sm sm-align-center justify-center-sm">
			<div class="flex column">
				<div class="<?php echo $slug; ?>__title flex align-center">
					<?php
					if ($icon) : ?>
						<img class="<?php echo $slug; ?>__icon" src="<?php echo esc_url($icon ['url']); ?>"
							 alt="<?php echo esc_attr($icon ['alt']); ?>"/>
					<?php endif; ?>
					<?php
					if ($content_title) : ?>
						<h3><?php echo $content_title; ?></h3>
					<?php endif; ?>
				</div>
				<?php
				if ($text) : ?>
					<div class="<?php echo $slug; ?>__text"><?php echo $text; ?></div>
				<?php endif; ?>
			</div>
			<?php
			if ($link):
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $button['target'] : '_self';
				?>
				<a class="<?php echo $slug; ?>__link button w-100-xs flex justify-center hide-mobile "
				   href="<?php echo esc_url($link_url); ?>"
				   target="<?php echo esc_attr($link_target); ?>">
					<?php echo esc_html($link_title); ?>
				</a>
			<?php endif; ?>

		</div>
		<div class="<?php echo $slug; ?>__calc flex column w-100-sm sm-align-center ">

			<form class="form-calc">
				<h6>Get a quote for your Team plan:</h6>
				<p>
					<label> Choose you plan:<br>
						<span class="select-row">
							<select id="plan" name="plan" class="" aria-invalid="false">
								<option value="business">Business</option>
								<option value="pro">Pro</option>
								<option value="advanced">Advanced</option>
							</select>
						</span>
					</label>
				</p>
				<p>
					<label> Length of subscription:<br>
						<span class="select-row">
							<select id="length" name="length" class="">

								<option value="monthly">Monthly</option>
								<option value="annual">Annual</option>
							</select>
						</span>
					</label>
				</p>
				<p>
					<label> How many members do you want in your team (yourself included)?<br>
						<span class="select-row">
							<select id="members" name="members" class="">
								<option value="two">2</option>
								<option value="five">5</option>
								<option value="ten">10</option><option value="twenty">20</option>
								<option value="fifty">50</option>
								<option value="hundred">100+</option>
							</select>
						</span>
					</label>
				</p>
				<div class="result">
					$<span class="price">240</span><span class="term">/month</span>
				</div>
			</form>


			<?php
			if ($link):
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $button['target'] : '_self';
				?>
				<a class="<?php echo $slug; ?>__link button w-100-xs flex justify-center show-on-mobile"
				   href="<?php echo esc_url($link_url); ?>"
				   target="<?php echo esc_attr($link_target); ?>">
					<?php echo esc_html($link_title); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>

</section>
