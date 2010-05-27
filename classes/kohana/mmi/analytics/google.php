<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Google analytics.
 *
 * @package     MMI Analytics
 * @author      Me Make It
 * @copyright   (c) 2010 Me Make It
 * @license     http://www.memakeit.com/license
 */
class Kohana_MMI_Analytics_Google extends Kohana_MMI_Analytics
{
    /**
     * @var string service name
     */
    protected $_service = self::GOOGLE;

    /**
     * Get analytics JavaScript.
     *
     * @return  string
     */
    public function get_js()
    {
        $config = Arr::get(self::_get_config(TRUE), $this->_service, array());
        $asynchronous = Arr::get($config, 'asynchronous', TRUE);
        $id = Arr::get($config, 'id', 'UA-XXXXX-X');
        if ($asynchronous)
        {
            return $this->_get_asynchronous_js($id);
        }
        else
        {
            return $this->_get_js($id);
        }
    }

    /**
     * Get synchronous JavaScript.
     *
     * @param   string  tracking id
     * @return  string
     */
    protected function _get_js($id)
    {
        return <<<EOJS
<script type="text/javascript">
//<![CDATA[
    var gaJsHost = (('https:' === document.location.protocol) ? 'https://ssl.' : 'http://www.');
    document.write(unescape('%3Cscript src="' + gaJsHost + 'google-analytics.com/ga.js" type="text/javascript"%3E%3C/script%3E'));
    try
    {
        var pageTracker = _gat._getTracker('$id');
        pageTracker._trackPageview();
    }
    catch (err) {}
//]]>
</script>
EOJS;
    }

    /**
     * Get asynchronous JavaScript.
     *
     * @param   string  tracking id
     * @return  string
     */
    protected function _get_asynchronous_js($id)
    {
        return <<<EOJS
<script type="text/javascript">
//<![CDATA[
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '$id']);
    _gaq.push(['_trackPageview']);
    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
    })();
//]]>
</script>
EOJS;
    }
} // End Kohana_MMI_Analytics_Google