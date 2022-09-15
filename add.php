<?php
	require 'configDB1.php';
	require 'configDB.php';

	$date = date("Y.m.d");
	$arbuz = $_SESSION['logged_user']->login;
	$query = $pdo->prepare('UPDATE `users` SET `active` = :active WHERE `login` = :login');
	$query->execute(array('login' => $arbuz, 'active' => $date));

	$data = $_POST;
	$topic = $_POST['listGroupRadios'];
	$sec = $_POST['sec'];
	$lvl = $_POST['lvl'];

	$_SESSION['timer'] = $sec + 2;

	if ($lvl == 0) {
		$_SESSION['result'] = 0;
		$_SESSION['povtor1'] = 1;
		$_SESSION['povtor2'] = 1;
		$_SESSION['povtor3'] = 1;
		$_SESSION['povtor4'] = 1;
		$_SESSION['povtor5'] = 1;
		$_SESSION['povtor6'] = 1;
		$_SESSION['povtor7'] = 1;
		$_SESSION['povtor8'] = 1;
		$_SESSION['povtor9'] = 1;
		$_SESSION['time'] = 0;
	}

	$ar = $_POST['wordtrans'];
	$rand = $_POST['rand'];
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
	$wordtrans = mb_convert_case($ar2, MB_CASE_TITLE, 'UTF-8');


$query = $pdo->prepare('SELECT * FROM `game` WHERE `word` = :word');
$query->execute(array('word' => $rand));
			$row = $query->fetch(PDO::FETCH_OBJ);
				$proverka_translate1 = $row->translate1;
				$proverka_translate2 = $row->translate2;
				$proverka_translate3 = $row->translate3;
				$full_translate = $row->full_translate;
					if ($wordtrans == NULL or $wordtrans == '') {
						$wordtrans = 1;
						// Если пустое значение то присваиваем 1, мало ли чё поломается
					}
					if ($wordtrans == $proverka_translate1 or $wordtrans == $proverka_translate2 or $wordtrans == $proverka_translate3) {
						$proverka = true;
						// УСПЕХ
					}
					if ($wordtrans != $proverka_translate1 and $wordtrans != $proverka_translate2 and $wordtrans != $proverka_translate3) {
						$proverka = false;
						// НЕУДАЧА
					}

