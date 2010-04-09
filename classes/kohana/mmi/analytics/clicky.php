<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Clicky analytics functionality.
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
     * Get analytics javascript.
     *
     * @return  string
     */
    public function get_js()
    {
        $config = Arr::get(self::_get_config(TRUE), $this->_service, array());
        $id = Arr::get($config, 'id', '');
return <<<EOJS
<script type="text/javascript">
//<![CDATA[
    var jsHost = (('https:' == document.location.protocol) ? 'https://' : 'http://');
    document.write(unescape('%3Cscript src="' + jsHost + 'static.getclicky.com/js" type="text/javascript"%3E%3C/script%3E'));
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
    clicky.init($id);
//]]>
</script>
EOJS;
    }
} // End Kohana_MMI_Analytics_Clicky