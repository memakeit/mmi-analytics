<?php defined('SYSPATH') or die('No direct script access.');
/**
 * All (currently configured) analytics test controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_MMI_Analytics_Test_All extends Controller
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
		$route = Route::get('mmi/analytics/hmvc')->uri(array('controller' => 'all'));
		MMI_Debug::dump(Request::factory($route)->execute()->response, 'mmi/analytics/hmvc/all');
	}
} // End Controller_MMI_Analytics_Test_All
