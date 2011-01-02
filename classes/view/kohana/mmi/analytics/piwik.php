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
			$this->_url = Arr::get($config, 'url');
		}
		return parent::render($template, $view, $partials);
	}
} // End View_Kohana_MMI_Analytics_Piwik
