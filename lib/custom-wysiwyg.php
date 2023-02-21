<?php
/**
 * Custom styles in TinyMCE
 *
 * @param array $buttons
 *
 * @return array
 */

function custom_style_selector($buttons)
{
    array_unshift($buttons, 'styleselect');

    return $buttons;
}

add_filter('mce_buttons_2', 'custom_style_selector');

function insert_custom_formats($init_array)
{
    // Define the style_formats array
    $style_formats = array(
        array(
            'title' => 'Span',
            'classes' => 'span',
            'selector' => 'a,p',
            'wrapper' => false,
        ),
        array(
            'title' => 'Two columns',
            'classes' => 'two-columns',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,ul',
        ),
        array(
            'title' => 'Three columns',
            'classes' => 'three-columns',
            'selector' => 'p,h1,h2,h3,h4,h5,h6,ul',
        ),
    );
    $init_array['style_formats'] = json_encode($style_formats);

    return $init_array;

}

add_filter('tiny_mce_before_init', 'insert_custom_formats');

add_editor_style();

/**
 * Add custom color to TinyMCE editor text color selector
 *
 * @param $init array
 *
 * @return mixed array
 */

function expand_default_editor_colors($init)
{
    $default_colours = '"000000", "Black","993300", "Burnt orange","333300", "Dark olive","003300", "Dark green","003366", "Dark azure","000080", "Navy Blue","333399", "Indigo","333333", "Very dark gray","800000", "Maroon","FF6600", "Orange","808000", "Olive","008000", "Green","008080", "Teal","0000FF", "Blue","666699", "Grayish blue","808080", "Gray","FF0000", "Red","FF9900", "Amber","99CC00", "Yellow green","339966", "Sea green","33CCCC", "Turquoise","3366FF", "Royal blue","800080", "Purple","999999", "Medium gray","FF00FF", "Magenta","FFCC00", "Gold","FFFF00", "Yellow","00FF00", "Lime","00FFFF", "Aqua","00CCFF", "Sky blue","993366", "Brown","C0C0C0", "Silver","FF99CC", "Pink","FFCC99", "Peach","FFFF99", "Light yellow","CCFFCC", "Pale green","CCFFFF", "Pale cyan","99CCFF", "Light sky blue","CC99FF", "Plum","FFFFFF", "White"';

    $custom_colours = '

		"#554CE6", "Indigo Deep",
		"#8690F9", "Indigo Medium",
		"1d1d1d", "Black",
		"#B60000", "Scarlet",
		"737373", "Gray",';

    $init['textcolor_map'] = '[' . $default_colours . ',' . $custom_colours . ']';
    $init['textcolor_rows'] = 6; // expand colour grid to 6 rows

    return $init;
}

add_filter('tiny_mce_before_init', 'expand_default_editor_colors');

