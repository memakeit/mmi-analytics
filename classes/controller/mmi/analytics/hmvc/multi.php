<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Multiple analytics HMVC controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_MMI_Analytics_HMVC_Multi extends Controller_MMI_Analytics_HMVC_Core
{
	/**
	 * Set the response to the JavaScript for the services specified.
	 *
	 * @return	void
	 */
	public function action_index()
	{
		$this->_check_request();
		$services = explode(MMI_Analytics::SEPARATOR, $this->request->param('id', ''));
		$this->request->response = $this->_get_multi_js($services);
	}
} // End Controller_MMI_Analytics_HMVC_Multi
