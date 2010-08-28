<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Multiple analytics test controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_MMI_Analytics_Test_Multi extends Controller
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
		$route = Route::get('mmi/analytics/hmvc')->uri(array
		(
			'action'		=> 'index',
			'controller'	=> 'multi',
			'id'			=> 'clicky'.MMI_Analytics::SEPARATOR.'google',
		));
		MMI_Debug::dump(Request::factory($route)->execute()->response, 'mmi/analytics/hmvc/multi');
	}
} // End Controller_MMI_Analytics_Test_Multi
