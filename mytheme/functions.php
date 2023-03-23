<?php


/*
Functions for loading Bootstrap and your own css and using them.
*/

// Loading Bootstrap css and your own css-file.
// REMEMBER put your own stylesheet under Bootstrap, so it will override Bootstrap's stylesheet.
function load_css(){

    //Bootstrap stylesheet
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    //Your stylesheet
    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');

}

add_action('wp_enqueue_scripts', 'load_css');

//Loading Bootstrap js and also jquery.
function load_js(){

    wp_enqueue_script('jquery');
    wp_register_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrapjs');

}

add_action('wp_enqueue_scripts', 'load_js');


//Theme option for adding wp menus.
add_theme_support('menus');

//Theme menus

register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location',
    )
);