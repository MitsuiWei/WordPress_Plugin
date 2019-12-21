<?php
/*
 * Plugin Name: css_plugin - achang
 * Plugin URI: 
 * Description:一鍵讓你套用上樣式 
 * Version:     1.0
 * Author:      wei_xiang0702
 * Author URI:  
 *
 *
 * License:     GPL
 * 
 */

function add_css_select_button( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'add_css_select_button' );


//add custom styles to the WordPress editor
function css_select_list( $init_array ) {  

    $style_formats = array(  
        // These are the custom styles
        array(  
            'title' => 'class套用樣式',  
            'block' => 'span',  
            'classes' => 'OrangeFrame',
            'wrapper' => true
        ),

        array(
            'title' => '行內套用樣式',
            'inline' => 'span',
            'styles' => array(
                'color'             => 'white', 
                'height'            => '33px',
                'width'             => '100%',
                'border-collapse'   => 'collapse',
                'border-style'      => 'hidden' ,
                'background-color'  => '#f27813'
                ),
            'wrapper' => true
        )
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
    
    return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'css_select_list' );
?>
