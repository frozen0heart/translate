<?php
require 'configDB.php';
require 'configDB1.php';

if($_SESSION['logged_user']->login != "admin") {
	?> <a style="font-size: 20px; color: black">У вас нет прав для посещения данной страницы</a>
	<a href="/" style="font-size: 16px; color: red; margin-top: 8px" class="obvod">На главную</a> <?php exit();
}
if ($_POST['word'] != '') {
$topic = $_POST['topic'];
$ar = $_POST['word'];

$ar1 = trim($ar);
	$ar2 = mb_strtolower($ar1);
	if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
	{
	function mb_ucfirst($str, $encoding='UTF-8')
	{
		$ar2 = mb_ereg_replace('^[\ ]+', '', $ar2);
		$ar2 = mb_strtoupper(mb_substr($ar2, 0, 1, $encoding), $encoding).
			   mb_substr($ar2, 1, mb_strlen($ar2), $encoding);
		return $ar2;
	}
}
	$word = mb_convert_case($ar2, MB_CASE_TITLE, 'UTF-8');

$ar = $_POST['translate1'];

$ar1 = trim($ar);
	$ar2 = mb_strtolower($ar1);
	if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
	{
	function mb_ucfirst($str, $encoding='UTF-8')
	{
		$ar2 = mb_ereg_replace('^[\ ]+', '', $ar2);
		$ar2 = mb_strtoupper(mb_substr($ar2, 0, 1, $encoding), $encoding).
			   mb_substr($ar2, 1, mb_strlen($ar2), $encoding);
		return $ar2;
	}
}
	$translate1 = mb_convert_case($ar2, MB_CASE_TITLE, 'UTF-8');

$ar = $_POST['translate2'];

$ar1 = trim($ar);
	$ar2 = mb_strtolower($ar1);
	if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
	{
	function mb_ucfirst($str, $encoding='UTF-8')
	{
		$ar2 = mb_ereg_replace('^[\ ]+', '', $ar2);
		$ar2 = mb_strtoupper(mb_substr($ar2, 0, 1, $encoding), $encoding).
			   mb_substr($ar2, 1, mb_strlen($ar2), $encoding);
		return $ar2;
	}
}
	$translate2 = mb_convert_case($ar2, MB_CASE_TITLE, 'UTF-8');

$ar = $_POST['translate3'];

$ar1 = trim($ar);
	$ar2 = mb_strtolower($ar1);
	if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
	{
	function mb_ucfirst($str, $encoding='UTF-8')
	{
		$ar2 = mb_ereg_replace('^[\ ]+', '', $ar2);
		$ar2 = mb_strtoupper(mb_substr($ar2, 0, 1, $encoding), $encoding).
			   mb_substr($ar2, 1, mb_strlen($ar2), $encoding);
		return $ar2;
	}
}
	$translate3 = mb_convert_case($ar2, MB_CASE_TITLE, 'UTF-8');

$full_translate = $_POST['full_translate'];

if ( R::count('game', "word = ?", array($_POST['word']) ) > 0)
    {
    $_SESSION['error'] = 1;
    unset($_SESSION['slovo']);
    header('Location: /admin.php');
    exit();
}

$sql = 'INSERT INTO game(topic, word, translate1, translate2, translate3, full_translate) VALUES(:topic, :word, :translate1, :translate2, :translate3, :full_translate)';
						$query = $pdo->prepare($sql);
						$query->execute(['topic' => $topic, 'word' => $word, 'translate1' => $translate1, 'translate2' => $translate2, 'translate3' => $translate3, 'full_translate' => $full_translate]);
unset($_SESSION['error']);
if ($topic == 1) {
$_SESSION['slovo'] = 1;
}
if ($topic == 2) {
$_SESSION['slovo'] = 2;
}
if ($topic == 3) {
$_SESSION['slovo'] = 3;
}
if ($topic == 4) {
$_SESSION['slovo'] = 4;
}
if ($topic == 5) {
$_SESSION['slovo'] = 5;
}
if ($topic == 6) {
$_SESSION['slovo'] = 6;
}
header('Location: /admin.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <title>translate-admin</title>
  <style>
  	Body {background: url(img/admin.jpg) repeat; -webkit-background-size: 100%;
-o-background-size: 100%;
-moz-background-size: 100%;
-ms-background-size: 100%;
-khtml-background-size: 100%;
background-size: 100%;}
  	form {
	background: #ffffff;
	border: 8px solid #800080;
	border-radius: 20px;
	padding: 10px 10px;
}
.container {
	margin-top: 50px;
	width: 40%!important;
	}
	ul {
	padding: 0 10px!important;
}

ul li {
	list-style: none;
	padding: 15px;
	margin-bottom: 10px;
	background: #fcfcfc;
	border: 1px solid silver;
	border-radius: 5px;
}

ul li:hover {
	background: #e5e5e5;
}

ul li button {
	border: 0;
	padding: 5px 15px;
	color: white;
	font-size: 13px;
	background: #db5757;
	position: relative;
	left: 70px;
	border-radius: 5px;
}

ul li button:hover {
	background: #a04141;
}
b {
position: absolute;
}
table {
   border: 1px solid grey;
   width: 70%;
   text-align: center;
}
th {
   border: 1px solid grey;
}
td {
   border: 1px solid grey;
}
.but{
    margin: -20px -50px;
    position:relative;
    left: 75%;
}
.obvod {
		text-shadow: 0.5px 0 0.5px #000,
		0 0.5px 0.5px #000,
		-0.5px 0 0.5px #000,
		0 -0.5px 0.5px #000;
}
  </style>
</head>
<body>
	<?php
	if ($_SESSION['error'] == 1) {
	?> <a style="color:red">Это слово уже существует!</a><br> <?php
}
	?>
	<a style="color: hidden; margin-left: 10px"> ( </a>
	<a href="/" style="font-size: 16px; color: red; margin-top: 8px" class="obvod"> На главную</a><br>
	<div class="d-flex gap-5 justify-content-center">
	<?php
	$query=$pdo->query("SELECT id FROM game");
	$members=$query->rowCount();

$top = 1;
	$st = $pdo->prepare('SELECT COUNT(topic) as cnt FROM `game` WHERE topic=:topic');
	$st->bindParam(':topic', $top, PDO::PARAM_INT);
	$art_column = $st->fetch();
	$st->execute();
	$data1 = $st->fetch();

$top = 2;
	$st = $pdo->prepare('SELECT COUNT(topic) as cnt FROM `game` WHERE topic=:topic');
	$st->bindParam(':topic', $top, PDO::PARAM_INT);
	$art_column = $st->fetch();
	$st->execute();
	$data2 = $st->fetch();

$top = 3;
	$st = $pdo->prepare('SELECT COUNT(topic) as cnt FROM `game` WHERE topic=:topic');
	$st->bindParam(':topic', $top, PDO::PARAM_INT);
	$art_column = $st->fetch();
	$st->execute();
	$data3 = $st->fetch();

$top = 4;
	$st = $pdo->prepare('SELECT COUNT(topic) as cnt FROM `game` WHERE topic=:topic');
	$st->bindParam(':topic', $top, PDO::PARAM_INT);
	$art_column = $st->fetch();
	$st->execute();
	$data4 = $st->fetch();

$top = 5;
	$st = $pdo->prepare('SELECT COUNT(topic) as cnt FROM `game` WHERE topic=:topic');
	$st->bindParam(':topic', $top, PDO::PARAM_INT);
	$art_column = $st->fetch();
	$st->execute();
	$data5 = $st->fetch();

$top = 6;
	$st = $pdo->prepare('SELECT COUNT(topic) as cnt FROM `game` WHERE topic=:topic');
	$st->bindParam(':topic', $top, PDO::PARAM_INT);
	$art_column = $st->fetch();
	$st->execute();
	$data6 = $st->fetch();
	?>
<table>
	<tr><th>Всего слов</th><th>Уникальные</th><th>Информатика</th><th>Кулинария</th><th>Дизайн</th><th>Путешествия</th><th>Разное</th></tr>
	<tr><td><?php echo $members ?></td><td><?php echo $data1['cnt'] ?></td><td><?php echo $data2['cnt'] ?></td><td><?php echo $data3['cnt'] ?></td><td><?php echo $data4['cnt'] ?></td><td><?php echo $data5['cnt'] ?></td><td><?php echo $data6['cnt'] ?></td></tr>
</table>
</div>
		<div class="d-flex gap-5 justify-content-center">
			<div class="container">
		<h1 class="obvod" style="text-align: center">Добавить слово</h1>
		<form action="/admin.php" method="post">
			<input type="text" name="topic" id="topic" placeholder="Цифра темы" class="form-control" autocomplete="on" value="<?php echo $_SESSION['slovo']; ?>">
			<a style="font-size: 11px; color: black; margin-top: 7px">1 - Уникальные; 2 - Информатика; 3 - Кулинария; 4 - Дизайн; 5 - Путешествия; 6 - Разное;</a>
			<input type="text" name="word" id="word" placeholder="Слово на английском" class="form-control" autocomplete="off" autofocus="true">
			<input type="text" name="translate1" id="translate1" placeholder="Основной перевод слова" class="form-control" autocomplete="off">
			<input type="text" name="translate2" id="translate2" placeholder="Доп. перевод слова (необязательно)" class="form-control" autocomplete="off">
			<input type="text" name="translate3" id="translate3" placeholder="Доп. перевод слова Х2 (необязательно)" class="form-control" autocomplete="off">
			<input type="text" name="full_translate" id="full_translate" placeholder="Полные переводы слова с оформлением" class="form-control" autocomplete="off"><br>
			<div class="d-flex gap-5 justify-content-center">
			<button  type="submit" name="sendTask" class="btn btn-success">Добавить</button>
		</div>
		</form>
	<h1 class="obvod" style="text-align: center; color: white">Удалить слово</h1>
		<?php
			require 'configDB1.php';

			echo '<ul><br>';
			$query = $pdo->query('SELECT * FROM `game` ORDER BY `id` DESC');
			while($row = $query->fetch(PDO::FETCH_OBJ)) {
				echo '<li><b>'.$row->word.'</b><a class="but" href="/deleteword.php?id='.$row->id.'"><button>Удалить</button></a></li>';
			}
			echo '</ul>';
		?>
	</div>

		<div class="container">
		<h1 class="obvod" style="text-align: center">Удалить аккаунт игрока</h1>
		<?php
			require 'configDB1.php';

			echo '<ul><br>';
			$query = $pdo->query('SELECT * FROM `users` ORDER BY `id` DESC');
			while($row = $query->fetch(PDO::FETCH_OBJ)) {
				echo '<li><b>'.$row->login.'</b><a class="but" href="/deleteuser.php?id='.$row->id.'"><button>Удалить</button></a></li>';
			}
			echo '</ul>';
		?>
</body>
</html>