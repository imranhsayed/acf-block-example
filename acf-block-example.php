<?php
/**
 * Plugin Name: ACF Block example
 * Description: A example plugin for ACF block demo
 * Plugin URI:  https://codeytek.com/
 * Author:      Imran Sayed
 * Author URI:  https://codeytek.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version:     1.0.1
 * Text Domain: acf-block-example
 *
 * @package acf-block-example
 */

define( 'ACFB_PLUGIN_DIR_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'ACFB_BLOCK_TEMPLATE_PATH', ACFB_PLUGIN_DIR_PATH . '/block-templates/' );
define( 'ACFB_PLUGIN_DIR_URI', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

include_once 'inc/class-editor-assets.php';
include_once 'inc/class-acf-block.php';

