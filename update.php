<?php
session_start();

include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
$login = $_SESSION['login'];
$password = $_SESSION['password'];

if (isset($_GET['id'])) { $id = $_GET['id'];

$result = mysql_query("SELECT * FROM table_data WHERE id = '$id'",$connect) or die ( mysql_error() );
$myrow = mysql_fetch_array($result);//»звлекаем все данные пользовател¤ с данным id

$old_num_dog = $myrow['num_dog'];


if(isset($_POST["new_num_dog"])){ 

$new_num_dog = $_POST["new_num_dog"]; 
$result2 = mysql_query("UPDATE table_data SET num_dog='$new_num_dog' WHERE id='$id'",$connect) or die ( mysql_error() );
 if ($result2=='TRUE') {
	echo "<meta http-equiv='refresh' content='0.1; url=http://liiissj2.beget.tech/table.php'>"; }
	else { echo "ошибка";}
}

if(isset($_POST["new_address"])){ $new_address = $_POST["new_address"]; 

 $result2 = mysql_query("UPDATE `table_data` SET `address` = '$new_address' WHERE `table_data`.`id` = '$id'",$connect) or die ( mysql_error() );
if ($result2=='TRUE') {
	echo "<meta http-equiv='refresh' content='0.1; url=http://liiissj2.beget.tech/table.php'>"; }
}


if(isset($_POST["new_all_summ"])){ $new_all_summ = $_POST["new_all_summ"]; 
 $result2 = mysql_query("UPDATE `table_data` SET `all_summ` = '$new_all_summ' WHERE `table_data`.`id` = '$id'",$connect) or die ( mysql_error() );
if ($result2=='TRUE') {
	echo "<meta http-equiv='refresh' content='0.1; url=http://liiissj2.beget.tech/table.php'>"; }
}


if(isset($_POST["new_rassrosh"])){ $new_rassrosh = $_POST["new_rassrosh"]; 
 $result2 = mysql_query("UPDATE `table_data` SET `rassroch` = '$new_rassrosh' WHERE `table_data`.`id` = '$id'",$connect) or die ( mysql_error() );
 if ($result2=='TRUE') {
	echo "<meta http-equiv='refresh' content='0.1; url=http://liiissj2.beget.tech/table.php'>"; }
}


if(isset($_POST["new_first_pay"])){ $new_first_pay = $_POST["new_first_pay"]; 
 $result2 = mysql_query("UPDATE `table_data` SET `first_pay` = '$new_first_pay' WHERE `table_data`.`id` = '$id'",$connect) or die ( mysql_error() );
 if ($result2=='TRUE') {
	echo "<meta http-equiv='refresh' content='0.1; url=http://liiissj2.beget.tech/table.php'>"; }
}


if(isset($_POST["new_comment"])){ $new_comment = $_POST["new_comment"]; 
 $result2 = mysql_query("UPDATE `table_data` SET `comment` = '$new_comment' WHERE `table_data`.`id` = '$id'",$connect) or die ( mysql_error() );
 if ($result2=='TRUE') {
	echo "<meta http-equiv='refresh' content='0.1; url=http://liiissj2.beget.tech/table.php'>"; }
}

}

?> 