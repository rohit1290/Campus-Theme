<?php
/**
 * Elgg Search css
 * 
 */
?>

/**********************************
Search plugin
***********************************/
.elgg-search-header {
	bottom: 5px;
	position: absolute;
	right: 5px;
  z-index: 1;
}
.elgg-search input[type=submit] {
float:right;
	background: url(<?php echo elgg_get_site_url()?>mod/bright-theme/graphics/search-btn.png);
	background-repeat:no-repeat;
    border: 0;
    display: block;
    height: 24px;
    width: 28px;
    border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
    -khtml-border-radius: 3px;
    box-shadow: 0 0 8px rgba(0, 0, 0, .8);
	-webkit-box-shadow: 0 0 8px rgba(0, 0, 0, .8);
	-moz-box-shadow: 0 0 8px rgba(0, 0, 0, .8);
	cursor: pointer;
	}

	/* Fixes submit button height problem in Firefox */
	.elgg-search input[type=submit]::-moz-focus-inner {
	  border: 0;
	}

.elgg-search input[type=text] {
float:left;
	width: 225px;
	height: 25px;

	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	
	border: 1px solid rgba(0, 0, 0, 0.25);
	color: #fff;
  font-size: 13px;
	font-weight: bold;
  line-height: 1.5em;
	padding: 3px 15px;
	background-color: rgba(0, 0, 0, 0.25);
}
.elgg-search input[type=text]:focus, .elgg-search input[type=text]:active {
	background-color: #fff;
	color: #05d;
}

.search-list li {
	padding: 5px 0 0;
}
.search-heading-category {
	margin-top: 20px;
	color: #666;
}

.search-highlight {
	background-color: #bbdaf7;
}
.search-highlight-color1 {
	background-color: #bbdaf7;
}
.search-highlight-color2 {
	background-color: #A0FFFF;
}
.search-highlight-color3 {
	background-color: #FDFFC3;
}
.search-highlight-color4 {
	background-color: #ccc;
}
.search-highlight-color5 {
	background-color: #4690d6;
}
