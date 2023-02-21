<?php
/**
 * Block Name: Accordion
 * Description: Accordion block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: accordion acf block
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
$desc = get_field('desc');

?>
<section
		id="<?php echo $block_id; ?>"
		class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">
	<div class="<?php echo $slug; ?>__main container-boxed justify-between flex-md-down-column md-align-center">
		<div class="<?php echo $slug; ?>__description ">
			<?php
			if ($title) : ?>
				<h2 class="title"><?php echo $title; ?></h2>
			<?php endif; ?>
			<?php
			if ($desc) : ?>
				<?php echo $desc; ?>
			<?php endif; ?>
			<?php if (have_rows('accordion_list')): ?>
		</div>
		<ul class="<?php echo $slug; ?>__list ">

			<?php while (have_rows('accordion_list')): the_row();
				$icon = get_sub_field('icon');
				$title = get_sub_field('question');
				$text = get_sub_field('answer');
				?>

				<li class="accordion-item">

					<div class="question flex align-center justify-between">
						<div class="flex align-center">
							<?php
							if ($icon) : ?>
								<div class="question__image flex">
									<img src="<?php echo esc_url($icon ['url']); ?>"
										 alt="<?php echo esc_attr($icon ['alt']); ?>"/>
								</div>
							<?php endif; ?>
							<?php
							if ($title) : ?>
								<div class="question__title">
									<?php echo $title; ?>
								</div>
							<?php endif; ?>
						</div>
						<span class="question__icon">

<svg class="close" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M10 5.4999C10.4971 5.4999 10.9 5.90285 10.9 6.3999V9.0999H13.6C14.0971 9.0999 14.5 9.50285 14.5 9.9999C14.5 10.497 14.0971 10.8999 13.6 10.8999H10.9V13.5999C10.9 14.097 10.4971 14.4999 10 14.4999C9.50297 14.4999 9.10003 14.097 9.10003 13.5999V10.8999H6.40002C5.90297 10.8999 5.50002 10.497 5.50002 9.9999C5.50002 9.50285 5.90297 9.0999 6.40002 9.0999H9.10003V6.3999C9.10003 5.90285 9.50297 5.4999 10 5.4999Z"
		fill="#46556A"></path>
  <path fill-rule="evenodd" clip-rule="evenodd"
		d="M10 19.5999C15.302 19.5999 19.6 15.3018 19.6 9.9999C19.6 4.69797 15.302 0.399902 10 0.399902C4.69809 0.399902 0.400024 4.69797 0.400024 9.9999C0.400024 15.3018 4.69809 19.5999 10 19.5999ZM10 17.7999C14.3078 17.7999 17.8 14.3077 17.8 9.9999C17.8 5.69208 14.3078 2.1999 10 2.1999C5.6922 2.1999 2.20002 5.69208 2.20002 9.9999C2.20002 14.3077 5.6922 17.7999 10 17.7999Z"
		fill="#46556A"></path>
</svg>
							<svg class="open" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
								 viewBox="0 0 20 20" fill="none">
  <path d="M6.40002 9.0999C5.90297 9.0999 5.50002 9.50285 5.50002 9.9999C5.50002 10.497 5.90297 10.8999 6.40002 10.8999H13.6C14.0971 10.8999 14.5 10.497 14.5 9.9999C14.5 9.50285 14.0971 9.0999 13.6 9.0999L6.40002 9.0999Z"
		fill="#46556A"></path>
  <path fill-rule="evenodd" clip-rule="evenodd"
		d="M19.6 9.9999C19.6 15.3018 15.302 19.5999 10 19.5999C4.69809 19.5999 0.400024 15.3018 0.400024 9.9999C0.400024 4.69797 4.69809 0.399902 10 0.399902C15.302 0.399902 19.6 4.69797 19.6 9.9999ZM17.8 9.9999C17.8 14.3077 14.3078 17.7999 10 17.7999C5.6922 17.7999 2.20002 14.3077 2.20002 9.9999C2.20002 5.69208 5.6922 2.1999 10 2.1999C14.3078 2.1999 17.8 5.69208 17.8 9.9999Z"
		fill="#46556A"></path>
</svg>
						</span>
					</div>
					<div class="answer">
						<?php
						if ($text) : ?>
							<div class="answer__text">
								<?php echo $text; ?>
							</div>
						<?php endif; ?>
					</div>
				</li>
			<?php
			endwhile; ?>
		</ul>

		<?php endif; ?>
	</div>
</section>
