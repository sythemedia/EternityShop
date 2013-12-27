
<?php

require_once __DIR__ . '/includes/index.php';
if (!isset($_GET['name']))
{
	die(json_encode('Name required'));
}
if (!isset($_GET['desc']))
{
	die(json_encode('Desc required'));
}
if (!isset($_GET['price']))
{
	die(json_encode('Price required'));
}
if (!isset($_GET['max']))
{
	die(json_encode('Max required'));
}
if (!isset($_SESSION['eternityshop']['user']) || is_null($_SESSION['eternityshop']['user']))
{
	die(json_encode('Invalid user'));
}
$query = $mysqli->query('SELECT * FROM  `users` WHERE  `username` =  "' . $_SESSION['eternityshop']['user'] . '"');
list($userid, $username, $points, $items, $admin) = $query->fetch_array(MYSQLI_NUM);
if ($admin !== "1")
{
	die(json_encode('Administrative privileges requred'));
}
$mysqli->autocommit(FALSE);
$query = $mysqli->query("INSERT INTO `items` (`id`,`price`, `Max_times`, `name`, `desc`) VALUES (NULL, '" . $_GET['price'] . "', '" . $_GET['max'] . "', '" . $_GET['name'] . "', '" . $_GET['desc'] . "');");
$insert_id = $mysqli->insert_id;
$mysqli->commit();
die(json_encode($insert_id));