if ($_SESSION['stop'] == 1) {
$sas = 0;
while ($sas < 1) {
if ($topic > 1) {
$query = $pdo->prepare('SELECT * FROM `game` WHERE `topic` = :topic ORDER BY RAND() LIMIT 1');
$query->execute(array('topic' => $topic));
			$row = $query->fetch(PDO::FETCH_OBJ);
				$rand = $row->word;
				$_SESSION['time'] = 0;
				if ($rand != $_SESSION['povtor1'] and $rand != $_SESSION['povtor2'] and $rand != $_SESSION['povtor3'] and $rand != $_SESSION['povtor4'] and $rand != $_SESSION['povtor5'] and $rand != $_SESSION['povtor6'] and $rand != $_SESSION['povtor7'] and $rand != $_SESSION['povtor8'] and $rand != $_SESSION['povtor9']) {
				if ($row->topic == 2) {
					$tematika = "Информатика";
				}
				if ($row->topic == 3) {
					$tematika = "Кулинария";
				}
				if ($row->topic == 4) {
					$tematika = "Дизайн";
				}
				if ($row->topic == 5) {
					$tematika = "Путешествия";
				}
				if ($row->topic == 6) {
					$tematika = "Разное";
				}
				$Ksusha = $lvl + 1;
				if ($lvl == 0) {
					$_SESSION['povtor1'] = $rand;
				}
				if ($lvl == 1) {
					$_SESSION['povtor2'] = $rand;
				}
				if ($lvl == 2) {
					$_SESSION['povtor3'] = $rand;
				}
				if ($lvl == 3) {
					$_SESSION['povtor4'] = $rand;
				}
				if ($lvl == 4) {
					$_SESSION['povtor5'] = $rand;
				}
				if ($lvl == 5) {
					$_SESSION['povtor6'] = $rand;
				}
				if ($lvl == 6) {
					$_SESSION['povtor7'] = $rand;
				}
				if ($lvl == 7) {
					$_SESSION['povtor8'] = $rand;
				}
				if ($lvl == 8) {
					$_SESSION['povtor9'] = $rand;
				}
				$sas = 1;
				}
			}
if ($topic == 1) {
	$query = $pdo->prepare('SELECT * FROM `game` ORDER BY RAND() LIMIT 1');
	$query->execute(array());
		$row = $query->fetch(PDO::FETCH_OBJ);
		$rand = $row->word;
		$_SESSION['time'] = 0;
		if ($rand != $_SESSION['povtor1'] and $rand != $_SESSION['povtor2'] and $rand != $_SESSION['povtor3'] and $rand != $_SESSION['povtor4'] and $rand != $_SESSION['povtor5'] and $rand != $_SESSION['povtor6'] and $rand != $_SESSION['povtor7'] and $rand != $_SESSION['povtor8'] and $rand != $_SESSION['povtor9']) {
		if ($row->topic == 1) {
			$tematika = "Уникальные";
		}
		if ($row->topic == 2) {
			$tematika = "Информатика";
		}
		if ($row->topic == 3) {
			$tematika = "Кулинария";
		}
		if ($row->topic == 4) {
			$tematika = "Дизайн";
		}
		if ($row->topic == 5) {
			$tematika = "Путешествия";
		}
		if ($row->topic == 6) {
			$tematika = "Разное";
		}
		$Ksusha = $lvl + 1;
		if ($lvl == 0) {
					$_SESSION['povtor1'] = $rand;
				}
				if ($lvl == 1) {
					$_SESSION['povtor2'] = $rand;
				}
				if ($lvl == 2) {
					$_SESSION['povtor3'] = $rand;
				}
				if ($lvl == 3) {
					$_SESSION['povtor4'] = $rand;
				}
				if ($lvl == 4) {
					$_SESSION['povtor5'] = $rand;
				}
				if ($lvl == 5) {
					$_SESSION['povtor6'] = $rand;
				}
				if ($lvl == 6) {
					$_SESSION['povtor7'] = $rand;
				}
				if ($lvl == 7) {
					$_SESSION['povtor8'] = $rand;
				}
				if ($lvl == 8) {
					$_SESSION['povtor9'] = $rand;
				}
		$sas = 1;
			}
		}
	}
}
if ($_SESSION['stop'] == 0) {
	$Ksusha = $lvl;
}
?>
	<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <title>Переведи за 3 секунды</title>
<style>
	Body {background: url(img/game.jpg); -webkit-background-size: 100%;
-o-background-size: 100%;
-moz-background-size: 100%;
-ms-background-size: 100%;
-khtml-background-size: 100%;
background-size: 100%;}
   .center {
    text-align: center; /* Выравнивание по правому краю */
    text-shadow: 1.5px 0 1.5px #000,
		0 1.5px 1.5px #000,
		-1.5px 0 1.5px #000,
		0 -1.5px 1.5px #000;
   }
	.container {
	margin-top: 50px;
	width: 35%!important;
}
form {
	background: #ffffff;
	border: 8px solid #800080;
	border-radius: 20px;
	padding: 10px 10px;
}
table {
   width: 450px;
   text-align: center;
}
.Ksusha {
	background: #ffffff;
	border: 5px solid #800080;
	border-radius: 20px;
	padding: 5px 5px;
}
.obvod {
		text-shadow: 1px 0 1px #000,
		0 1px 1px #000,
		-1px 0 1px #000,
		0 -1px 1px #000;
}
::-webkit-input-placeholder {
text-align:center;
}

:-moz-placeholder { /* Firefox 18- */
   text-align:center;
}

::-moz-placeholder {  /* Firefox 19+ */
   text-align:center;
}

:-ms-input-placeholder {
   text-align:center;
}
:focus::-webkit-input-placeholder {
  color: transparent
}

:focus::-moz-placeholder {
  color: transparent
}

:focus:-moz-placeholder {
  color: transparent
}

