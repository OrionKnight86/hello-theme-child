<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );

// Dynamic Shortcodes
function floatingHeaderClassFunction( $atts ){
	$class_value = '';
	
	if (function_exists('get_field')) {
		$floating_header = get_field('floating_header');
		$class_value = $floating_header ? 'floating-header' : '';
	}
	return $class_value;
}

add_shortcode( 'return_floating_class', 'floatingHeaderClassFunction' );

// Enable ACF Shortcode if needed
function set_acf_settings() {
    acf_update_setting( 'enable_shortcode', true );
}
//add_action( 'acf/init', 'set_acf_settings' );

function phpTestFunction( $atts ){
	$class_value = 'abaabaabaa';
    $s1 = 'hello';
    $s2 = 'world';

    $a1 = str_split($s1);
    $a2 = str_split($s2);

    $intersectedArray = array_intersect($a1, $a2);
    $output = '';
    if(count($intersectedArray) > 0){
        $output = 'Yes';
    }else{
        $output = 'No';
    }

    print_r($output);
    return ' - Complete';
    
}

add_shortcode( 'return_test', 'phpTestFunction' );