<?php
/**
 * Group membership module
 *
 */

elgg_push_context('widgets');

$user = elgg_get_logged_in_user_entity();
$user_guid = $user->getGUID();

$title = elgg_echo('<div style="color:grey;font-size:0.8em;border-bottom:1px solid lightgrey;">Group Membership</div>');

$group_count = elgg_get_plugin_user_setting('group_count', $user_guid, 'river_addon');

$options = array(
	'type' => 'group',
	'limit' => $group_count,
	'offset' => 0,
	'relationship' => 'member',
	'relationship_guid' => elgg_get_logged_in_user_guid(),
	'full_view' => FALSE,
	'pagination' => FALSE
);
$mygroups = elgg_list_entities_from_relationship($options);

elgg_pop_context();

if ($mygroups) {
$mygroups .= '<p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'groups/member/'.elgg_get_logged_in_user_entity()->username.'"><b>'.elgg_echo('View All').'</b></a></p>';
	echo elgg_view_module('feature', $title, $mygroups, array('class' => 'elgg-module-my-groups'));
} else {
	$mygroups = elgg_echo ('river_addon:groups:none') .'<br><br><p style="text-align:right; margin:3px 3px;"><a href="'.elgg_get_site_url().'join"><b>'.elgg_echo('Join a Group').'</b></a></p>';
	echo elgg_view_module('feature', $title, $mygroups, array('class' => 'elgg-module-my-groups'));
}