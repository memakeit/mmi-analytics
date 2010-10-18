# MMI Analytics Module

This module provides analytics functionality by rendering JavaScript using
configuration parameters. Analytics providers that do not offer a JavaScript
implementation are not supported.

The following providers are included:

* Clicky
* Google

## Dependencies

* [mmi-core](http://github.com/memakeit/mmi-core)

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
Simple test controllers are located in `classes/controller/mmi/analytics/test`.
They can be accessed at:

* _<your-server>_/mmi/analytics/test/all
* _<your-server>_/mmi/analytics/test/clicky
* _<your-server>_/mmi/analytics/test/google
* _<your-server>_/mmi/analytics/test/multi
