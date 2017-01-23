<?php

session_start();
include ("bd.php");

if (isset($_GET['id'])) {$id =$_GET['id']; } //id "хоз¤ина" странички
else
{ exit("You sewed a page without an argument!");} //если не указали id, то выдаем ошибку
if (!preg_match("|^[\d]+$|", $id)) {
exit("<p>Invalid request format! Please check the URL</p>");//если id не число, то выдаем ошибку
}

$result = mysql_query("SELECT * FROM table_data WHERE id = '$id'",$db); 
$myrow = mysql_fetch_array($result);//»звлекаем все данные пользовател¤ с данным id

printf("$id");

?>
