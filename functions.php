<?php
/**
 * Theme functions and definitions.
 *
 * @package linkpro
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * Text domain definition
 */
defined('THEME_TD') ? THEME_TD : define('THEME_TD', 'wp_dev');

// Load modules
$theme_includes = [
	'/lib/helpers.php',
	'/lib/cleanup.php',                        // Clean up default theme includes
	'/lib/enqueue-scripts.php',                // Enqueue styles and scripts
	'/lib/protocol-relative-theme-assets.php', // Protocol (http/https) relative assets path
	'/lib/framework.php',                      // Css framework related stuff (content width, nav walker class, comments, pagination, etc.)
	'/lib/theme-support.php',                  // Theme support options
	'/lib/template-tags.php',                  // Custom template tags
	'/lib/menu-areas.php',                     // Menu areas
	'/lib/widget-areas.php',                   // Widget areas
	'/lib/customizer.php',                     // Theme customizer
	'/lib/vc_shortcodes.php',                  // Visual Composer shortcodes
	'/lib/jetpack.php',                        // Jetpack compatibility file
	'/lib/acf_field_groups_type.php',          // ACF Field Groups Organizer
	'/lib/acf_blocks_loader.php',              // ACF Blocks Loader
	'/lib/wp_dashboard_customizer.php',        // WP Dashboard customizer
	'/lib/custom-wysiwyg.php',        // WP Dashboard customizer
];

foreach ($theme_includes as $file) {
	if (!locate_template($file)) {
		/* translators: %s error*/
		trigger_error(esc_html(sprintf(esc_html(__('Error locating %s for inclusion', 'wp_dev')), $file)), E_USER_ERROR); // phpcs:ignore
		continue;
	}
	require_once locate_template($file);
}
unset($file, $filepath);


/**
 * wp_has_sidebar Add body class for active sidebar
 *
 * @param array $classes - classes
 * @return array
 */
function wp_has_sidebar($classes)
{
	if (is_active_sidebar('sidebar')) {
		// add 'class-name' to the $classes array
		$classes[] = 'has_sidebar';
	}
	return $classes;
}

add_filter('body_class', 'wp_has_sidebar');

// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');


/**
 * Obscure login screen error messages
 *
 * @return string
 */
function wp_login_obscure()
{
	return sprintf(
		'<strong>%1$s</strong>: %2$s',
		__('Error'),
		__('wrong username or password')
	);
}

add_filter('login_errors', 'wp_login_obscure');

/**
 * Require Authentication for All WP REST API Requests
 *
 * @param WP_Error|null|true $result WP_Error if authentication error, null if authentication method wasn't used, true if authentication succeeded.
 * @return WP_Error
 */
function rest_authentication_require($result)
{
	if (true === $result || is_wp_error($result)) {
		return $result;
	}

	if (!is_user_logged_in()) {
		return new WP_Error(
			'rest_not_logged_in',
			__('You are not currently logged in.'),
			array('status' => 401)
		);
	}

	return $result;
}

add_filter('rest_authentication_errors', 'rest_authentication_require');


// Disable the theme / plugin text editor in Admin
define('DISALLOW_FILE_EDIT', true);

// ACF Pro Options Page

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));

}

//add_filter('wpcf7_validate_tel*', 'dco_wpcf7_validate', 10, 2);
//function dco_wpcf7_validate($result, $tag)
//{
//
//	$tag = new WPCF7_Shortcode($tag);
//
//	$value = isset($_POST[$tag->name]) ? trim(wp_unslash(strtr((string)$_POST[$tag->name], "\n", " "))) : '';
//
//	if ('tel' == $tag->basetype) {
//		//Если тег обязателен и имеет пустое значение — выводим сообщение об ошибке
//		if ($tag->is_required() && '' == $value) {
//			$result->invalidate($tag, '');
//			//Если значение не пустое и не является корректным телефонным номером — выводим сообщение об ошибке
//		} elseif ('' != $value && !wpcf7_is_tel($value) && $value < 5) {
//			//Функция "wpcf7_get_message" выводит сообщения с вкладки "Уведомления при отправке формы" настроек формы
//			$result->invalidate($tag, wpcf7_get_message('invalid_tel'));
//		}
//	}
//
//	return $result;
//}

function wpds_validate_phone_number($result, $tag)
{

	$field_name = $tag['name'];

	if ($field_name == 'your-tel') { // Указываем имя поля для телефонного номера

		$tel = preg_replace('/\D/', '', $_POST[$field_name]);

		if (strlen($tel) != 12) { // Проверяем длину строки. Она должна содержать 10 символов

			$result['valid'] = false;

			$result['reason'][$field_name] = 'Пожалуйста, введите корректный 10-значный телефонный номер. Например, 0-800-503-808';

		}

	}

	return $result;

}

add_filter('wpcf7_validate_text', 'wpds_validate_phone_number', 10, 2);

add_filter('wpcf7_validate_text*', 'wpds_validate_phone_number', 10, 2);
