<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Analytics HMVC controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class Controller_MMI_Analytics extends Controller
{
	/**
	 * Set the response to the JavaScript for all currently configured services.
	 *
	 * @return	void
	 */
	public function action_all()
	{
		$this->_check_request();
		$config = MMI_Analytics::get_config(TRUE);
		$this->request->response = $this->_get_multi_js(array_keys($config));
	}

	/**
	 * Set the response to the JavaScript for the services specified.
	 *
	 * @return	void
	 */
	public function action_multi()
	{
		$this->_check_request();
		$services = explode(',', $this->request->param('id', ''));
		$this->request->response = $this->_get_multi_js($services);
	}

	/**
	 * Set the response to the Clicky analytics JavaScript.
	 *
	 * @return	void
	 */
	public function action_clicky()
	{
		$this->_check_request();
		$this->request->response = MMI_Analytics::factory(MMI_Analytics::CLICKY)->get_js();
	}

	/**
	 * Set the response to the Google analytics JavaScript.
	 *
	 * @return	void
	 */
	public function action_google()
	{
		$this->_check_request();
		$this->request->response = MMI_Analytics::factory(MMI_Analytics::GOOGLE)->get_js();
	}

	/**
	 * Ensure the request is an internal request.
	 *
	 * @return	void
	 */
	protected function _check_request()
	{
		// Only accept internal requests
		if ( ! $this->request->internal)
		{
			throw new Kohana_Request_Exception('Invalid external request.');
		}
	}

	/**
	 * Generate the analytics JavaScript for multiple services.
	 *
	 * @param	array	the analytics services
	 * @return	string
	 */
	protected function _get_multi_js($services)
	{
		if ( ! is_array($services))
		{
			$services = array();
		}

		$js = '';
		foreach ($services as $service)
		{
			$js .= MMI_Analytics::factory($service)->get_js().PHP_EOL;
		}
		return $js;
	}
} // End Controller_MMI_Analytics
