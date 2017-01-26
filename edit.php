<?php

session_start();
include ("bd.php");

if (isset($_GET['id'])) {$id =$_GET['id']; $pole_id = $id;} //id "хоз¤ина" странички
else
{ exit("You sewed a page without an argument!");} //если не указали id, то выдаем ошибку
if (!preg_match("|^[\d]+$|", $id)) {
exit("<p>Invalid request format! Please check the URL</p>");//если id не число, то выдаем ошибку
}

if (!empty($_SESSION['login']) and !empty($_SESSION['password']))
{

$login = $_SESSION['login'];
$password = $_SESSION['password'];
$result2 = mysql_query("SELECT * FROM users WHERE login='$login' AND password='$password' ",$connect); 
$myrow2 = mysql_fetch_array($result2); 
if (empty($myrow2['id']))
   {
   
    exit("Entrance to this page is allowed only for registered users!");
   }
}
else {

exit("Entrance to this page is allowed only for registered users!"); }

$result = mysql_query("SELECT * FROM `table_data` WHERE `id` = '$id'",$connect) or die ( mysql_error() );
$myrow = mysql_fetch_array($result);//»звлекаем все данные пользовател¤ с данным id

$result2 = mysql_query("SELECT * FROM `users` WHERE `login` = '$login'",$connect) or die ( mysql_error() );
$myrow2 = mysql_fetch_array($result2);//»звлекаем все данные пользовател¤ с данным id



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Редактировать</title>
	<link rel="stylesheet" href="css/table.css" type="text/css"  />
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />

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
<style>

input.button {
  color: #000; /* цвет текста */
  text-decoration: none; /* убирать подчёркивание у ссылок */
  user-select: none; /* убирать выделение текста */
  background: #ededed; /* фон кнопки */
  padding: .7em 1.5em; /* отступ от текста */
  outline: none; /* убирать контур в Mozilla */
} 
input.button:hover { background: #4cbb17; } /* при наведении курсора мышки */
input.button:active { background: #03c03c; } /* при нажатии */
</style>



</head>
<body>
    <ul>
        <li><a href="quite.php">Выход</a></li>
        <li><?php echo $myrow2['name']; ?></li>
        <li><a href='table.php'>Назад</a></li>
    </ul>
<center>
<h1>Редактирование</h1>
<h2>(незаполненные поля остануться без изменений)</h2>

<?php
print <<<HERE
<br><br>


		<form action='update.php?id=$pole_id' method='post'>
			<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="new_num_dog" type="text" placeholder = "$myrow[num_dog]">
				<label class="input__label input__label--isao" for="input-38" data-content="Номер договора">
			<span class="input__label-content input__label-content--isao">Номер договора</span>
			<input type='submit' name='submit' value='Сохранить'>
			</span>
		</form>

		<form action='update.php?id=$pole_id' method='post'>	
		<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="new_address" type="text" placeholder = "$myrow[address]">
				<label class="input__label input__label--isao" for="input-38" data-content="Адрес">
			<span class="input__label-content input__label-content--isao">Адрес</span>
			<input type='submit' name='submit' value='Сохранить'>
			</span>
		</form>

		<form action='update.php?id=$pole_id' method='post'>	
		<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="new_all_summ" type="text" placeholder = "$myrow[all_summ]">
				<label class="input__label input__label--isao" for="input-38" data-content="Сумма">
			<span class="input__label-content input__label-content--isao">Сумма</span>
			<input type='submit' name='submit' value='Сохранить'>
			</span>
		</form>

		<form action='update.php?id=$pole_id' method='post'>	
		<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="new_rassrosh" type="text" placeholder = "$myrow[rassroch]">
				<label class="input__label input__label--isao" for="input-38" data-content="Рассрочка (мес.)">
			<span class="input__label-content input__label-content--isao">Рассрочка</span>
			<input type='submit' name='submit' value='Сохранить'>
			</span>
		</form>

		<form action='update.php?id=$pole_id' method='post'>	
		<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="new_first_pay" type="text" placeholder = "$myrow[first_pay]">
				<label class="input__label input__label--isao" for="input-38" data-content="Первый платеж">
			<span class="input__label-content input__label-content--isao">Первый платеж</span>
			<input type='submit' name='submit' value='Сохранить'>
			</span>
		</form>

		<form action='update.php?id=$pole_id' method='post'>	
		<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="new_comment" type="text" placeholder = "$myrow[comment]">
				<label class="input__label input__label--isao" for="input-38" data-content="Комментарий">
			<span class="input__label-content input__label-content--isao">Комментарий</span>
			<input type='submit' name='submit' value='Сохранить'>
			</span>
		</form>

</center>
<br><br>

HERE;
?>
</body>
</html>