<?php
	require "configDB.php";

	$_SESSION['stop'] = 1;
	$_SESSION['timer'] = 11;
	$_SESSION['time'] = 1;
	unset($_SESSION['slovo']);
	unset($_SESSION['error']);

	$data = $_POST;
	if( isset($data['do_login']) )
	{
		$errors = array();
		$user = R::findOne('users', 'login = ?', array($data['login'])); //ищет совпадения
		if( $user )
		{
			if( password_verify($data['password'], $user->password) )
			{
				$_SESSION['logged_user'] = $user;
			} else
			{
				$errors[] = 'Неверно введен пароль!';
			}
		} else
		{
			$errors[] = 'Пользователь с таким логином не найден!';
		}
		if( ! empty($errors) )
		{

		}
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
  <title>Переведи за 3 секунды</title>
<style>
	Body {background: url(img/index.jpg) no-repeat; -webkit-background-size: 100%;
-o-background-size: 100%;
-moz-background-size: 100%;
-ms-background-size: 100%;
-khtml-background-size: 100%;
background-size: 100%;}
   .leftstr, .rightstr {
    float: left; /* Обтекание справа */
    width: 50%; /* Ширина текстового блока */
   }
   .rightstr {
    text-align: right; /* Выравнивание по правому краю */
   }
   .center {
    text-align: center; /* Выравнивание по правому краю */
    text-shadow: 1px 0 1px #000,
		0 1px 1px #000,
		-1px 0 1px #000,
		0 -1px 1px #000;
   }
   .container {
	margin-top: 25px;
	margin-left: 50px;
	width: 70%!important;
}
.form1 {
	background: #800080;
	border: 2px solid #800080;
	border-radius: 20px;
	padding: 10px 10px;
}
	.Ksusha {
		background: #FFFFFF;
		border: 10px solid #800080;
		border-radius: 20px;
		padding: 10px 10px;
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
	<div class="d-flex gap-5 justify-content-center">
	<h1 class="center" style="color:white; font-size: 30px; text-align:  center; margin-top: 10px">Переведи за 3 секунды</h1>
	<?php
if ($_SESSION['logged_user']->login == "admin") {
	?>
	<a href="/admin.php" style="font-size: 20px; color: white; margin-top: 15px" class="center">Администрирование</a>
	<?php
}
	?>
</div>
	<div class="d-flex gap-5 justify-content-center">
	<div class="container">
		<h1 style="font-size: 15px; text-align:  center; color: white" class="center">Выберите тему</h1>
		<form action="/add.php" method="post" id="form1" class="form1">
			<div>

<div class="list-group mx-0">
    <label class="list-group-item d-flex gap-2">
      <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="1" value="1" checked="">
      <span>
        Все темы
        <small class="d-block text-muted">Все перечисленные ниже темы будут присутствовать в игре</small>
      </span>
    </label>
    <label class="list-group-item d-flex gap-2">
      <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="2" value="2">
      <span>
        Информатика
        <small class="d-block text-muted">Компьютерное оборудование, программы - всё это и многое другое в теме информатика.</small>
      </span>
    </label>
    <label class="list-group-item d-flex gap-2">
      <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="3" value="3">
      <span>
        Кулинария
        <small class="d-block text-muted">Продукты питания, столовые приборы - всё это и многое другое в теме кулинария.</small>
      </span>
    </label>
    <label class="list-group-item d-flex gap-2">
      <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="4" value="4">
      <span>
        Дизайн
        <small class="d-block text-muted">Инструменты для рисования, 3D-моделированиe - всё это и многое другое в теме дизайн.</small>
      </span>
    </label>
    <label class="list-group-item d-flex gap-2">
      <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="5" value="5">
      <span>
        Путешествия
        <small class="d-block text-muted">Страны, транспорт, достопримечательности - всё это и многое другое в теме путешествия.</small>
      </span>
    </label>
    <label class="list-group-item d-flex gap-2">
      <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="6" value="6">
      <span>
        Разное
        <small class="d-block text-muted">Абсолютно разные слова, не связанные общей темой собраныe в теме разное.</small>
      </span>
    </label>
    <input type="hidden" name="lvl" class="form-control" value="0">
</div>
  </div>
	</div>
	<div class="container" style="margin-right: 50px">
		<h1 style="font-size: 15px; text-align:  center; color: white" class="center">Выберите сложность</h1>
<div class="form1">
		<label class="list-group-item d-flex gap-2">
      <input class="form-check-input flex-shrink-0" type="radio" name="sec" id="10" value="10" checked="">
      <span>
      	<div style="color: green" class="obvod">
        Лёгкая
        </div>
        <small class="d-block text-muted">У вас будет всего 10 секунд чтобы перевести слово, это будет легко.</small>
      </span>
    </label>
    <label class="list-group-item d-flex gap-2">
      <input class="form-check-input flex-shrink-0" type="radio" name="sec" id="5" value="5">
      <span>
        <div style="color: yellow" class="obvod">
        Нормальная
        </div>
        <small class="d-block text-muted">У вас будет всего 5 секунд чтобы перевести слово, сможете ли это сделать?</small>
      </span>
    </label>
    <label class="list-group-item d-flex gap-2">
      <input class="form-check-input flex-shrink-0" type="radio" name="sec" id="3" value="3">
      <span>
        <div style="color: red" class="obvod">
        Сложная
        </div>
        <small class="d-block text-muted">У вас будет всего 3 секунды чтобы перевести слово, у вас нет шансов.</small>
      </span>
    </label>
</div>
</form>
<br>
    <div class="d-flex gap-5 justify-content-center">
		<button  type="submit" form="form1" name="sendTask" class="btn btn-lg btn-secondary fw-bold border-black bg-white" style="color: purple">Начать игру!</button>
	</div>
	<br>

	<?php if(isset($_SESSION['logged_user'])) : ?>
		<div class="Ksusha">
	<h1 style="font-size: 25px; text-align:  center; color: green" class="center">Привет, <?php echo $_SESSION['logged_user']->login; ?></h1><hr>
	<div class="d-flex gap-5 justify-content-center">
      		<a href="/logout.php" style="font-size: 15px; color: red" class="center">Выйти из аккаунта</a></div></div><br>
<?php else : ?>
	<h1 style="font-size: 15px; text-align:  center; color: white" class="center">Аутентификация пользователя</h1>
		<h1 style="font-size: 10px; text-align:  center; color: white" class="center">(Необязательно)</h1>
<form action="/" method="post" id="form2">
			<div class="d-flex gap-2 justify-content-center">
			<input type="search" name="login" id="login" placeholder="Введите ваш никнейм" class="form-control" autocomplete="off" style="width: 67%; height: 70%" required>
			<a style="font-size: 15px;width: 29%; margin-top: 5px; color: white" href="/reg.php">Не зарегистрированы?</a>
		</div>
		<div class="d-flex gap-2 justify-content-center">
			<input type="password" name="password" id="password" placeholder="Пароль" class="form-control" style="width: 67%; height: 70%; margin-top: 5px" required>
		<button  type="submit" form="form2" name="do_login" class="btn btn-lg btn-secondary fw-bold border-black bg-green" style="font-size: 13px;width: 29%; height: 50%; margin-top: 4px">Войти</button>
		</div>
		<?php
		if ($errors == "") {
			?><br><?php
		}
		else
				echo '<div style="color: red; margin-left: 10px" class="obvod">'.array_shift($errors).'</div>';
		?>
<?php endif; ?>
    <div class="d-flex gap-5 justify-content-center">
      		<a href="/stata.php" style="font-size: 20px; color: white" class="center">Статистика</a>
      		</div>
</div>
</div>
</body>
</html>




