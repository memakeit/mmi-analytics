<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Analytics HMVC controller.
 *
 * @package     MMI Analytics
 * @author      Me Make It
 * @copyright   (c) 2010 Me Make It
 * @license     http://www.memakeit.com/license
 */
class Controller_MMI_Analytics extends Controller
{
    /**
     * Set response to the Clicky analytics JavaScript.
     *
     * @return  void
     */
    public function action_clicky()
    {
        $this->_check_request();
        $this->request->response = MMI_Analytics::factory(MMI_Analytics::CLICKY)->get_js();
    }

    /**
     * Set response to the Google analytics JavaScript.
     *
     * @return  void
     */
    public function action_google()
    {
        $this->_check_request();
        $this->request->response = MMI_Analytics::factory(MMI_Analytics::GOOGLE)->get_js();
    }

    /**
     * Ensure the request is an internal request.
     *
     * @return  void
     */
    protected function _check_request()
    {
        // Only accept internal requests
        if ( ! $this->request->internal)
        {
            throw new Kohana_Request_Exception('Invalid external request.');
        }
    }
} // End Controller_MMI_Analytics