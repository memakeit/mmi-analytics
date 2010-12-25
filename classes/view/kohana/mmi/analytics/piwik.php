<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Piwik analytics view.
 *
 * @package		MMI Analytics
 * @category	view
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 */
class View_Kohana_MMI_Analytics_Piwik extends View_MMI_Analytics
{
	/**
	 * @var string the service name
	 */
	protected $_service = MMI_Analytics::PIWIK;

	/**
	 * Initialize the view parameters.
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function _init()
	{
		parent::_init();
		if ( ! empty($this->_config))
		{
			$this->_url = Arr::get($this->_config, 'url');
		}
	}
} // End View_Kohana_MMI_Analytics_Piwik
