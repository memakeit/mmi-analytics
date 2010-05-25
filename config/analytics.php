<?php defined('SYSPATH') or die('No direct script access.');

// Analytics configuration
return array
(
    'clicky' => array
    (
        'asynchronous'  => TRUE,    // default = TRUE
        'id'            => 123456,
    ),
    'google' => array
    (
        'asynchronous'  => TRUE,    // default = TRUE
        'id'            => 'UA-XXXXXXX-X',
    ),
);