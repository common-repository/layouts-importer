<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              as
 * @since             1.0.0
 * @package           GDI
 *
 * @wordpress-plugin
 * Plugin Name:       Gutenblog Demo Import
 * Plugin URI:        
 * Description:       This addon work to demo import sample data for Gutentor based theme - WPGutenBlog.
 * Version:           1.0.7
 * Author:            wpgutenblog 
 * Author URI:        https://wpgutenblog.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gutenblog-demo-import
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GDI_VERSION', '1.0.7' );
/*Define Constants for this plugin*/
define( 'GDI_PLUGIN_NAME', 'gutenblog-demo-import' );
define( 'GDI_PATH', plugin_dir_path( __FILE__ ) );
define( 'GDI_URL', plugin_dir_url( __FILE__ ) );
define( 'GDI_TEMPLATE_URL', GDI_URL . 'includes/demo-data/' );
define( 'GDI_SCRIPT_PREFIX', ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '' ) );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gutenblog-demo-import-activator.php
 */
function gdi_activate()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-gutenblog-demo-import-activator.php';
    GDI_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gutenblog-demo-import-deactivator.php
 */
function gdi_deactivate()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-gutenblog-demo-import-deactivator.php';
    GDI_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'gdi_activate' );
register_deactivation_hook( __FILE__, 'gdi_deactivate' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gutenblog-demo-import.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

if ( !function_exists( 'gdi_run' ) ) {
    function gdi_run()
    {
        return GDI::instance();
    }
    
    gdi_run()->run();
}
