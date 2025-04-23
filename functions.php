<?php
/*
This is my theme function
*/

// Theme Title
add_theme_support('title_tag');

// Themes CSS and JQuery File Calling
function mushfiq_css_js_file_calling()
{
    wp_enqueue_style('mush-style', get_stylesheet_uri());
    // Bootstrap and custom styles
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '5.3.5', 'all');
    wp_register_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('custom');


    // JQuery
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '5.3.5', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '5.3.5', true);
}

add_action('wp_enqueue_scripts', 'mushfiq_css_js_file_calling');

// Google Fonts Enqueue
function mush_add_google_fonts()
{
    wp_enqueue_style('mush_google_fonts', 'https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald&display=swap', false);
}
add_action('wp_enqueue_scripts', 'mush_add_google_fonts');

// Theme Function
function mush_customizar_register($wp_customize)
{
    $wp_customize->add_section('mush_header_area', array(
        'title' => __('Header Area', 'mushfiq'),
        'description' => 'If you interested to update your header area, you can do it here.'
    ));

    $wp_customize->add_setting('mush_logo', array(
        'default' => get_bloginfo('template_directory') . '/img/logo.png',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mush_logo', array(
        'label' => 'Logo Upload',
        'setting' => 'mush_logo',
        'section' => 'mush_header_area',
    )));
}

// Add this line to hook your customizer function
add_action('customize_register', 'mush_customizar_register');

// Menu Register
register_nav_menu('main_menu', __('Main Menu', 'mushfiq'));
