<?php
    $server = "localhost"; /* имя хоста (уточняется у провайдера), если работаем на локльном сервере то указываем localhost */
    $database = "liiissj2_data"; /* Имя базы данных, которую создали */
    $username = "liiissj2_data"; /* Имя пользователя БД */
    $password = "Koaffizient8"; /* Пароль пользователя, если у пользователя нет пароля то, оставляем пустым */
 
    // Подключение к серверу MySQL
    $connect = mysql_connect($server,$username,$password) or die ( mysql_error() );
     
    // Выбираем базу данных к которой хотим подключится
    mysql_select_db($database, $connect);
 
?>
