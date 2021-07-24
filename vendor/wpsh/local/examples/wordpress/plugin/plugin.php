<?php
/**
 * Plugin Name: Demo Plugin Red
 * Version: 0.0.1
 */

add_action( 'wp_footer', function() {
	?>
	<style type="text/css">body { background-color: red; }</style>
	<?php
} );