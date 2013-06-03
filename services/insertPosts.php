<?php 
date_default_timezone_set('europe/london');
// error_reporting(E_ALL);
// header('Content-type:text/html; charset:utf-8');
require("../functions.php");

$end = $_GET['end'];



$arrVideos = orderBigArray(deCodeString($end));

for ($i=0; $i < count($arrVideos); $i++) { 
	$sql = "INSERT INTO videos (url, stamp) VALUES ('".$arrVideos[$i]['url']."', '".date('m/d/y H:i:s')."') ON DUPLICATE KEY UPDATE stamp = '".date('m/d/y H:i:s')."'";
	save2file($sql, "../logs/insertPosts_queries.txt");
	$result = query($sql);
}

return $result;
?>