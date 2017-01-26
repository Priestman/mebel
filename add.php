<?php

session_start();
include ("bd.php");

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
<h1>Добавить запись</h1>

<?php
print <<<HERE
<br><br>


	<form action='add.php' method='post'>
		<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="num_dog" type="text" required="required">
				<label class="input__label input__label--isao" for="input-38" data-content="Номер договора">
			<span class="input__label-content input__label-content--isao">Номер договора</span>
		</span>	
		<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="address" type="text" required="required">
				<label class="input__label input__label--isao" for="input-38" data-content="Адрес">
			<span class="input__label-content input__label-content--isao">Адрес</span>
		</span>
		<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="all_summ" type="text" required="required">
				<label class="input__label input__label--isao" for="input-38" data-content="Сумма">
			<span class="input__label-content input__label-content--isao">Сумма</span>
		</span>
		<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="rassroch" type="text" required="required">
				<label class="input__label input__label--isao" for="input-38" data-content="Рассрочка (мес.)">
			<span class="input__label-content input__label-content--isao">Рассрочка</span>
		</span>
		<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="first_pay" type="text" required="required">
				<label class="input__label input__label--isao" for="input-38" data-content="Первый платеж">
			<span class="input__label-content input__label-content--isao">Первый платеж</span>
		</span>
		<span class="input input--isao">
				<input class="input__field input__field--isao" id="input-38" name="comment" type="text">
				<label class="input__label input__label--isao" for="input-38" data-content="Комментарий">
			<span class="input__label-content input__label-content--isao">Комментарий</span>
		</span>
	<br><center>	
	<input type='submit' name='submit' value='Сохранить'></center>
	</form>

</center>
<br><br>

HERE;

  if ($_POST["submit"]) //Условие будет выполнено, если произведен POST-запрос к скрипту.
    { 
	
	$num_dog = $_POST['num_dog'];
	$address = $_POST['address'];	
	$all_summ = $_POST['all_summ'];
	$rassroch = $_POST['rassroch'];
	$first_pay = $_POST['first_pay'];
	$comment = $_POST['comment'];

	$sql1 = mysql_query ("INSERT INTO `table_data` (`num_dog`,`address`,`all_summ`,`rassroch`,`first_pay`,`comment`) VALUES ('$num_dog','$address','$all_summ','$rassroch','$first_pay','$comment')", $connect) or die ( "Error : ".mysql_error() );

		if ($sql1=='TRUE')

		{echo "<meta http-equiv='refresh' content='0.1; url=http://liiissj2.beget.tech/table.php'>"; }


	}
	

?>