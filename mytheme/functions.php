<?php


/*
    Author: Roosa Kontinen, 2023.
    Functions for keep everything work.
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

//Adding support to add images to blog posts.
add_theme_support('post-thumbnails');

//Adding support to widgets.
add_theme_support('widgets');

//Theme menus

register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location',
    )
);



//Custom Image Sizes
add_image_size('blog-large', 800, 400, false);
add_image_size('blog-small', 300, 200, true);

//Registering sidebars.
function my_sidebars(){

    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
            'before_widget' => '',
            'after_widget'  => '',
        )
    );

    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
            'before_widget' => '',
            'after_widget'  => '',
        )
    );
}

add_action('widgets_init', 'my_sidebars');

//Custom post types function.
function my_first_post_type(){

    $args = array (
        
        //If you want to add label to that post type.
        'labels' => array(
                    'name' => 'Cars',
                    'singular_name' => 'Car',
                    ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-car',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),

        //If you want to change page name like test.fi/cars to test.fi/my-cars
        //'rewrite' => array('slug' => 'my-cars'),
    );

    register_post_type('cars', $args);

}

add_action('init', 'my_first_post_type');

function my_taxonomy(){

        $args = array(

            'labels' => array(
                        'name' => 'Brands',
                        'singular_name' => 'Brand',
                        ),
            'public' => true,
            'hierarchical' => true,
        );

    register_taxonomy('brands', array('cars'), $args);
}

add_action('init', 'my_taxonomy');


add_action('wp_ajax_enquiry', 'enquiry_form');
add_action('wp_ajax_nopriv_enquiry', 'enquiry_form');

//Function for form controlling and email sending
function enquiry_form(){

    $formdata = [];

    wp_parse_str($_POST['enquiry'], $formdata);

    //Getting admin email address
    $admin_email = get_option('admin_email');

    //Email headers
    $headers[] = 'Content-Type: text-html; charset=UTF-8';
    $headers[] = 'From: My Website <' . $admin_email . '>';
    $headers[] = 'Reply-to:' . $formdata['email'];

    //Checking wo we are sending to
    $send_to = $admin_email;

    //Subject
    $subject = "Enquiry from " . $formdata['fname'] . ' ' . $formdata['lname'];

    //Message
    $message = '';

    foreach($formdata as $index => $field){
        $message .= '<strong>' . $index . '</strong>' . $field . '<br />';
    }
    
    try {

        if(wp_mail($send_to, $subject, $message, $headers)){

            wp_send_json_success('Email sent');
        }
        else {

            wp_send_json_error('Email error');
        }
    } catch (Exeption $e){

        wp_send_json_error($e->getMessage());
    }


    wp_send_json_success($formdata['fname']);

}