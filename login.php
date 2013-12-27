<?php

require_once __DIR__ . '/includes/index.php';
if (!isset($_GET['key']))
{
	die(json_encode('Key required'));
}
if (!isset($_GET['user']))
{
	die(json_encode('User required'));
}
if ($_GET['key'] !== 'validkey') // Use ?user=foo&key=validkey for testing purposes
{
	die(json_encode('Invalid key'));
}
$_SESSION['eternityshop']['user'] = $_GET['user'];
die(json_encode('Successfully logged in as ' . $_GET['user']));
