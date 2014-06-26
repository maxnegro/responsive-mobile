<?php
/**
 * Theme Action Hooks
 *
 * Theme Action Hooks that extend THA
 *
 * @package      ${PACKAGE}
 * @license      license.txt
 * @copyright    ${YEAR} ${COMPANY}
 * @since        ${VERSION}
 *
 * Please do not edit this file. This file is part of the ${PACKAGE} Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Just after opening <html> tag
 *
 * @see header.php
 */
function responsive_html_before() {
	do_action( 'responsive_html_before' );
	tha_html_before();
}

/**
 * Just after opening <body> tag
 *
 * @see header.php
 */
function responsive_body_top() {
	do_action( 'responsive_body_top' );
	tha_body_top();
}

/**
 * Just after closing </body>
 *
 * @see footer.php
 */
function responsive_body_bottom() {
	do_action( 'responsive_container' );
	do_action( 'responsive_body_bottom' );
	tha_body_bottom();
}

/**
 * Just after opening <div id="container"> tag
 *
 * @see header.php
 */
function responsive_container_top() {
	do_action( 'responsive_container' );
}

/**
 * Just after closing </div><!-- end of #container -->
 *
 * @see footer.php
 */
function responsive_container_bottom() {
	do_action( 'responsive_container_end' );
	do_action( 'responsive_container_bottom' );
	tha_footer_before();
}

/**
 * Just after opening <head>
 *
 * @see header.php
 */
function responsive_head_top() {
	do_action( 'responsive_head_top' );
	tha_head_bottom();
}

/**
 * Just after closing </head>
 *
 * @see header.php
 */
function responsive_head_bottom() {
	do_action( 'responsive_head_bottom' );
	tha_head_bottom();
}

/**
 * Just after opening <div id="container">
 *
 * @see header.php
 */
function responsive_header() {
	do_action( 'responsive_header' );
	tha_header_before();
}

/**
 * Just after opening <div id="header">
 *
 * @see header.php
 */
function responsive_header_top() {
	do_action( 'responsive_header_top' );
	tha_header_top();
}

/**
 * Just after opening <div id="header">
 *
 * @see header.php
 */
function responsive_in_header() {
	do_action( 'responsive_in_header' );
}

/**
 * Creates a hook for the first header content just after <div id="site-branding">
 */
function responsive_header_one() {
	do_action( 'responsive_header_one' );
}

/**
 * Creates a hook for the second header content just after
 */
function responsive_header_two() {
	do_action( 'responsive_header_two' );
}

/**
 * Just after closing </div><!-- end of #header -->
 *
 * @see header.php
 */
function responsive_header_bottom() {
	do_action( 'responsive_header_bottom' );
	tha_header_bottom();
}

/**
 * Just after closing </div><!-- end of #header -->
 *
 * @see header.php
 */
function responsive_header_end() {
	do_action( 'responsive_header_end' );
	tha_header_after();
}

/**
 * Just before opening <div id="wrapper">
 *
 * @see header.php
 */
function responsive_wrapper() {
	do_action( 'responsive_wrapper' );
	tha_content_before();
}

/**
 * Just after opening <div id="wrapper">
 *
 * @see header.php
 */
function responsive_wrapper_top() {
	do_action( 'responsive_wrapper_top' );
	tha_content_top();
}

/**
 * Just after opening <div id="wrapper">
 *
 * @see header.php
 */
function responsive_in_wrapper() {
	do_action( 'responsive_in_wrapper' );
}

/**
 * Just before closing </div><!-- end of #wrapper -->
 *
 * @see header.php
 */
function responsive_wrapper_bottom() {
	do_action( 'responsive_wrapper_bottom' );
	tha_content_bottom();
}

/**
 * Just after closing </div><!-- end of #wrapper -->
 *
 * @see header.php
 */
function responsive_wrapper_end() {
	do_action( 'responsive_wrapper_end' );
	tha_content_after();
}

/** Just before <div id="post">
 *
 * @see index.php
 */
function responsive_entry_before() {
	do_action( 'responsive_entry_before' );
	tha_entry_before();
}

/** Just after <div id="post">
 *
 * @see index.php
 */
function responsive_entry_top() {
	do_action( 'responsive_entry_top' );
	tha_entry_top();
}

/** Just before </div> <!-- end of div#post -->
 *
 * @see index.php
 */
function responsive_entry_bottom() {
	do_action( 'responsive_entry_bottom' );
	tha_entry_bottom();
}

/** Just after </div> <!-- end of div#post -->
 *
 * @see index.php
 */
function responsive_entry_after() {
	do_action( 'responsive_entry_after' );
	tha_entry_after();
}

/** Just before comments_template()
 *
 * @see index.php
 */
function responsive_comments_before() {
	do_action( 'responsive_comments_before' );
	tha_comments_before();
}

/** Just after comments_template()
 *
 * @see index.php
 */
function responsive_comments_after() {
	do_action( 'responsive_comments_after' );
	tha_comments_after();
}

/**
 * Just before opening <div id="widgets">
 *
 * @see sidebar.php
 */
function responsive_widgets_before() {
	do_action( 'responsive_widgets_before' );
	tha_sidebars_before();
}

/**
 * Just after opening <div id="widgets">
 *
 * @see sidebar.php
 */
function responsive_widgets() {
	do_action( 'responsive_widgets' );
	tha_sidebar_top();
}

/**
 * Just before closing </div><!-- end of #widgets -->
 *
 * @see sidebar.php
 */
function responsive_widgets_end() {
	do_action( 'responsive_widgets_end' );
	tha_sidebar_bottom();
}

/**
 * Just after closing </div><!-- end of #widgets -->
 *
 * @see sidebar.php
 */
function responsive_widgets_after() {
	do_action( 'responsive_widgets_after' );
	tha_sidebars_after();
}

/**
 * Just after opening <div id="footer">
 *
 * @see footer.php
 */
function responsive_footer_top() {
	do_action( 'responsive_footer_top' );
	tha_footer_top();
}

/**
 * Just before closing </div><!-- end of #footer -->
 *
 * @see footer.php
 */
function responsive_footer_bottom() {
	do_action( 'responsive_footer_bottom' );
	tha_footer_bottom();
}

/**
 * Just after closing </div><!-- end of #footer -->
 *
 * @see footer.php
 */
function responsive_footer_after() {
	do_action( 'responsive_footer_after' );
	tha_footer_after();
}

/**
 * Theme Options
 *
 * @see theme-options.php
 */
function responsive_theme_options() {
	do_action( 'responsive_theme_options' );
}
