<?php
/**
 * Enqueue theme assets
 *
 * @package Aquila
 */

class Editor_Assets {

	function __construct() {

		// load class.
		$this->setup_hooks();
	}

	function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_editor_assets' ] );
	}

	public function enqueue_editor_assets() {

		// Theme Gutenberg blocks CSS.
		$css_dependencies = [
			'wp-block-library-theme',
			'wp-block-library'
		];

		// Register styles.
		wp_register_style( 'editor-css', ACFB_PLUGIN_DIR_URI . '/assets/editor.css', $css_dependencies, filemtime( ACFB_PLUGIN_DIR_PATH . '/assets/editor.css' ), 'all' );

		// Enqueue Styles.
		wp_enqueue_style( 'editor-css' );
	}

}

new Editor_Assets();
