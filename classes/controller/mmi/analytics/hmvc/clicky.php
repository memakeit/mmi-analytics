<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Clicky analytics HMVC controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_MMI_Analytics_HMVC_Clicky extends Controller_MMI_Analytics_HMVC_Core
{
	/**
	 * Set the response to the Clicky analytics JavaScript.
	 *
	 * @return	void
	 */
	public function action_index()
	{
		$this->_check_request();
		$this->request->response = MMI_Analytics::factory(MMI_Analytics::CLICKY)->get_js();
	}
} // End Controller_MMI_Analytics_HMVC_Clicky
