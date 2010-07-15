<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Google analytics test controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_Test_Analytics_Google extends Controller
{
	/**
	 * @var boolean turn debugging on?
	 **/
	public $debug = TRUE;

	/**
	 * Test Google analytics.
	 *
	 * @return	void
	 */
	public function action_index()
	{
		MMI_Debug::dead(Request::factory('mmi/analytics/google')->execute()->response, 'analytics/google');
	}
} // End Controller_Test_Analytics_Google
