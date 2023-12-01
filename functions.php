<?php
    function learningWordPress_resources() {
        wp_enqueue_style('style', get_stylesheet_uri());
    }

    add_action('wp_enqueue_scripts', 'learningWordPress_resources');

    // Navigation Menus
    register_nav_menus(array(
        'header-menu' => __('Header Menu'),
        'footer-menu' => __('Footer Menu'),
        'menu-lateral' => __('Menu Lateral'),
    ));

    function enqueue_custom_scripts() {
        wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');
        wp_enqueue_script('jquery');
        wp_enqueue_script('custom-script', get_template_directory_uri() . '/script.js', array('jquery'), '', true);
    }

    add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

?>