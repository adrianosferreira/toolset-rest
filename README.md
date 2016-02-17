#Toolset Rest

Toolset REST lets you integrate Toolset components with WP REST API features.

##Toolset Views

Check the custom endpoint created for the View by the URL:

http://www.yoursite.com/wp-json/toolset-views/v2/VIEW_SLUG_OR_VIEW_ID

Use the filter toolset_rest_query to modify the query arguments of the View only in the custom endpoint output;

```php
add_filter('toolset_rest_query', 'my_function_test', 99, 3);
function my_function_test($query_args, $view_settings, $view_id){
	if ($view_id == 123){
		$query_args['post_type'] = 'product';
		return $query_args;
	}
}
```