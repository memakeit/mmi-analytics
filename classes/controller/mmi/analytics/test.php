<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Base analytics test controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
abstract class Controller_MMI_Analytics_Test extends Controller
{
	/**
	 * @var string the cache type
	 **/
	public $cache_type = NULL;

	/**
	 * @var boolean turn debugging on?
	 **/
	public $debug = TRUE;

	/**
	 * Test analytics for all currently configured services.
	 *
	 * @access	public
	 * @return	void
	 */
	public function action_index()
	{
		$route = Route::get('mmi/analytics/hmvc')->uri(array('controller' => 'all'));
		MMI_Debug::dump(Request::factory($route)->execute()->response, 'mmi/analytics/hmvc/all');
	}
} // End Controller_MMI_Analytics_Test
