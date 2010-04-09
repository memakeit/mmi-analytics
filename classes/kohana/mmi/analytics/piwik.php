<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Piwik analytics functionality.
 *
 * @package     MMI Analytics
 * @author      Me Make It
 * @copyright   (c) 2010 Me Make It
 * @license     http://www.memakeit.com/license
 */
class Kohana_MMI_Analytics_Piwik extends Kohana_MMI_Analytics
{
    /**
     * @var string service name
     */
    protected $_service = self::PIWIK;

    /**
     * Get analytics javascript.
     *
     * @return  string
     */
    public function get_js()
    {
        $config = Arr::get(self::_get_config(TRUE), $this->_service, array());
        $id = Arr::get($config, 'id', '');
        $url = Arr::get($config, 'url', '');
return <<<EOJS
<script type="text/javascript">
//<![CDATA[
    var pkBaseURL = ('https:' == document.location.protocol) ? 'https://$url' : 'http://$url';
    document.write(unescape('%3Cscript src="' + pkBaseURL + 'piwik.js" type="text/javascript"%3E%3C/script%3E'));
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
    try
    {
        var piwikTracker = Piwik.getTracker(pkBaseURL + 'piwik.php', $id);
        piwikTracker.trackPageView();
        piwikTracker.enableLinkTracking();
    }
    catch (err) {}
//]]>
</script>
EOJS;
    }
} // End Kohana_MMI_Analytics_Piwik