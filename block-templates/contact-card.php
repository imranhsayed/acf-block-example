<?php

$template = [
	[
		'core/heading',
		[
			'level'     => 6,
			'content'   => '<strong>Title</strong>',
			'align'     => 'center',
			'className' => 'card-heading'
		]
	],
	[ 'core/paragraph', [ 'content' => 'Description', 'align' => 'center' ] ],
	[ 'core/button', [ 'content' => 'Get in touch', 'align' => 'center' ] ],
	[ 'core/social-links', [ 'align' => 'center' ] ],
];

$allowed_blocks = [ 'core/heading', 'core/paragraph', 'core/button', 'core/social-links' ];

$classes = [ 'block-contact-card' ];

// Create class attribute allowing for custom "className" values.
$classes = ( ! empty( $block['className'] ) ) ?
	sprintf( 'contact-card %s', $block['className'] ) :
	'contact-card';

$id = 'contact-card-' . $block['id'];

?>
<div id=<?php echo esc_attr( $id ) ?> class="<?php echo esc_attr( $classes ); ?>">
	<div class="photo">
		<?php echo wp_kses_post( wp_get_attachment_image( get_field( 'photo' ) ) ); ?>
	</div>
	<div class="banner">
		<?php echo wp_kses_post( wp_get_attachment_image( get_field( 'banner' ) ) ); ?>
	</div>
	<InnerBlocks
		template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>"
		allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"
		templateLock="all"
	/>
</div>
