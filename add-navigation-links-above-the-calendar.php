<?php
/**
 * Plugin Name: The Events Calendar — Add Navigation Links Above the Calendar
 * Description: Add a pair of the "Next Events" and "Previous Events" navigation Links above The Events Calendar.
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1x
 * License: GPLv2 or later
 */
 
defined( 'WPINC' ) or die;

add_action( 'wp_head', 'tribe_show_prev_next_links_on_top' );

function tribe_show_prev_next_links_on_top() {

	if ( ! tribe_is_event_query() ) {
		return;
	}
?>
	<style>
	#tribe-events-header .tribe-events-sub-nav .tribe-events-nav-next a, 
	#tribe-events-header .tribe-events-sub-nav li {
		display: block;
	}
	</style>
<?php
}
