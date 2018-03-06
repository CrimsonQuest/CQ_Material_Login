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

function cqmaterial_login_scripts() {

  wp_enqueue_script( 'jQuery_3', '//code.jquery.com/jquery-3.3.1.min.js', array(), CHILD_THEME_VERSION );
  wp_enqueue_style( 'md_bootstrap_css', '//cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.5/css/mdb.min.css', array(), CHILD_THEME_VERSION );
	wp_enqueue_script( 'md_bootstrap_js', '//cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.5/js/mdb.min.js', array(), CHILD_THEME_VERSION );

  wp_enqueue_script( 'jQuery-targets', plugins_url( 'cqmaterial-login/inc/js/cqlogin.js' ));
	wp_enqueue_style( 'custom-login', plugins_url( 'cqmaterial-login/cqlogin-style.css' ));

}

add_action( 'login_enqueue_scripts', 'cqmaterial_login_scripts' );

?>
