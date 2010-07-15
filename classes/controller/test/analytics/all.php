<?php defined('SYSPATH') or die('No direct script access.');
/**
 * All (currently configured) analytics test controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_Test_Analytics_All extends Controller
{
	/**
	 * @var boolean turn debugging on?
	 **/
	public $debug = TRUE;

	/**
	 * Test analytics for all currently configured services.
	 *
	 * @return	void
	 */
	public function action_index()
	{
		MMI_Debug::dead(Request::factory('mmi/analytics/all')->execute()->response, 'analytics/all');
	}
} // End Controller_Test_Analytics_All
