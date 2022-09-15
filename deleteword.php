<?php
	require 'configDB.php';
	require 'configDB1.php';

	if($_SESSION['logged_user']->login != "admin") {
	?> <a style="font-size: 20px; color: black">У вас нет прав для осуществления данной операции</a>
	<a href="/" style="font-size: 16px; color: red; margin-top: 8px" class="obvod">На главную</a> <?php exit();
}

	$id = $_GET['id'];

	$sql = 'DELETE FROM `game` WHERE `id` = ?';
	$query = $pdo->prepare($sql);
	$query->execute([$id]);

	unset($_SESSION['error']);

	header('Location: /admin.php');
?>