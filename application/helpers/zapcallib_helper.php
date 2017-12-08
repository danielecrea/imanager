<?php

if (!class_exists('ZCiCalDataNode')) {
	/**
	 * The main Twilio.php file contains an autoload method for its dependent
	 * classes, we only need to include the one file manually.
	 */
	include_once(APPPATH.'libraries/zapcallib.php');
}

/**
 * Return a twilio services object.
 *
 * Since we don't want to create multiple connection objects we
 * will return the same object during a single page load
 *
 * @return object Services_Twilio
 */
function get_twilio_service() {
	static $twilio_service;

	if (!($twilio_service instanceof ZCiCalDataNode)) {
		/**
		 * This assumes that you've defined your SID & TOKEN as constants
		 * Replace with a way to get your SID & TOKEN if different
		 */
		$twilio_service = new ZCiCalDataNode();
	}

	return $twilio_service;
}

?>
