# MMI Analytics Module

**Dependencies:**

* mmi-core

This module provides analytics functionality by rendering JavaScript using
configuration parameters.  Analytics providers that do not offer a JavaScript
implementation are not supported.

The following providers are included:

* Clicky
* Google

To render the JavaScript, echo the result from a request.
Some typical HMVC usage scenarios are:

Single analytics provider (google):

	echo Request::factory('mmi/analytics/google')->execute();

Multiple analytics providers (clicky and google):

	echo Request::factory('mmi/analytics/multi/clicky,google')->execute();

All analytics providers (that have been configured):

	echo Request::factory('mmi/analytics/all')->execute();
