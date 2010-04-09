<?php defined('SYSPATH') or die('No direct script access.');

class Controller_MMI_Analytics extends Controller
{
    public function action_clicky()
    {
        // Only accept internal requests
        if ( ! $this->request->internal)
        {
            // Not an internal request
            throw new Kohana_Request_Exception('Invalid external request.');
        }
        $this->request->response = MMI_Analytics::factory(MMI_Analytics::CLICKY)->get_js();
    }

    public function action_google()
    {
        // Only accept internal requests
        if ( ! $this->request->internal)
        {
            // Not an internal request
            throw new Kohana_Request_Exception('Invalid external request.');
        }
        $this->request->response = MMI_Analytics::factory(MMI_Analytics::GOOGLE)->get_js();
    }

    public function action_piwik()
    {
        // Only accept internal requests
        if ( ! $this->request->internal)
        {
            // Not an internal request
            throw new Kohana_Request_Exception('Invalid external request.');
        }
        $this->request->response = MMI_Analytics::factory(MMI_Analytics::PIWIK)->get_js();
    }
} // End Controller_Analytics
