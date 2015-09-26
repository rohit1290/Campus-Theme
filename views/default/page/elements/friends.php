<?php
/**
 * Friends module
 *
 */

$user = elgg_get_logged_in_user_entity();
$count = $user->getFriends(array('count' => TRUE));

$num = (int) elgg_get_plugin_setting('num_friends', 'river_addon');

$options = array(
	'type' => 'user',
	'limit' => $num,
	'offset' => 0,
	'relationship' => 'friend',
	'relationship_guid' => elgg_get_logged_in_user_guid(),
	'inverse_relationship' => false,
	'full_view' => false,
	'pagination' => false,
	'list_type' => 'gallery',
	'no_results' => elgg_echo('friends:none'),
	'order_by' => 'rand()' 
);
$content = elgg_list_entities_from_relationship($options);
$content .= '<p style="text-align:right; margin:15px 3px;"><a href="'.elgg_get_site_url().'friends/'.elgg_get_logged_in_user_entity()->username.'"><b>'.elgg_echo('View All').'</b></a></p>';

$title = elgg_echo('<div style="color:grey;font-size:0.8em;border-bottom:1px solid lightgrey;">Your Friends ('.$count.')</div>');
echo elgg_view_module('feature', $title, $content, array('class' => 'elgg-module-friends'));
