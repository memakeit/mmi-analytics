<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Clicky analytics test controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_MMI_Analytics_Test_Clicky extends Controller_MMI_Analytics_Test
{
	/**
	 * Test Clicky analytics.
	 *
	 * @access	public
	 * @return	void
	 */
	public function action_index()
	{
		$route = Route::get('mmi/analytics/hmvc')->uri(array('controller' => 'clicky'));
		MMI_Debug::dump(Request::factory($route)->execute()->response, 'mmi/analytics/hmvc/clicky');
	}
} // End Controller_MMI_Analytics_Test_Clicky
