<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Piwik analytics HMVC controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_MMI_Analytics_HMVC_Piwik extends Controller_MMI_Analytics_HMVC
{
	/**
	 * Set the response to the Piwik analytics JavaScript.
	 *
	 * @access	public
	 * @return	void
	 */
	public function action_index()
	{
		$this->_check_request();
		$this->request->response = MMI_Analytics::factory(MMI_Analytics::PIWIK)->get_js();
	}
} // End Controller_MMI_Analytics_HMVC_Piwik
