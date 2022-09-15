<?php
	require 'configDB.php';
	require "configDB1.php";
?>
	<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <title>Статистика</title>
<style>
	Body {background: url(img/stata.jpg) repeat; -webkit-background-size: 100%;
-o-background-size: 100%;
-moz-background-size: 100%;
-ms-background-size: 100%;
-khtml-background-size: 100%;
background-size: 100%;}
   .center {
    text-align: center; /* Выравнивание по правому краю */
    text-shadow: 1px 0 1px #000,
		0 1px 1px #000,
		-1px 0 1px #000,
		0 -1px 1px #000;
   }
	.container {
	margin-top: 50px;
	width: 80%!important;
}
form {
	background: #ffffff;
	border: 8px solid #800080;
	border-radius: 20px;
	padding: 10px 10px;
}
table {
   border: 1px solid grey;
   width: 100%;
   text-align: center;
}
th {
   border: 1px solid grey;
}
td {
   border: 1px solid grey;
}
.Ksusha {
	background: #ffffff;
	border: 5px solid #800080;
	border-radius: 20px;
	padding: 5px 5px;
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
	<div class="container">
<div class="d-flex gap-5 justify-content-center" style="margin-top: 10px">
<div><button  type="button" name="do_signup" class="btn btn-success" onclick="location.href='/'" style="margin-top: 5px">На главную</button></div>
  <?php if(isset($_SESSION['logged_user'])) {
  	?><div class="Ksusha">
  	<div style="font-size: 20px; text-align:  right; color: green" class="obvod">Игрок: <?php echo $_SESSION['logged_user']->login; ?></div></div><?php
  }
  else {
  ?><div style="font-size: 20px; text-align:  right; color: orange; margin-top: 7px" class="obvod">Вы не вошли в аккаунт</div><?php }?>
</div>
</div>
<div class="container">
	<form>
		<table>
	<tr><th>Общее число пройденных слов</th><th>Пользователь</th><th>Дата регистрации</th><th>Последняя активность</th></tr> <!--ряд с ячейками заголовков-->
<?php
$sth = $pdo->prepare("SELECT * FROM `users` ORDER BY `win` DESC");
$sth->execute();
while ($book = $sth->fetch(PDO::FETCH_OBJ)) { ?>
			<tr <?php if($book->login==$_SESSION['logged_user']->login){ ?>style="background: #ffdead"<?php }?>><td><?php echo $book->win; ?></td>
			<td><?php echo $book->login; ?></td>
			<td><?php echo $book->reg; ?></td>
			<td><?php echo $book->active; ?></td></tr><?php } ?>
</table>
	</form>
	</div>
</body>
</html>