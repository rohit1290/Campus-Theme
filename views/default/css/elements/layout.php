<?php
/**
 * Page Layout
 *
 * Contains CSS for the page shell and page layout
 *
 * Default layout: 990px wide, centered. Used in default page shell
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>

  
/* ***************************************
	PAGE LAYOUT
*************************************** */
/***** DEFAULT LAYOUT ******/
<?php // the width is on the page rather than topbar to handle small viewports ?>
.elgg-page-default {
	min-width: 990px;
}
.elgg-page-default .elgg-page-header > .elgg-inner {
	width: 95%;
	height: 35px;
	margin: 0 auto;

}
.elgg-page-default .elgg-page-body > .elgg-inner {
	width: 95%;
	margin: 0 auto;
}
.elgg-page-default .elgg-page-footer > .elgg-inner {
	width: 95%;
	border-top: 1px solid lightgrey;
	margin: 0 auto;
	padding: 10px 15px;
}


/***** TOPBAR ******/
.elgg-page-topbar {
	background: #2D4C6B url(<?php echo elgg_get_site_url(); ?>mod/bright-theme/graphics/top-bar.png) repeat-x bottom left;
	border-bottom: 1px solid #2D4C6B;
	position: relative;
}
.elgg-page-topbar > .elgg-inner {
		width: 95%;
  padding: 18px 0px 6px 0px;
  margin: auto;
}


/***** PAGE MESSAGES ******/
.elgg-system-messages {
	position: fixed;
	top: 40px;
	right: 20px;
	max-width: 500px;
	z-index: 2000;
}
.elgg-system-messages li {
	margin-top: 25px;
}
.elgg-system-messages li p {
	margin: 0;
}


/***** PAGE HEADER ******/
.elgg-page-header {
	position: relative;
	background: #2D4C6B;
  
}
.elgg-page-header > .elgg-inner {
	position: relative;
}

/***** PAGE BODY LAYOUT ******/
.elgg-layout {
	min-height: 360px;
}
.elgg-layout-one-sidebar {
<?
/*	background: transparent url(<?php echo elgg_get_site_url(); ?>mod/bright-theme/graphics/sidebar.png) repeat-y right top; */
?>
}
.elgg-layout-two-sidebar {
<?
/*		background: transparent url(<?php echo elgg_get_site_url(); ?>mod/bright-theme/graphics/sidebar-double.png) repeat-y right top;*/
?>
}
.elgg-layout-error {
	margin-top: 20px;
}
.elgg-sidebar {
	display:none;
}
.elgg-sidebar-alt {
	position: relative;
	padding: 20px 15px;
	float: right;
	width: 200px;
	margin: 0;
}
.elgg-main {
	position: relative;
	padding: 15px;
	min-height: 600px;	border-left: none;
}
.elgg-main > .elgg-head {
	margin-bottom: 10px;
}


/***** PAGE FOOTER ******/
.elgg-page-footer {
	position: relative;
}
.elgg-page-footer {

	color: black;
}
.elgg-page-footer a {
	color: black;
  text-decoration: none;
}
.elgg-page-footer a:hover {
	color: gray;
}

.profile-content-menu a{
display: block;
padding: 5px 15px;
margin: 1px 0;
}