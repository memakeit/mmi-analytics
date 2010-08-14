<?php defined('SYSPATH') or die('No direct script access.');

// HMVC routes
Route::set('mmi/analytics/hmvc', 'mmi/analytics/hmvc/<controller>(/<action>(/<id>))')
->defaults(array
(
	'directory' => 'mmi/analytics/hmvc',
));

// Test routes
if (Kohana::$environment !== Kohana::PRODUCTION)
{
	Route::set('mmi/analytics/test', 'mmi/analytics/test/<controller>(/<action>)')
	->defaults(array
	(
		'directory' => 'mmi/analytics/test',
	));
}
