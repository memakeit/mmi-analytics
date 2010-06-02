MMI Analytics Module
===========================

This module provides analytics functionality by rendering the necessary JavaScript based on configuration parameters.  Analytics providers that do not offer a JavaScript implementation are not supported.  
The following providers are included:

 * Clicky
 * Google

To render the JavaScript, echo the result from a request to the analytics provider.  
> echo Request::factory('mmi/analytics/google')->execute();