<?php
/**
 * ACF block example
 */

class ACF_Block_Example {
	function __construct() {
		add_action('acf/init', [ $this, 'register_blocks' ]);
	}

	function register_blocks() {
		// Check function exists.
		if( function_exists('acf_register_block_type') ) {

			// Register a restricted block.
			acf_register_block_type( array(
				'name'            => 'restricted',
				'title'           => 'Restricted',
				'description'     => 'A restricted content block.',
				'category'        => 'formatting',
				'mode'            => 'preview',
				'supports'        => array(
					'align' => true,
					'mode'  => false,
					'jsx'   => true
				),
				'render_template' => ACFB_BLOCK_TEMPLATE_PATH . 'restricted.php',
			) );

			acf_register_block_type( array(
				'title'           => __( 'Contact Card', 'acf-block-example' ),
				'name'            => 'contact-card',
				'render_template' => ACFB_BLOCK_TEMPLATE_PATH . 'contact-card.php',
				'enqueue_style'  => ACFB_PLUGIN_DIR_URI . '/assets/editor.css',
				'mode'            => 'preview',
				'icon'           => 'id',
				'supports'        => [
					'align'           => false,
					'anchor'          => true,
					'customClassName' => true,
					'jsx'             => true,
				]
			) );
		}
	}
}

new ACF_Block_Example();
