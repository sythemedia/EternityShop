
<?php

register_shutdown_function(function()
{
	echo '</pre>';
});
require_once __DIR__ . '/includes/index.php';
if (!isset($_GET['item']))
{
	die(json_encode('Item required'));
}
if (!isset($_SESSION['eternityshop']['user']) || is_null($_SESSION['eternityshop']['user']))
{
	die(json_encode('Invalid user'));
}
if (is_null($mysqli->query('SELECT * FROM `items` WHERE `id`="' . $_GET['item'] . '"')->fetch_array()))
{
	die(json_encode('Invalid item'));
}
$query = $mysqli->query('SELECT * FROM  `users` WHERE  `username` =  "' . $_SESSION['eternityshop']['user'] . '"');
list($userid, $username, $points, $items) = $query->fetch_array(MYSQLI_NUM);
$items = json_decode($items, TRUE);
$query = $mysqli->query('SELECT * FROM `items` WHERE `id`="' . htmlspecialchars($_GET['item'], ENT_QUOTES) . '"');
list($itemid, $price) = $query->fetch_array(MYSQLI_NUM);
if ($points < $price)
{
	die(json_encode('Not enough points'));
}
array_push($items, $itemid);
$mysqli->autocommit(FALSE);
$query = $mysqli->query('UPDATE `users` SET  `points` =' . ($points - $price) . ', `items` =\'' . json_encode((object) $items) . '\' WHERE  `id` =' . $userid . ';');
$mysqli->commit();
die(json_encode('Successfully purchased item ' . htmlspecialchars($_GET['item'], ENT_QUOTES)));
