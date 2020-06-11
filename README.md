Toolset Rest

Toolset REST is a WordPress plugin that lets you integrate Toolset components with WP REST API features.

Toolset Views

Check the custom endpoint created for the View by the URL:

http://www.yoursite.com/wp-json/toolset-views/v2/VIEW_SLUG_OR_VIEW_ID

Use the filter toolset_rest_query to modify the query arguments of the View only in the custom endpoint output:

```php
add_filter('toolset_rest_query', 'my_function_test', 99, 3);
function my_function_test($query_args, $view_settings, $view_id){
	if ($view_id == 123){
		$query_args['post_type'] = 'product';
		return $query_args;
	}
}
```

You can also pass URL parameters and they will be handled as shortcode attributes by the View:

http://www.yoursite.com/wp-json/toolset-views/v2/my_view_slug?ids=123

NEW REST ROUTES PLUGIN

I've just wanted to let you know that I've launched quite some time ago a plugin for building custom routes for WP Rest API. It is free and is in the WP repository: https://wordpress.org/plugins/rest-routes/

Also, I've developed a much more improved Pro version. You can find all the details in:
http://restroutes.com/
http://restroutes.com/pricing/

A little of what you can do with the Pro version:
https://www.youtube.com/watch?v=amfbMOr-jVE
https://www.youtube.com/watch?v=HUa-AOvh998
