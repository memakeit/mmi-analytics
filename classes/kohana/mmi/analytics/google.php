<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Google analytics.
 *
 * @package		MMI Analytics
 * @author		Me Make It
 * @copyright	(c) 2010 Me Make It
 * @license		http://www.memakeit.com/license
 * @link		http://www.google.com/analytics/
 * @link		http://mathiasbynens.be/notes/async-analytics-snippet
 */
class Kohana_MMI_Analytics_Google extends MMI_Analytics
{
	/**
	 * @var string the service name
	 */
	protected $_service = self::GOOGLE;
} // End Kohana_MMI_Analytics_Google
