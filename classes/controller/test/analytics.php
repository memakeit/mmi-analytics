<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Test_Analytics extends Controller
{
    public $debug = TRUE;

    public function action_clicky()
    {
        MMI_Debug::dump(Request::factory('analytics/clicky')->execute()->response, 'analytics/clicky');
    }

    public function action_google()
    {
        MMI_Debug::dump(Request::factory('analytics/google')->execute()->response, 'analytics/google');
    }

    public function action_piwik()
    {
        MMI_Debug::dump(Request::factory('analytics/piwik')->execute()->response, 'analytics/piwik');
    }
} // End Test Analytics
