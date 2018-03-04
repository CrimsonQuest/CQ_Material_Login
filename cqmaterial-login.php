<?php
/*
 * Plugin Name: Material Login Customizer
 * Pliugin URI: http://crimsonquest.com
 * Description: Provides a material design to the login form similar to Google Login forms
 * Version: 1.0
 * Author: Russell Comer | Crimson Quest
 * Author URI: https://crimsonquest.com
 * License: GPL2
 *
*/

/* Add a link to the plugin in the admin menu
 * under 'Settings > Material Login'
 *
*/
add_action( 'admin_menu', 'cqmaterial_login');

function cqmaterial_login() {
    /*
    * Use the add_options_page function
    * add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function )
    */
    add_options_page(
        'Official Material Login Customizer',
        'Material Login',
        'manage_options',
        'cqmaterial-login',
        'cqmaterial_login_options_page'
    );

}



function cqmaterial_login_options_page() {
    if ( !current_user_can( 'manage_options' ) ){
        wp_die('You do not have sufficent permissions to access this page. ');
    }

    require( 'inc/options-page-wrapper.php');

}


?>
