<?php
$template = array(
	array('core/heading', array(
		'level' => 2,
		'content' => '<strong>Title Goes Here</strong>',
	)),
	array( 'core/paragraph', array(
		'content' => 'Paragraph goes here',
	) )
);

$allowed_blocks = ['core/heading', 'core/paragraph', 'core/image'];

$classes = ['block-about'];
// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if( !empty($block['className']) ) {
	$classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
	$classes .= sprintf( ' align%s', $block['align'] );
}
?>
<div class="about-block <?php echo esc_attr($classes); ?>">
	<InnerBlocks
		template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>"
		allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"
	/>
	<div class="block-about__image">
		<?php echo wp_get_attachment_image( get_field( 'image' ), 'be_thumbnail_l' ); ?>
	</div>
</div>

