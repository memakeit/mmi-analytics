<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Multiple analytics test controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_Test_Analytics_Multi extends Controller
{
	/**
	 * @var boolean turn debugging on?
	 **/
	public $debug = TRUE;

	/**
	 * Test analytics for the services specified.
	 *
	 * @return	void
	 */
	public function action_index()
	{
		MMI_Debug::dead(Request::factory('mmi/analytics/multi/clicky'.MMI_Analytics::SEPARATOR.'google')->execute()->response, 'analytics/multi');
	}
} // End Controller_Test_Analytics_Multi
