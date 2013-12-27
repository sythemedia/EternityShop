<?php

switch (session_status()):
	case PHP_SESSION_DISABLED:
		die('Sessions must be enabled');
		break;
	case PHP_SESSION_NONE:
		session_start();
		break;
	case PHP_SESSION_ACTIVE:
		// No action needed
		break;
endswitch;
define('IN_ETERNTIY_SHOP', TRUE);
require_once dirname(__DIR__) . '/config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, is_null(DB_PORT) ? ini_get("mysqli.default_port") : DB_PORT, is_null(DB_SOCK) ? ini_get("mysqli.default_socket") : DB_SOCK);
if ($mysqli === FALSE)
{
	die($mysqli->error);
}
if (!isset($_SESSION['eternityshop']))
{
	require_once __DIR__ . '/session_init.php';
}