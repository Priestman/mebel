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
    
<form name="login-form" class="login-form" action="register.php" method="post">

    <div class="header">
        <h1>Регистрация</h1>
        <span>Здесь вы можете добавить пользователя</span>
<span>
<?php
    require_once("bd.php");
 
    /* Проверяем если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные. Таким образом, мы застраховываемся от хостингов, которые не поддерживают глобальные переменные. */
 
    if(isset($_POST["name"])){ $name = $_POST["name"]; }
    if(isset($_POST["login"])){ $login = $_POST["login"]; }
    if(isset($_POST["mail"])){ $mail = md5($_POST["mail"]); }
    if(isset($_POST["password"])){ $password = md5($_POST["password"]); }
    if(isset($_POST["submit"])){ $submit = $_POST["submit"]; }
 
    /* Проверяем если была нажата кнопка зарегистрироваться. Если да, то вводим информацию в БД, иначе, значит что кнопка не была нажата, и пользователь зашел на страницу напрямую. Поэтому выводим ему сообщение об этом. */
    if(isset($submit)){

        $datet = date('Y-m-d H:i:s');
        /* Формируем запрос к БД для ввода данных */
        $query = " INSERT INTO users (name,login,mail,password,datet) VALUES ('$name','$login','$mail','$password','$datet')";
        $result = mysql_query($query) or die ( "Error : ".mysql_error() );
 
        // Если все нормально то выводим сообщение.
        if($result){
            echo 'Регистрация прошла успешно! <a href="index.php">Перейти на главную страницу.</a> ';
            exit();
        }
    }else{
        echo 'Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href="index.php"> главную страницу </a>';
    }
?>
</span>       
    </div>

    <div class="content">
        <input name="name" type="text" class="input username" value="Имя" onfocus="this.value=''" required="required"/>
        <input name="login" type="text" class="input username" value="Логин" onfocus="this.value=''" required="required"/>
        <input name="mail" type="text" class="input username" value="Почта" onfocus="this.value=''" required="required"/>
        <input name="password" type="password" class="input password" value="Пароль" onfocus="this.value=''" required="required"/>
       

    </div>

    <div class="footer">
        <input type="submit" name="submit" value="Добавить" class="button" />
        <a href="index.php" class="register">Назад</a>
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
