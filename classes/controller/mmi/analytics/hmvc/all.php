<?php defined('SYSPATH') or die('No direct script access.');
/**
 * All analytics HMVC controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_MMI_Analytics_HMVC_All extends Controller_MMI_Analytics_HMVC_Core
{
	/**
	 * Set the response to the JavaScript for all currently configured services.
	 *
	 * @return	void
	 */
	public function action_index()
	{
		$this->_check_request();
		$config = MMI_Analytics::get_config(TRUE);
		$this->request->response = $this->_get_multi_js(array_keys($config));
	}
} // End Controller_MMI_Analytics_HMVC_All
