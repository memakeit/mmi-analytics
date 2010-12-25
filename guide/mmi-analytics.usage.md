# Usage

To render the analytics JavaScript, echo the result from a request.
Typical HMVC usage scenarios include:

Single analytics provider (Google):

	$route = Route::get('mmi/analytics/hmvc')->uri(array('controller' => 'google'));
	echo Request::factory($route)->execute();

Multiple analytics providers (Clicky and Google):

	$providers = array(MMI_Analytics::CLICKY, MMI_Analytics::GOOGLE);
	$route = Route::get('mmi/analytics/hmvc')->uri(array
	(
		'action'		=> 'index',
		'controller'	=> 'multi',
		'id'			=> implode(MMI_Analytics::SEPARATOR, $providers)
	));
	echo Request::factory($route)->execute();

All analytics providers (in the configuration file):

	$route = Route::get('mmi/analytics/hmvc')->uri(array('controller' => 'all'));
	echo Request::factory($route)->execute();

## Configuration

The analytics configuration file is named `mmi-analytics.php`.

Typical configuration parameters for an analytics provider are:

* `asynchronous` use the asynchronous JavaScript? Defaults to true.
* `id` the id used by the analytics provider
* `minify` minify the JavaScript? Defaults to false.

An additional global configuration parameter that applies to all analytics providers is:

* `include_script_tag` wrap the JavaScript in `<script>` tags? Defaults to true.
