<?php
/**
 * Elgg pageshell
 * The standard HTML page shell that everything else fits into
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['title']       The page title
 * @uses $vars['body']        The main content of the page
 * @uses $vars['sysmessages'] A 2d array of various message registers, passed from system_messages()
 */

// backward compatability support for plugins that are not using the new approach
// of routing through admin. See reportedcontent plugin for a simple example.
if (elgg_get_context() == 'admin') {
	if (get_input('handler') != 'admin') {
		elgg_deprecated_notice("admin plugins should route through 'admin'.", 1.8);
	}
	elgg_admin_add_plugin_settings_menu();
	elgg_unregister_css('elgg');
	echo elgg_view('page/admin', $vars);
	return true;
}

// render content before head so that JavaScript and CSS can be loaded. See #4032
//$topbar = elgg_view('page/elements/topbar', $vars);
$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));
//$header = elgg_view('page/elements/header', $vars);

// Set the content type
header("Content-type: text/html; charset=UTF-8");

$lang = get_current_language();

?>

<!DOCTYPE html>
<html>
<head>
    <?php echo elgg_view('page/elements/head', $vars); ?>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
			<?php
			$user = elgg_get_logged_in_user_entity();
			$icon = elgg_view_entity_icon($user, 'small', array(
			'use_hover' => false,
			'use_link' => false,
			));
			?>
                <ul class="nav" id="side-menu">
                    <li class="nav-header" style="height: 60px;  padding: 0px 0px;">
                        <a href="<?php echo elgg_get_site_url(); ?>"><img src="<?php echo elgg_get_site_url(); ?>mod/campus-theme/graphics/top-bar-logo.png"></a>
                        <div class="logo-element">
                            CK
                        </div>
                    </li>
					<div class="dropdown profile-element" style="padding: 25px 25px;">
							<span>
                            <?php echo $icon; ?>
                             </span>
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold" style="color: #DFE4ED"><?php echo $user->name; ?></strong>
                             </span> <span class="text-muted text-xs block"><a href="<?php echo elgg_get_site_url(); ?>profile">Edit Profile</a></span></span>
                        </div>
				</ul>
					  <?php
					  $user = elgg_get_page_owner_entity();
					  $body = elgg_view_menu('owner_block', array(
							'entity' => $user,
						));

						echo elgg_view('page/components/module', array(
							'title' => $title,
							'body' => $body,
							'class' => 'elgg-module-feature',
						));
					?>
				
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg sidebar-content">
		<div class="row border-bottom">
        <div class="navbar-header">
            <form role="search" class="navbar-form-custom" action="<?php echo elgg_get_site_url(); ?>search" style="width:600px" method="GET">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="q" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
				<?php if (elgg_is_admin_logged_in()) { ?>
				<li>
					<a href="<?php echo elgg_get_site_url();?>admin">
						<i class="fa fa-bell"></i>Administration
					</a>
				</li>
				<?php } ?>
				<li>
                    <a href="<?php echo elgg_get_site_url();?>settings">
                        <i class="fa fa-tasks"></i>Settings
                    </a>
                </li>
				<li>
				<?php
				$__elgg_ts = time();
				$__elgg_token = generate_action_token($__elgg_ts);
				?>

					<a href="<?php echo elgg_get_site_url();?>logout?__elgg_ts=<?php echo $__elgg_ts?>&__elgg_token=<?php echo $__elgg_token?>">
                        <i class="fa fa-sign-out"></i>Log out
                    </a>
				</li>
                
            </ul>

        </nav>
        </div>
        <div class="sidebard-panel">
    <div>
       <?php echo elgg_view('page/elements/custom_module', $vars); ?>         
    </div>
</div>
        		<div class="wrapper wrapper-content" style="min-height:800px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div>

								<?php echo elgg_view('page/elements/body', $vars); ?>
																	
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
		        <div class="footer">
            <div class="pull-right">

            </div>
            <div>
                <?php echo elgg_view('page/elements/footer', $vars); ?>
            </div>
        </div>        </div>
    </div>
<?php echo elgg_view('page/elements/scripts', $vars); ?>
</body>
</html>
