<?php
elgg_register_event_handler('init', 'system', 'bright_theme_init');

function bright_theme_init() {
  elgg_unregister_menu_item('topbar', 'elgg_logo');

  elgg_unregister_menu_item('site', 'members');
  elgg_unregister_menu_item('site', 'thewire');
  elgg_unregister_menu_item('site', 'groups');
  elgg_unregister_menu_item('site', 'file');
  elgg_unregister_menu_item('site', 'bookmarks');
  elgg_unregister_menu_item('site', 'blog');
  elgg_unregister_menu_item('site', 'photos');
  
  elgg_register_page_handler('activity', 'river_addon_river_page_handler');
  
  $user = elgg_get_logged_in_user_entity();
  // Set up the menu
  if($user){
  $item = new ElggMenuItem('groups', elgg_echo('groups'), "groups/member/$user->username");
  elgg_register_menu_item('site', $item);
  $item = new ElggMenuItem('file', elgg_echo('file'), "file/friends/$user->username");
  elgg_register_menu_item('site', $item);
  //elgg_register_menu_item('site', array('name' => 'bookmarks','text' => elgg_echo('bookmarks'),'href' =>"bookmarks/friends/$user->username"));
  $item = new ElggMenuItem('blog', elgg_echo('blog:blogs'), "blog/friends/$user->username");
  elgg_register_menu_item('site', $item);
  } else {
  $item = new ElggMenuItem('groups', elgg_echo('groups'), "groups/all");
  elgg_register_menu_item('site', $item);
  $item = new ElggMenuItem('file', elgg_echo('file'), "file/all");
  elgg_register_menu_item('site', $item);
  elgg_register_menu_item('site', array('name' => 'bookmarks','text' => elgg_echo('bookmarks'),'href' =>"bookmarks/all"));
  $item = new ElggMenuItem('blog', elgg_echo('blog:blogs'), "blog/all");
  elgg_register_menu_item('site', $item);
  }
}

function river_addon_river_page_handler($page) {
	global $CONFIG;

	$param = 'friends';
	
	elgg_set_page_owner_guid(elgg_get_logged_in_user_guid());

	// make a URL segment available in page handler script
	$page_type = elgg_extract(0, $page, $param);
	$page_type = preg_replace('[\W]', '', $page_type);
	if ($page_type == 'owner') {
		elgg_gatekeeper();
		$page_username = elgg_extract(1, $page, '');
		if ($page_username == elgg_get_logged_in_user_entity()->username) {
			$page_type = 'mine';
		} else {
			elgg_admin_gatekeeper();
			set_input('subject_username', $page_username);
		}
	}
	set_input('page_type', $page_type);

	require_once("{$CONFIG->path}pages/river.php");
	return true;
}

  
?>