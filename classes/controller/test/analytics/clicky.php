<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Clicky analytics test controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_Test_Analytics_Clicky extends Controller
{
	/**
	 * @var boolean turn debugging on?
	 **/
	public $debug = TRUE;

	/**
	 * Test Clicky analytics.
	 *
	 * @return	void
	 */
	public function action_index()
	{
		MMI_Debug::dead(Request::factory('mmi/analytics/clicky')->execute()->response, 'analytics/clicky');
	}
} // End Controller_Test_Analytics_Clicky
