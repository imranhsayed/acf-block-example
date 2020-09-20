<?php
/**
 * Restricted Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if( !empty($block['className']) ) {
	$classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
	$classes .= sprintf( ' align%s', $block['align'] );
}

// Load custom field values.
$start_date = get_field('start_date');
$end_date = get_field('end_date');

// Restrict block output (front-end only).
if( !$is_preview ) {
	$now = time();
	if( $start_date && strtotime($start_date) > $now ) {
		echo sprintf( '<p>Content restricted until %s. Please check back later.</p>', $start_date );
		return;
	}
	if( $end_date && strtotime($end_date) < $now ) {
		echo sprintf( '<p>Content expired on %s.</p>', $end_date );
		return;
	}
}

// Define notification message shown when editing.
if( $start_date && $end_date ) {
	$notification = sprintf( 'Content visible from %s until %s.', $start_date, $end_date );
} elseif( $start_date ) {
	$notification = sprintf( 'Content visible from %s.', $start_date );
} elseif( $end_date ) {
	$notification = sprintf( 'Content visible until %s.', $end_date );
} else {
	$notification = 'Content unrestricted.';
}
?>
<div class="restricted-block <?php echo esc_attr($classes); ?>">
	<span class="restricted-block-notification"><?php echo esc_html( $notification ); ?></span>
	<InnerBlocks  />
</div>
