<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Core analytics HMVC controller.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
abstract class Controller_MMI_Analytics_HMVC extends Controller
{
	/**
	 * Ensure the request is an internal request.
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function _check_request()
	{
		// Only accept internal requests
		if (Request::instance() === Request::current())
		{
			throw new Kohana_Request_Exception('Invalid external request.');
		}
	}

	/**
	 * Generate the analytics JavaScript for multiple services.
	 *
	 * @access	protected
	 * @param	array	the analytics services
	 * @return	string
	 */
	protected function _get_multi_js($services)
	{
		if ( ! is_array($services))
		{
			return '';
		}

		$js = '';
		foreach ($services as $service)
		{
			$js .= MMI_Analytics::factory($service)->get_js().PHP_EOL;
		}
		return $js;
	}
} // End Controller_MMI_Analytics_HMVC
