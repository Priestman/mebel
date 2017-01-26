<?php
    session_start();
    require_once("bd.php");
 
    // Проверяем если существуют данные в сессий.
    if(isset($_SESSION['login']) && isset($_SESSION['password']) ){
 
        // Вставляем данные из сессий в обычные переменные
        $l_username = $_SESSION['login'];
        $l_password = $_SESSION['password'];
 
        // Делаем запрос к БД для выбора данных.
        $query = " SELECT * FROM users WHERE username = '$login' AND password = '$password'";
        $result = mysql_query($query) or die ( "Error : ".mysql_error() );
 
        /* Проверяем, если в базе нет пользователей с такими данными, то выводим сообщение об ошибке */
        if(mysql_num_rows($result) < 1){
 
            echo "Вход доступен только авторизированным пользователям! Перейти на <a href='index.php'>главную страницу</a>";
 
        }else{
 
            /* Здесь пишите те функций, к которым имеет доступ авторизированный пользователь */
            echo "Дополнительные функций";
 
        }
 
    }else{
        echo "Вход доступен только авторизированным пользователям! Перейти на <a href='index.php'>главную страницу</a>";
    }
?>