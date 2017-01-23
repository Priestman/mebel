<?php

session_start();

include ("bd.php");

if (!empty($_SESSION['login']) and !empty($_SESSION['password']))
{

$login = $_SESSION['login'];
$password = $_SESSION['password'];
$result2 = mysql_query("SELECT id FROM users WHERE login='$login' AND password='$password' ",$connect); 
$myrow2 = mysql_fetch_array($result2); 
if (empty($myrow2['id']))
   {
   
    exit("Entrance to this page is allowed only for registered users!");
   }
}
else {

exit("Entrance to this page is allowed only for registered users!"); }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Harrix.org - Таблицы CSS</title>
	<link rel="stylesheet" href="css/table.css" type="text/css"  />
	<link rel="stylesheet" href="/css/font-awesome.min.css">

</head>

<body>
<style>
ul {
  list-style: none; /*убираем маркеры списка*/
  margin: 0; /*убираем отступы*/
  padding-left: 0; /*убираем отступы*/
  margin-top:25px; /*делаем отступ сверху*/
  /*background:#ededed; /*добавляем фон всему меню*/
  height: 40px; /*задаем высоту*/
}
a {
  text-decoration: none; /*убираем подчеркивание текста ссылок*/
  /*background:#ededed; /*добавляем фон к пункту меню*/
  color:#000; /*меняем цвет ссылок*/
  padding:0px 15px; /*добавляем отступ*/
  font-family: arial; /*меняем шрифт*/
  line-height:20px; /*ровняем меню по вертикали*/
  display: block; 
  /*border-right: 1px solid #ededed; /*добавляем бордюр справа*/
  -moz-transition: all 0.3s 0.01s ease; /*делаем плавный переход*/
  -o-transition: all 0.3s 0.01s ease;
  -webkit-transition: all 0.3s 0.01s ease;
}
a:hover {
  /*background:#BEBEBE;/*добавляем эффект при наведении*/
}
li {
  float:right; /*Размещаем список горизонтально для реализации меню*/
  position:relative; /*задаем позицию для позиционирования*/
}
</style>
    <ul>
        <li><a href="quite.php">Выход</a></li>
        <li><a href="#">Изменить данные профиля</a>
        <li><a href="#">Главная</a></li>
    </ul>

<?php
require_once("bd.php");

$result = mysql_query("SELECT * FROM table_data",$connect) or die ( "Error : ".mysql_error() );

echo "<table class='simple-little-table' cellspacing='0'";
echo "<tr>
		<th>Номер договора</th>
		<th>Адрес</th>
		<th>Общая сумма</th>
		<th>Рассрочка (мес.)</th>
		<th>Первый платеж</th>
		<th>Комментарий</th>
		<th>Рассчет суммы по кол-ву мес.</th>
		<th>Действие</th>
	</tr>";

while ($row = mysql_fetch_array($result)){
$pole_id = $row['id'];
$pole0=$row['num_dog'];
$pole1=$row['address'];
$pole2=$row['all_summ'];
$pole3=$row['rassroch'];
$pole4=$row['first_pay'];
$pole5=$row['comment'];
$pole6=$pole2/$pole3;


if ($pole6 <= 0) {$pole6 = 'Оплачено';}

echo "	<tr>
		<td>$pole0</td>
		<td>$pole1</td>
		<td>$pole2</td>
		<td>$pole3</td>
		<td>$pole4</td>
		<td>$pole5</td>
		<td>$pole6</td>
		<td><a href = 'delete.php?id=$pole_id'>Удалить</a> <a href = 'edit.php?id=$pole_id'>Редактировать</a></td>
		</tr>";
}

// $query = " INSERT INTO table_data (rashet) VALUES ('$pole7')";
// $result2 = mysql_query($query) or die ( "Error : ".mysql_error() );

echo "</table>";
?>
<style>
input.button {
  color: #000; /* цвет текста */
  text-decoration: none; /* убирать подчёркивание у ссылок */
  user-select: none; /* убирать выделение текста */
  background: #ededed; /* фон кнопки */
  padding: .7em 1.5em; /* отступ от текста */
  outline: none; /* убирать контур в Mozilla */
} 
input.button:hover { background: rgb(232,95,76); } /* при наведении курсора мышки */
input.button:active { background: rgb(152,15,0); } /* при нажатии */
</style>
<form action='add.php' method='post'>
<div style="text-align: right; float:right;">
	<input type="submit" name="add" value="Добавить запись" class="button" />
	<br>
	<br>
</div>
</form>

</body>
</html>