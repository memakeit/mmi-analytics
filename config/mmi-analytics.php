<?php defined('SYSPATH') or die('No direct script access.');

// MMI analytics configuration
return array
(
	'clicky' => array
	(
		'asynchronous'	=> TRUE,	// default = TRUE
		'id'			=> 123456,
		'minify'		=> FALSE,	// default = FALSE
	),
	'google' => array
	(
		'asynchronous'	=> TRUE,	// default = TRUE
		'id'			=> 'UA-XXXXXXX-X',
		'minify'		=> FALSE,	// default = FALSE
	),
);