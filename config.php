<?php

if (!defined('IN_ETERNTIY_SHOP'))
{
	header("HTTP/1.0 404 Not Found");
	$handle = curl_init('http://' . $_SERVER["HTTP_HOST"] . '/INTENTIONAL-FAILURE'); // Return a 404 paage as if the page doesn't exist
	curl_exec($handle);
	die;
}

// Edit your settings below this line.  Default settings are used.  If you update these, make sure you do not commit these lines or you could cause problems for other users.
define('DB_HOST', '???');
define('DB_USER', '???');
define('DB_PASS', '???');
define('DB_NAME', '???');
define('DB_PORT', NULL); // Change from NULL if you need a non-default port
define('DB_SOCK', NULL); // Change from NULL if you need a socket
// Don't edit beyond this line unless you really know what you're doing!