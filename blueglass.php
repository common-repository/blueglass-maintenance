<?php
/**
 * Plugin Name: BlueGlass Maintenance
 * Description: Official maintenance plugin by BlueGlass Interactive (Tallinn).
 * Version: 1.3
 * Author: BlueGlass Tallinn
 * Author URI: https://www.blueglass.ee
 * License:  GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: blueglass_maintenance
 */

namespace BlueGlassOfficialPlugin_Maintenance;

if( ! defined( 'ABSPATH' ) ) {
    return;
}

class BlueGlassOfficialPlugin_Maintenance {
    function __construct() {
        add_action( 'admin_init', array($this, 'blueglass_reg_settings') );
        add_action( 'admin_footer', array($this, 'blueglass_custom_dashboard') );
    }

    function blueglass_reg_settings() {
        add_option('bgpo_main_pack', 'None');
        register_setting('bgpo_main_group', 'bgpo_main_pack', 'bgpo_main_callback');

        add_option('bgpo_date_pack', 'None');
        register_setting('bgpo_date_group', 'bgpo_date_pack', 'bgpo_date_callback');
    }

    function blueglass_custom_dashboard() {

        if ( get_current_screen()->base !== 'dashboard' ) {
            return;
        }
    
        global $current_user; // Get current user
        global $wp_version; // Get WP version

        define( 'BGPO_MAIN_URL', plugin_dir_url( __FILE__ ) ); // Define URL slug
        define( 'BGPO_MAIN_PATH', plugin_dir_path( __FILE__ ) ); // Define PATH slug
    
        $url        = BGPO_MAIN_URL . '/'; // Plugin path
        $css        = BGPO_MAIN_URL . 'dist/css/main.css'; // CSS path
        $js         = BGPO_MAIN_URL . 'dist/js/main.js'; // JS path
    
        $updates    = wp_get_update_data(); // Get plugins data    
        $upd        = $updates['counts']['total']; // Total current updates
        $version    = wp_version_check();
    
        $status     = get_option('bgpo_main_pack'); // Get Maintenance status
        $date       = get_option('bgpo_date_pack'); // Get Date status
        get_currentuserinfo(); // Get current user info
        $email      = (string) $current_user->user_email; // Get user email
        $admin      = "@blueglass.ee"; // Admin emails
    
        require_once( BGPO_MAIN_PATH . 'dist/parts/content.php' );  // Main panel
        require_once( BGPO_MAIN_PATH . 'dist/parts/settings.php' ); // Settings panel
        
        wp_enqueue_script( 'script', $js, array ( 'jquery' ), 1.1, true); // JS Enqueue
        wp_enqueue_style( 'style', $css ); // CSS Enqueue
        
    }   
}

new BlueGlassOfficialPlugin_Maintenance();
