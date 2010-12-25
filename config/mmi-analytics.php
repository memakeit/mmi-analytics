<?php defined('SYSPATH') or die('No direct script access.');

// MMI analytics configuration
return array
(
	'include_script_tag' => TRUE,
	'services' => array
	(
		MMI_Analytics::CLICKY => array
		(
			'asynchronous'	=> TRUE,	// default = TRUE
			'id'			=> 123456,
			'minify'		=> FALSE,	// default = FALSE
		),
		MMI_Analytics::GOOGLE => array
		(
			'asynchronous'	=> TRUE,
			'id'			=> 'UA-XXXXXXX-X',
			'minify'		=> FALSE,
		),
		MMI_Analytics::PIWIK => array
		(
			'asynchronous'	=> TRUE,
			'id'			=> 123456,
			'minify'		=> FALSE,
			'url'			=> 'localhost/analytics/piwik',
		),
	),
);