:focus:-ms-input-placeholder {
  color: transparent
}
div#tekst_sverhu_kartinki {
	position: relative;
}
.tekst_sverhu_kartinki {
	position: absolute;
	text-transform: uppercase;
	color: white;
	width: 350px;
	padding: 10px;
	text-align: center;
	text-shadow: 1px 0 1px #000,
		0 1px 1px #000,
		-1px 0 1px #000,
		0 -1px 1px #000;
}
div#tema {
	position: relative;
}
.tema {
	position: absolute;
	text-transform: uppercase;
	color: green;
	width: 350px;
	padding: 10px;
	text-align: center;
	text-shadow: 1px 0 1px #000,
		0 1px 1px #000,
		-1px 0 1px #000,
		0 -1px 1px #000;
}
  </style>
</head>
<body onload="submit()">
	<?php if ($_SESSION['stop'] == 0) {
		$_SESSION['stop'] = 1;
		if ($proverka == true) {
			$lol = $_SESSION['result'] + 1;
			$_SESSION['result'] = $lol;
			$query_ = $pdo->prepare('UPDATE `users` SET `win` = `win` + 1 WHERE `login` = :login');
			$query_->execute(array('login' => $arbuz)); } ?>
		<br><div><button  type="button" name="vvv" class="btn btn-success" onclick="location.href='/'" style="margin-left: 90%">На главную</button></div>
	<h1 class="center" style="color:white; font-size: 30px; text-align:  center; margin-top: 10px"><?php if ($sec == 3) { ?>Переведи за 3 секунды<?php } if ($sec == 5) { ?>Переведи за 5 секунд<?php } if ($sec == 10) { ?>Переведи за 10 секунд <?php } ?></h1>
	<div class="container">
	<div class="obvod"></div>
	<div class="d-flex gap-5 justify-content-center" style="margin-top: 10px">
	<form action="/add.php" method="post" id="formK" style="margin-top: 30px">
		<br><br>
		<input type="hidden" name="lvl" class="form-control" value="<?php echo $Ksusha ?>">
		<input type="hidden" name="listGroupRadios" class="form-control" value="<?php echo $topic ?>">
		<input type="hidden" name="sec" class="form-control" value="<?php echo $sec ?>">
		<input type="hidden" name="rand" class="form-control" value="<?php echo $rand ?>">
			<?php
			if ($proverka == true) { ?>
				<table class="center" style="color: green; font-size: 30px; margin-top: 20px;">
				<tr><td>Правильно</td></tr>
				</table><table class="center" style="color: purple; font-size: 20px; margin-top: 20px">
				<tr><td><?php echo $full_translate; ?></td></tr>
			<?php }
			if ($proverka == false) { ?>
				<table class="center" style="color: red; font-size: 30px; margin-top: 20px">
				<tr><td>К сожалению, неправильно</td></tr>
				</table><table class="center" style="color: purple; font-size: 20px; margin-top: 20px">
				<tr><td><?php echo $full_translate; ?></td></tr>
			<?php } ?>
		</table><br>
		<br>
		<div class="d-flex gap-5 justify-content-center">
		<button type="submit" class="w-10 btn btn-lg btn-primary" style="font-size: 15px">Дальше</button></div>
	</form>
</div>
<script type="text/javascript">
		setTimeout(() => document.getElementsByTagName('form')[0].submit(), 5000);
</script>
<?php exit(); }





	if ($_SESSION['stop'] == 1 or $_SESSION['stop'] == NULL) {
		if ($lvl < 10) {
		$_SESSION['time'] = 1;
		?>
	<br><div><button  type="button" name="vvv" class="btn btn-success" onclick="location.href='/'" style="margin-left: 90%">На главную</button></div>
	<h1 class="center" style="color:white; font-size: 30px; text-align:  center; margin-top: 10px"><?php if ($sec == 3) { ?>Переведи за 3 секунды<?php } if ($sec == 5) { ?>Переведи за 5 секунд<?php } if ($sec == 10) { ?>Переведи за 10 секунд<?php } ?></h1>
	<div class="container">
	<div class="obvod" style="color:white; text-align:  right"><?php echo $Ksusha; ?>/10</div>
	<div class="d-flex gap-5 justify-content-center" style="margin-top: 10px">
		<div class="tema" style="color: green; font-size: 30px; margin-top: 60px; margin-left: 60%"><?php echo $tematika; ?></div>
	<form action="/add.php" name="andrey" method="post" id="formK">
		<br>
		<input type="hidden" name="lvl" class="form-control" value="<?php echo $Ksusha ?>">
		<input type="hidden" name="listGroupRadios" class="form-control" value="<?php echo $topic ?>">
		<input type="hidden" name="sec" class="form-control" value="<?php echo $sec ?>">
		<input type="hidden" name="rand" class="form-control" value="<?php echo $rand ?>">
		<table class="center" style="color:purple; font-size: 30px; margin-top: 20px">
			<tr><td><?php echo $rand; ?></td></tr>
		</table><br>
		<input type="search" name="wordtrans" id="wordtrans" placeholder="Переведите слово!" class="form-control" autocomplete="off" autofocus="true" style="margin-bottom: 10px; margin-top: 10px; text-align: center">
		<br>
		 <script type="text/javascript"
src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    // функция, которая запрашивает данные с сервера
    function timer(){
        // вызываем встроенную функцию, которая поможет нам получить данные с сервера
        $.ajax({
            // какой скрипт серверу нужно выполнить
            url: "timer10.php",
            // предыдущие ответы не сохраняем
            cache: false,
            // если всё хорошо, отправляем ответ от сервера на страницу в блок content
            success: function(html){
                $("#content").html(html);
            }
        });
    }

    // как только страница полностью загрузилась
    $(document).ready(function(){
        // начинаем каждую секунду запрашивать новые данные для отсчёта
        timer();
        setInterval('timer()',1000);
    });
</script>

<?php if ($sec == 3) { ?>
	<script type="text/javascript">
		setTimeout(() => document.getElementsByTagName('form')[0].submit(), 5000);
	</script> <?php }
	if ($sec == 5) { ?>
	<script type="text/javascript">
		setTimeout(() => document.getElementsByTagName('form')[0].submit(), 7000);
	</script> <?php }
	if ($sec == 10) { ?>
	<script type="text/javascript">
		setTimeout(() => document.getElementsByTagName('form')[0].submit(), 12000);
	</script> <?php } ?>

		<div class="d-flex gap-5 justify-content-center">
		<button type="submit" name="submit1" class="w-10 btn btn-lg btn-primary" style="font-size: 15px">Досрочно!</button></div>
	</form>
</div>
<div class="d-flex gap-5 justify-content-center">
	<p><img src="img/fon1.png" width="120" height="70" margin-top="10px"></p>
	<div class="tekst_sverhu_kartinki" style="color: red; font-size: 30px"><div id="content"></div></div>
	</div>
</div>
<?php $_SESSION['stop'] = 0; }
if ($lvl >= 10) { ?>
<br><div><button  type="button" name="vvv" class="btn btn-success" onclick="location.href='/'" style="margin-left: 90%">На главную</button></div>
	<h1 class="center" style="color:white; font-size: 30px; text-align:  center; margin-top: 10px"><?php if ($sec == 3) { ?>Переведи за 3 секунды<?php } if ($sec == 5) { ?>Переведи за 5 секунд<?php } if ($sec == 10) { ?>Переведи за 10 секунд<?php } ?></h1>
	<div class="container">
	<div class="d-flex gap-5 justify-content-center" style="margin-top: 10px">
	<form action="/add.php" method="post" id="formK" style="margin-top: 30px">
		<br>
		<input type="hidden" name="lvl" class="form-control" value="0">
		<input type="hidden" name="listGroupRadios" class="form-control" value="<?php echo $topic ?>">
		<input type="hidden" name="sec" class="form-control" value="<?php echo $sec ?>">
		<table class="center" style="color:green; font-size: 30px; margin-top: 20px">
			<tr><td>Конец игры!</td></tr></table>
			<table class="center" style="color:purple; font-size: 30px; margin-top: 20px">
			<tr><td>Правильных ответов: <?php echo $_SESSION['result']; ?></td></tr>
		</table><br>
		<br>
		<div class="d-flex gap-5 justify-content-center">
		<button type="submit" class="w-10 btn btn-lg btn-primary" style="font-size: 15px">Заново</button>
		<button type="button" class="btn btn-success" onclick="location.href='/'">Завершить</button></div>
	</form>
<?php $_SESSION['result'] = 0; ?>
</div>
<?php
}
}
?>
</body>
</html>