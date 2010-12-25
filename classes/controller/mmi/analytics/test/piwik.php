<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Piwik analytics test controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_MMI_Analytics_Test_Piwik extends Controller
{
	/**
	 * @var boolean turn debugging on?
	 **/
	public $debug = TRUE;

	/**
	 * Test Piwik analytics.
	 *
	 * @access	public
	 * @return	void
	 */
	public function action_index()
	{
		$route = Route::get('mmi/analytics/hmvc')->uri(array('controller' => 'piwik'));
		MMI_Debug::dump(Request::factory($route)->execute()->response, 'mmi/analytics/hmvc/piwik');
	}
} // End Controller_MMI_Analytics_Test_Piwik
