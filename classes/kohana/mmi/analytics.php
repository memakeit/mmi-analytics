<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Analytics functionality.
 *
 * @package     MMI Analytics
 * @author      Me Make It
 * @copyright   (c) 2010 Me Make It
 * @license     http://www.memakeit.com/license
 */
abstract class Kohana_MMI_Analytics
{
	// Abstract methods
	abstract public function get_js();

	// Class constants
	const CLICKY = 'clicky';
	const GOOGLE = 'google';

	/**
	 * @var boolean turn debugging on?
	 **/
	protected $_debug;

	/**
	 * @var string service name
	 */
	protected $_service  = '?';

	/**
	 * @var Kohana_Config analytics settings
	 */
	protected static $_config;

	/**
	 * Configure debugging (using the Request instance).
	 *
	 * @return  void
	 */
	public function __construct()
	{
		$this->_debug = isset(Request::instance()->debug) ? Request::instance()->debug : FALSE;
	}

	/**
	 * Create an analytics instance.
	 *
	 * @param   string  type of analytics service to create
	 * @return  MMI_Analytics
	 */
	public static function factory($driver = self::GOOGLE)
	{
		$class = 'MMI_Analytics_'.ucfirst($driver);
		if ( ! class_exists($class))
		{
			MMI_Log::log_error(__METHOD__, __LINE__, $class.' class does not exist');
			throw new Kohana_Exception(':class class does not exist in :method.', array
			(
                ':class'    => $class,
                ':method'   => __METHOD__
			));
		}
		return new $class;
	}

	/**
	 * Get the configuration settings.
	 *
	 * @param   boolean return the configuration as an array?
	 * @return  mixed
	 */
	protected static function _get_config($as_array = FALSE)
	{
		(self::$_config === NULL) AND self::$_config = Kohana::config('analytics');
		$config = self::$_config;
		if ($as_array)
		{
			$config = $config->as_array();
		}
		return $config;
	}
} // End Kohana_MMI_Analytics