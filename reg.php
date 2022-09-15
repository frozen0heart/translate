<?php
  require "configDB.php";

  $data = $_POST;
  if( isset($data['do_signup']) )
  {

    $errors = array();
    if ( $data['password_2'] != $data['password'] )
    {
      $errors[] = 'Повторный пароль введен не верно!';
    }
    if ( R::count('users', "login = ?", array($data['login']) ) > 0)
    {
      $errors[] = 'Пользователь с такиим логином уже существует';
    }



    if( empty($errors) )
    {
      $user = R::dispense('users');
      $user->login = $data['login'];
      $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
      R::store($user);

      header('Location: /');


    } else
    {
      echo '<div style="color: red;">'.array_shift($errors).'</div>';
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
  <title>Регистрация</title>
<style>
	Body {background: url(img/reg.jpg) no-repeat; -webkit-background-size: 100%;
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
	margin-top: 70px;
	width: 40%!important;
}
form {
	background: #ffffff;
	border: 8px solid #800080;
	border-radius: 20px;
	padding: 10px 10px;
}
  </style>
</head>
<body>
    <div class="container">
  <h1 style="color: white" class="center">Регистрация</h1>
    <form action="/reg.php" method="post">
      <input type="text" name="login" id="login" placeholder="Придумайте логин" class="form-control" style="margin-top: 5px" autofocus="true" autocomplete="off" minlength="2" maxlength="22" required>
      <input type="password" name="password" id="password" placeholder="Придумайте пароль" class="form-control" style="margin-top: 5px" minlength="6" required>
      <input type="password" name="password_2" id="password_2" placeholder="Повторите пароль" class="form-control" style="margin-top: 5px" minlength="6" required>
      <br>
      <div class="d-flex gap-5 justify-content-center">
      <button  type="submit" name="do_signup" class="btn btn-success">Зарегистрироваться</button>
      <a href="/" style="font-size: 16px; color: black; margin-top: 8px" class="obvod">На главную</a>
      </div>
    </form>