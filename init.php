<?php defined('SYSPATH') or die('No direct script access.');

// MMI route (used for internal requests)
Route::set('mmi/analytics', 'mmi/analytics(/<action>(/<id>))')
->defaults(array
(
	'controller'	=> 'analytics',
	'directory'		=> 'mmi',
));

// Test route
if (Kohana::$environment !== Kohana::PRODUCTION)
{
	Route::set('test/analytics', 'test/analytics/<controller>(/<action>)')
	->defaults(array
	(
		'directory'		=> 'test/analytics',
	));
}
