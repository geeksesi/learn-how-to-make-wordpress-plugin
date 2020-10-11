<?php
/*
Plugin Name: learn-how-to-make-wordpress-plugin
Plugin URI: http://github.com/geeksesi/learn-how-to-make-wordpress-plugin
Description: learn how to make wordpress plugin. step by step
Author: Mohammad Javad Ghasemy
Version: 1.0.0
Author URI: https://geeksesi.ir
*/

function lhtmwpp_add_settings_page()
{
    add_options_page(
        'صفحه تنظیمات افزونه ما',
        'صفحه تنظیمات افزونه ما',
        'manage_options',
        'learn_how_to_make_wordpress_plugin_setting_page',
        'lhtwpp_setting_page_handler'
    );
}
add_action('admin_menu', 'lhtmwpp_add_settings_page');

function lhtwpp_setting_page_handler()
{
    echo '<h1>Hello iam Geeksesi...</h1>';
}
