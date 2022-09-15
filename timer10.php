<?php
require 'configDB.php';
require "configDB1.php";

if ($_SESSION['timer'] > 0) {
	$b = $_SESSION['timer'] - 1;
	$_SESSION['timer'] = $b;
	echo $_SESSION['timer'];
}
if ($_SESSION['timer'] == 0) {
	$_SESSION['time'] = 0;
exit();
}
?>