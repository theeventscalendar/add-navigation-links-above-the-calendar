<?php
/**
 * Plugin Name: The Events Calendar Extension: Add Navigation Links Above the Calendar
 * Description: Add a pair of the "Next Events" and "Previous Events" navigation Links above The Events Calendar.
 * Version: 1.0.0
 * Author: Modern Tribe, Inc.
 * Author URI: http://m.tri.be/1971
 * License: GPLv2 or later
 */
 
defined( 'WPINC' ) or die;

class Tribe__Extension__Add_Navigation_Links_Above_the_Calendar {

	/**
	 * The semantic version number of this extension; should always match the plugin header.
	 */
	const VERSION = '1.0.0';

	/**
	 * Each plugin required by this extension
	 *
	 * @var array Plugins are listed in 'main class' => 'minimum version #' format
	 */
	public $plugins_required = array(
	    'Tribe__Events__Main' => '4.2'
	);

	/**
	 * The constructor; delays initializing the extension until all other plugins are loaded.
	 */
	public function __construct() {
	    add_action( 'plugins_loaded', array( $this, 'init' ), 100 );
	}

	/**
	 * Extension hooks and initialization; exits if the extension is not authorized by Tribe Common to run.
	 */
	public function init() {

		// Exit early if our framework is saying this extension should not run.
		if ( ! function_exists( 'tribe_register_plugin' ) || ! tribe_register_plugin( __FILE__, __CLASS__, self::VERSION, $this->plugins_required ) ) {
			return;
		}

		add_action( 'wp_head', array( $this, 'tribe_add_navigation_links_above_the_calendar' ) );
   	}

	/**
	 * Add CSS to the header.
	 */
	public function tribe_add_navigation_links_above_the_calendar() {

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
}

new Tribe__Extension__Add_Navigation_Links_Above_the_Calendar();
