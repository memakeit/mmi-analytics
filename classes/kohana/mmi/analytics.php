<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Analytics functionality.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
abstract class Kohana_MMI_Analytics
{
	// Class constants
	const CLICKY = 'clicky';
	const GOOGLE = 'google';
	const PIWIK = 'piwik';

	// Other constants
	const SEPARATOR = '~';

	/**
	 * @var Kohana_Config the analytics settings
	 */
	protected static $_config;

	/**
	 * @var boolean turn debugging on?
	 **/
	protected $_debug;

	/**
	 * @var string the service name
	 */
	protected $_service = '?';

	/**
	 * Initialize debugging (using the Request instance).
	 *
	 * @access	public
	 * @return	void
	 * @uses	MMI_Request::debug
	 */
	public function __construct()
	{
		$this->_debug = class_exists('MMI_Request') ? MMI_Request::debug() : FALSE;
	}

	/**
	 * Get or set whether debugging is enabled.
	 * This method is chainable when setting a value.
	 *
	 * @access	public
	 * @param	boolean	the value to set
	 * @return	mixed
	 */
	public function debug($value = NULL)
	{
		if (func_num_args() === 0)
		{
			return $this->_debug;
		}
		return $this->_set('_debug', $value, 'is_bool');
	}

	/**
	 * Get analytics JavaScript.
	 *
	 * @access	public
	 * @return	string
	 */
	public function get_js()
	{
		$config = self::get_config();
		$include_script_tag = $config->get('include_script_tag', TRUE);
		$config = $config->get('services', array());
		$service = $this->_service;
		$config = Arr::get($config, $service, array());
		$minify = Arr::get($config, 'minify', FALSE);
		$js = Kostache::factory("mmi/analytics/{$service}")->render();
		if ($minify)
		{
			$js = $this->_minify($js);
		}
		$js = "/* {$service} analytics */".PHP_EOL.$js;
		if ($include_script_tag)
		{
			$js = <<<EOJS
<script type="text/javascript">
{$js}
</script>
EOJS;
		}
		return $js;
	}

	/**
	 * Minify the JavaScript.
	 *
	 * @access	protected
	 * @param	string	the JavaScript
	 * @return	string
	 */
	protected function _minify($js)
	{
		if ($file = Kohana::find_file('vendor', 'jsmin/required'))
		{
			require_once $file;
			$js = trim(JSMin::minify($js));
		}
		return $js;
	}

	/**
	 * Set a class property.
	 * This method is chainable.
	 *
	 * @access	protected
	 * @param	string	the name of the class property to set
	 * @param	mixed	the value to set
	 * @param	string	the name of the data verification method
	 * @return	MMI_Analytics
	 */
	protected function _set($name, $value = NULL, $verify_method = NULL)
	{
		if (empty($verify_method))
		{
			$this->$name = $value;
		}
		elseif ($verify_method($value))
		{
			$this->$name = $value;
		}
		return $this;
	}

	/**
	 * Create an analytics instance.
	 *
	 * @access	public
	 * @param	string	the analytics service name
	 * @return	MMI_Analytics
	 */
	public static function factory($driver = self::GOOGLE)
	{
		$class = 'MMI_Analytics_'.ucfirst($driver);
		if ( ! class_exists($class))
		{
			if (class_exists('MMI_Log'))
			{
				MMI_Log::log_error(__METHOD__, __LINE__, $class.' class does not exist');
			}
			throw new Kohana_Exception(':class class does not exist in :method.', array
			(
				':class'	=> $class,
				':method'	=> __METHOD__
			));
		}
		return new $class;
	}

	/**
	 * Get the configuration settings.
	 *
	 * @access	public
	 * @param	boolean	return the configuration as an array?
	 * @return	mixed
	 */
	public static function get_config($as_array = FALSE)
	{
		(self::$_config === NULL) AND self::$_config = Kohana::config('mmi-analytics');
		if ($as_array)
		{
			return self::$_config->as_array();
		}
		return self::$_config;
	}
} // End Kohana_MMI_Analytics
