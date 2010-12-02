# MMI Analytics Module

This module provides analytics functionality by rendering JavaScript using
configuration parameters. Analytics providers that do not offer a JavaScript
implementation are not supported.

The following analytics providers are included:

* [Clicky](http://getclicky.com/)
* [Google](http://www.google.com/analytics/)

## Dependencies

* [mmi-util](http://github.com/memakeit/mmi-util) (only for test controllers)

## Usage

To render the JavaScript, echo the result from a request.
Some typical HMVC usage scenarios are:

Single analytics provider (google):

	echo Request::factory('mmi/analytics/google')->execute();

Multiple analytics providers (clicky and google):

	echo Request::factory('mmi/analytics/multi/clicky|google')->execute();

All analytics providers (that have been configured):

	echo Request::factory('mmi/analytics/all')->execute();

## Test Controllers

Test controllers are located in `classes/controller/mmi/analytics/test`.
