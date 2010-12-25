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
	 * @var array the analytics settings
	 */
	protected $_config;

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
	 * Create and initialize the view.
	 *
	 * @access	public
	 * @param	string 	template
	 * @param	mixed 	view
	 * @param	array	partials
	 * @return	void
	 */
	public function __construct($template = null, $view = null, $partials = null)
	{
		parent::__construct($template, $view, $partials);
		$this->_init();
	}

	/**
	 * Initialize the view parameters.
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function _init()
	{
		$config = MMI_Analytics::get_config()->get('services', array());
		$config = Arr::get($config, $this->_service);
		if ( ! empty($config))
		{
			$this->_config = $config;
			$this->_id = Arr::get($config, 'id');
			$this->_use_async = Arr::get($config, 'asynchronous', TRUE);
		}
	}
} // End View_Kohana_MMI_Analytics
