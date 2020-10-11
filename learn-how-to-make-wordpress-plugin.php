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

    add_menu_page(
        'Learn Me',
        'Learn Me',
        'manage_options',
        'learn_how_to_make_wordpress_plugin_menu',
        'lhtwpp_menu_handle'
    );

    add_submenu_page(
        'learn_how_to_make_wordpress_plugin_menu',
        'Learn Me Submenu',
        'Learn Me SubMenu',
        'manage_options',
        'lhtwpp_sub_menu_handle'
    );
}
add_action('admin_menu', 'lhtmwpp_add_settings_page');

function lhtwpp_setting_page_handler()
{
    echo '<h1>Hello iam Geeksesi...</h1>';
}

function lhtwpp_menu_handle()
{
    echo '<h1>Hello iam Geeksesi...</h1>';
    echo '<h2>and its main page...</h2>';
}

function lhtwpp_sub_menu_handle()
{
    echo '<h1>Hello iam Geeksesi...</h1>';
    echo '<h2>and its main page...</h2>';
}
