<?php

require_once __DIR__ . '/includes/index.php';
if ($_GET['key'] !== 'validkey') // Use ?user=foo&key=validkey for testing purposes
{
	die('Invalid key');
}
$_SESSION['eterntiyshop']['user'] = $_GET['user'];
