<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Core analytics view.
 *
 * @package		MMI Analytics
 * @category	view
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
abstract class View_Kohana_MMI_Analytics extends Kostache
{
	/**
	 * @var integer the analytics id
	 */
	protected $_id;

	/**
	 * @var string the service name
	 */
	protected $_service;

	/**
	 * @var boolean use the asynchronous JavaScript?
	 */
	protected $_use_async;

	/**
	 * Initialize the view parameters.
	 * Render the view.
	 *
	 * @access	public
	 * @param	string 	template
	 * @param	mixed 	view
	 * @param	array	partials
	 * @return	void
	 */
	public function render($template = null, $view = null, $partials = null)
	{
		$config = MMI_Analytics::get_config()->get('services', array());
		$config = Arr::get($config, $this->_service);
		if ( ! empty($config))
		{
			$this->_id = Arr::get($config, 'id');
			$this->_use_async = Arr::get($config, 'asynchronous', TRUE);
		}
		return parent::render($template, $view, $partials);
	}
} // End View_Kohana_MMI_Analytics
