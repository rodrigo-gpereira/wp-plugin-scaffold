<?php
/**
 * Plugin Name:       @@PLUGIN_NAME
 * Plugin URI:        https://infografic.com.br
 * Description:       Wordpress Plugin Scaffold.
 * Version:           @@PLUGIN_VERSION
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Rodrigo Gomes
 * Author URI:        https://infografic.com.br
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-plugin-scaffold
 * Domain Path:       /languages
 *
 * @package           WpPluginScaffold
 */

use WPS\Includes\WpsPlugin;

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'WPS_PLUGIN_FILE' ) ) {
    define('WPS_PLUGIN_FILE', __FILE__);
}

if ( ! defined( 'WPS_PLUGIN_PATH' ) ) {
    define('WPS_PLUGIN_PATH', untrailingslashit( plugin_dir_path( WPS_PLUGIN_FILE) ));
}

if ( ! defined( 'WPS_PLUGIN_URL' ) ) {
    define('WPS_PLUGIN_URL', untrailingslashit( plugins_url( '/', WPS_PLUGIN_FILE) ));
}

if (file_exists(WPS_PLUGIN_PATH . '/vendor/autoload.php')) {
    require_once WPS_PLUGIN_PATH . '/vendor/autoload.php';
}

if (!class_exists('WpsPlugin',false)){

    function WPS() { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
        return WpsPlugin::getInstance();
    }

    add_action('plugins_loaded', array(WPS(), 'init'));

    // activation
    register_activation_hook(WPS_PLUGIN_FILE, array(WPS(), 'activate'));

    // deactivation
    register_deactivation_hook(WPS_PLUGIN_FILE, array(WPS(), 'deactivate'));
}