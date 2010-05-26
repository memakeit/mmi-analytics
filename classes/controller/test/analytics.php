<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Analytics test controller.
 *
 * @package     MMI Analytics
 * @author      Me Make It
 * @copyright   (c) 2010 Me Make It
 * @license     http://www.memakeit.com/license
 */
class Controller_Test_Analytics extends Controller
{
	/**
	 * @var boolean turn debugging on?
	 **/
	public $debug = TRUE;

	/**
	 * Debug the Clicky analytics output.
	 *
	 * @return  void
	 */
	public function action_clicky()
	{
		MMI_Debug::dump(Request::factory('mmi/analytics/clicky')->execute()->response, 'analytics/clicky');
	}

	/**
	 * Debug the Google analytics output.
	 *
	 * @return  void
	 */
	public function action_google()
	{
		MMI_Debug::dump(Request::factory('mmi/analytics/google')->execute()->response, 'analytics/google');
	}
} // End Controller_Test_Analytics