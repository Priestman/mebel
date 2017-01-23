<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Элиза</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
    <link rel="icon" href="#" type="image/x-icon">
    <link rel="shortcut icon" href="#" type="image/x-icon">
</head>

<body>

<div id="wrapper">
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    
<form name="login-form" class="login-form" action="index.php" method="post">

    <div class="header">
        <h1>Авторизация</h1>
        <span>Введите логин и пароль</span>
 <span>
<?php
    session_start();
    require_once("bd.php");
 
    if(isset($_POST["login"])){ $login = $_POST["login"]; }
    if(isset($_POST["password"])){ $password = $_POST["password"]; }
    if(isset($_POST["submit"])){ $submit = $_POST["submit"]; }
 
    /* Проверяем если была нажата кнопка Войти. Если да, то сравниваем данные полученные из формы с тем логином и паролем который есть в БД и если они совпадаю то пользователь успешно авторизирован, иначе, выводим сообщение что неправильный логин или пароль. Если кнопка не была нажата, значит что пользователь зашел на страницу напрямую и поэтому выводим ему сообщение об этом. */
    if(isset($submit)){
        $password = md5($password);
        // делаем запрос к БД для выбора данных.
        $query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
        $result = mysql_query($query) or die ( "Error : ".mysql_error() );
 
        /* Проверяем, если в базе нет пользователей с такими данными, то выводим сообщение об ошибке */
 
        if(mysql_num_rows($result) < 1){
 
            echo "Неправильный логин или пароль. Нажмите <a href='index.php'>здесь</a> для того чтобы перейти на страницу авторизации";
 
        }else{
             
            // Если введенные данные совпадают с данными из базы, то сохраняем логин и пароль в массив сессий.
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
 
            // Выводим сообщение
            echo '<meta http-equiv="refresh" content="0.1; url=http://liiissj2.beget.tech/table.php">';
        }
 
    }else{
 
        echo "Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете возвращаться на <a href='index.php'> главную страницу </a>";
 
    }
?>
</span>      
    </div>

    <div class="content">
        <input name="login" type="text" class="input username" value="Логин" onfocus="this.value=''" required="required"/>
        <input name="password" type="password" class="input password" value="Пароль" onfocus="this.value=''" required="required"/>
    </div>

    <div class="footer">
        <input type="submit" name="submit" value="ВОЙТИ" class="button" />
        <a href="register.php" class="register">Настройки</a>
    </div>

</form>

</div>
<div class="gradient"></div>

<script type="text/javascript">
$(document).ready(function() {
    $(".username").focus(function() {
        $(".user-icon").css("left","-48px");
    });
    $(".username").blur(function() {
        $(".user-icon").css("left","0px");
    });
    
    $(".password").focus(function() {
        $(".pass-icon").css("left","-48px");
    });
    $(".password").blur(function() {
        $(".pass-icon").css("left","0px");
    });
});
</script>
</body>

</html>