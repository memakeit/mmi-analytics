<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Clicky analytics.
 *
 * @package     MMI Analytics
 * @author      Me Make It
 * @copyright   (c) 2010 Me Make It
 * @license     http://www.memakeit.com/license
 */
class Kohana_MMI_Analytics_Clicky extends Kohana_MMI_Analytics
{
    /**
     * @var string service name
     */
    protected $_service = self::CLICKY;

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
    var jsHost = (('https:' === document.location.protocol) ? 'https://' : 'http://');
    document.write(unescape('%3Cscript src="' + jsHost + 'static.getclicky.com/js" type="text/javascript"%3E%3C/script%3E'));
    clicky.init($id);
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
    var clicky = { log: function(){ return; }, goal: function(){ return; } };
    var clicky_site_id = $id;
    (function() {
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = (document.location.protocol === 'https:' ? 'https://static.getclicky.com' : 'http://static.getclicky.com') + '/js';
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(s);
    })();
//]]>
</script>
EOJS;
    }
} // End Kohana_MMI_Analytics_Clicky