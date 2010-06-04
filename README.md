MMI Analytics Module
===========================

This module provides analytics functionality by rendering the necessary JavaScript based on configuration parameters.  Analytics providers that do not offer a JavaScript implementation are not supported.  
The following providers are included:

 * Clicky
 * Google

To render the JavaScript, echo the result from a request to the analytics provider. 
Some typical usage scenarios are:

1 analytics provider (in this example google): 
> echo Request::factory('mmi/analytics/google')->execute();

Multiple analytics provider (in this example clicky and google): 
> echo Request::factory('mmi/analytics/multi/clicky,google')->execute();

Default to using all the analytics providers that have been configured: 
> echo Request::factory('mmi/analytics/all')->execute();