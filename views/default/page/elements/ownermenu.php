<?php
/**
 * Menu module
 *
 */

$user = elgg_get_logged_in_user_entity();

if (!$user) {
	return TRUE;
}
$user = elgg_get_page_owner_entity();
$icon = elgg_view_entity_icon($user, 'small', array(
'use_hover' => false,
'use_link' => false,
));

$profilimg = elgg_view_entity_icon("profile/icon", array('entity' => $vars['entity'],'size' => $iconsize,'use_hover' => true, 'list_class' => 'img-circle'));
$title = "<div style='width:200px;padding-bottom: 40px;margin-bottom:10px;'><div style='float:left;width:45px'>$icon</div><div style='float:left;width:145px;margin-left:5px;'>$user->name<br><font style='font-size:0.7em;'><a href='/profile'>Edit Profile</a></font></div></div>";

//elgg_echo('river_addon:welcome', array($user->name));

$body = elgg_view_menu('owner_block', array(
	'entity' => $user,
));

echo elgg_view('page/components/module', array(
	'title' => $title,
	'body' => $body,
	'class' => 'elgg-module-feature',
));