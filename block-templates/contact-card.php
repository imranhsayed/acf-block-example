<?php
$template = [
	['core/heading', [
		'level' => 6,
		'content' => '<strong>Title</strong>',
		'align' => 'center',
		'className' => 'card-heading'
	]],
	[  'core/paragraph', [ 'content' => 'Description', 'align' => 'center' ] ],
	[  'core/button', [ 'content' => 'Get in touch', 'align' => 'center' ] ],
	[ 'core/social-links', [ 'align' => 'center' ] ],
];

$allowed_blocks = ['core/heading', 'core/paragraph', 'core/social-links', 'core/button'];

$classes = ['block-about'];
// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if( !empty($block['className']) ) {
	$classes .= sprintf( ' %s', $block['className'] );
}
?>
<div class="contact-card <?php echo esc_attr($classes); ?>">
	<div class="photo"><?php echo wp_get_attachment_image( get_field( 'photo' ), 'be_thumbnail_l' ); ?></div>
	<div class="banner"><?php echo wp_get_attachment_image( get_field( 'banner' ), 'be_thumbnail_l' ); ?></div>
	<InnerBlocks
		template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>"
		allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"
		templateLock="all"
	/>
</div>
