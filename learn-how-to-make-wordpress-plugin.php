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

/**
 * Add Widget
 */

include 'LHTMWPP_Widget.php';

add_action('widgets_init', function () {
    register_widget('LHTMWPP_Widget');
});

/**
 * Make Beautiful Rest Api
 */

add_action('rest_api_init', "LHWPP_rest_route_init");

function LHWPP_rest_route_init()
{
    register_rest_route('lhwpp/v1', 'hello', [
        "methods" => "POST",
        "callback" => "LHWPP_rest_hello_handler",
    ]);
}

/**
 * Route : site-url/wp-json/lhwpp/v1/hello
 * Method : POst
 * input : null
 * output : string
 *
 * @return string
 */
function LHWPP_rest_hello_handler()
{
    $output = [];
    $output["ok"] = true;
    $output["message"] = "Hello World I'm Panda";

    $out = json_encode($output);
    return $output;
}

/**
 * Database things are here.
 */

register_activation_hook(__FILE__, 'LHWPP_plugin_activate');
function LHWPP_plugin_activate()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'LHWPP_table';

    $sql =
        " CREATE TABLE " .
        $table_name .
        " (
        id                  BIGINT(20)   NOT NULL AUTO_INCREMENT,
        title               TEXT         NOT NULL,
        start_time          DATETIME     NOT NULL,
        finish_time         DATETIME         NULL,
        status              VARCHAR(20)  NOT NULL,
        PRIMARY KEY  (id)
    )" .
        $wpdb->get_charset_collate() .
        ";";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
    // add_option('jal_db_version', '1.0.0');
    if ($wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'") != $table_name) {
        error_log("unable to make db");
        return false;
    }
    return true;
}
