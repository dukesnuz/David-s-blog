<?php

//echo 'config';
// are we live
//use below for devlopement
//if (!defined('LIVE')) DEFINE('LIVE', false);
//use below for live
if (!defined('LIVE'))
	DEFINE('LIVE', true);

/***********************************************************************************************
 * select which data source and site to display
 */
//this line used to shut off parts of the site on read page on aside. use true for on false for off

define('SITE_2', 'false');
define('TITLE', 'David\'s Blog');
define('SITE_NAME', 'David\'s Blog');
define('SLOGAN', 'Stuff I feel that is interesting');
define('BLOG', './data/retrieve_posts.php');
define('CODER', '<a href="http://www.dukesnuz.com">Created and designed by: David Petringa</a>');
define('VIEW_CODE', '<a href="https://github.com/dukesnuz/Git-David-s-blog"> View the code on Github</a>');
define('CONTACT', '<a href="http://www.dukesnuz.com/contact/dukesnuz/david/petringa/">Contact</a>');
define('PORTFOLIO', '<a href="http://dukesnuz.com/portfolio/">The Portfolio of David Petringa</a>');

/*
//this line used to shut off parts of the site on read page on aside. use true for on false for off
 define('SITE_2', 'true');

 define('TITLE', 'title 2');
 define('SITE_NAME', 'sitename 2');
 define('SLOGAN', 'slogan 2');
 define('BLOG', './data/retrieve_posts_2.php');
 define('CODER', 'Designed by: ');
 define('VIEW_CODE', 'footer of footer 2');
 define('CONTACT', 'The END');
 */
/**********************************************************************************************
 * END
 */

//errors emailed here
DEFINE('CONTACT_EMAIL', 'hello@dukesnuz.com');
DEFINE('CONTACT_EMAIL_ASCII', '&#104;&#101;&#108;&#108;&#111;&#64;&#100;&#117;&#107;&#101;&#115;&#110;&#117;&#122;&#46;&#99;&#111;&#109;');

//define connection to database
define('MYSQL', './include_2/mysqli_connect.php');

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {
	//build error message
	$message = "An error occurred in script '$e_file' on line $e_line:\n$e_message\n";
	//add backtrace
	$message .= "<pre>" . print_r(debug_backtrace(), 1) . "</pre>\n";

	//or just append $e_vars to the message:
	//$message .="<pre>" .print_r ($e_vars, 1) . "</pre>\n";

	if (!LIVE) {
		//show error in browser
		echo '<div class="error">' . nl2br($message) . '</div>';
	} else {
		//developement print error
		//send error in an email
		error_log($message, 1, CONTACT_EMAIL, "From:" . CONTACT_EMAIL);

		//only print error in browser, if error isnt a notice
		if ($e_number != E_NOTICE) {
			echo ' <div class="error">A System error occurred.  We apologize for the 
						inconvenience.</div>';
		}
	}//End of $live IF_ELSE.
	return true;
	//So that PHP does nt try to handle the error, too.
}//End of my_error_handler() definition

//Use my error handler
set_error_handler('my_error_handler');
