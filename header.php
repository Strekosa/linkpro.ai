<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package linkpro
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="preloader" class="preloader">
	<div id="loader"></div>
</div>
<header class="header pos-rel">
	<div class="header__container container-boxed pos-rel">
		<div class="header__row wrapper align-center justify-between">

			<div class="header__main flex align-center justify-between">
				<a class="header__brand brand flex align-center justify-center"
				   href="<?php echo esc_url(home_url()); ?>">
					<?php if (get_header_image()) : ?>
						<img class="brand__img" src="<?php echo(get_header_image()); ?>"
							 alt="<?php bloginfo('name'); ?>"/>
					<?php
					else :
						bloginfo('name');
					endif;
					?>
					<?php
					if ($logo_name = get_field('logo_name', 'options')) : ?>
						<h1>
							<?php echo $logo_name; ?>
						</h1>
					<?php endif; ?>

				</a><!-- /.brand -->

				<nav class="nav-primary header__nav navbar navbar-expand-lg navbar-light bg-light">
					<?php
					if ($link_free = get_field('started_free', 'options')):
						$link_url = $link_free['url'];
						$link_title = $link_free['title'];
						$link_target = $link_free['target'] ? $button['target'] : '_self';
						?>
						<a class="header__free flex justify-center align-center show-on-mobile"
						   href="<?php echo esc_url($link_url); ?>"
						   target="<?php echo esc_attr($link_target); ?>">
							<?php _e('Get Started'); ?>
						</a>
					<?php endif; ?>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNavBar"
							aria-controls="primaryNavBar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php
					if (has_nav_menu('primary')) :
						wp_nav_menu(
								[
										'theme_location' => 'primary',
										'menu_id' => 'primary-menu',
										'container_class' => 'collapse navbar-collapse',
										'container_id' => 'primaryNavBar',
										'menu_class' => 'navbar-nav flex',
										'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'walker' => new linkpro_Navwalker(),
								]
						);
					endif;
					?>


				</nav><!-- .nav-primary -->
			</div>

			<div class="header__buttons flex align-center hide-mobile">
				<?php
				if ($link_sign = get_field('sign_in', 'options')):
					$link_url = $link_sign['url'];
					$link_title = $link_sign['title'];
					$link_target = $link_sign['target'] ? $button['target'] : '_self';
					?>
					<a class="header__sign-in flex justify-center align-center"
					   href="<?php echo esc_url($link_url); ?>"
					   target="<?php echo esc_attr($link_target); ?>">
						<?php echo esc_html($link_title); ?>
					</a>
				<?php endif; ?>

				<?php
				if ($link_free = get_field('started_free', 'options')):
					$link_url = $link_free['url'];
					$link_title = $link_free['title'];
					$link_target = $link_free['target'] ? $button['target'] : '_self';
					?>
					<a class="header__free flex justify-center align-center"
					   href="<?php echo esc_url($link_url); ?>"
					   target="<?php echo esc_attr($link_target); ?>">
						<?php echo esc_html($link_title); ?>

						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="none">
							<path d="M1.70386 3.99902H13.1039M13.1039 3.99902L10.106 0.999023M13.1039 3.99902L10.106 6.99902"
								  stroke="white" stroke-width="1.5" stroke-linecap="round"
								  stroke-linejoin="round"></path>
						</svg>
					</a>
				<?php endif; ?>
			</div>
		</div>
		<!-- /.header__row -->
	</div>
	<!-- /.header__container -->
</header><!-- .banner -->
<main id="content" class="site-content">
