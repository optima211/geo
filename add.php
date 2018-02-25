<?php
error_reporting(-1);
?>
<!DOCTYPE html>
<html>
<head>
    <link href="/css/menu.css" rel="stylesheet">
    <link href="/css/table.css" rel="stylesheet">
    <?php
    
     include ('./lib/connect.php');
    // include ('./lib/config.inc.php');
     
    ?>
</head>
<body>
    <div name="bol" id="bol">
 <?php   include ("template/menu.php");?>
    <div name="conten" id="content">
    	<br><br>
    	<h2>Введите данные для вставки в базу</h2>
    	<form name="fadd" id="fadd" method="POST" action="add.php">
            <table id="oborder" name="oborder">
<tr><td>Название:</td><td> <input type="text" name="name"/></td></tr> 
<tr><td>Тип:</td><td><select name="type" >
      <option value="1">Страна </option>
      <option value="2">Город </option>
      <option value="3">Улица </option>
      <option value="4">Дом </option>
      <option value="5">Квартира </option>
      <option value="6">Служебное помещение </option>
  </select></td></tr>
<tr><td>Комментарий:</td><td> <input type="text" name="comment" /></td></tr>
<tr><td>Владелец (название):</td><td> <input type="text" name="owner" /></td></tr>
<tr><td>Статус установки:</td><td><select name="account_state" >
      <option value="0">не установлен </option>
      <option value="1">введен в эксплуатацию </option>
  </select></td></tr>
<tr><td>Широта:</td><td> <input type="text" name="lat" /></td></tr>
<tr><td>Долгота:</td><td> <input type="text" name="lng" /></td></tr>
<!-- <tr><td>Масштаб:</td><td> <input type="text" name="zoom" /></td></tr> -->
</table><br>
    <input type="submit" value="Добавить" name="add">
</form>
        <?php
        if(isset($_POST['name']))
        {

            $name=$_POST['name'];
            $type=$_POST['type'];
            $comment=$_POST['comment'];
            $owner=$_POST['owner'];
            $lat=$_POST['lat'];
            $lng=$_POST['lng'];
            // $zoom=$_POST['zoom'];
            $account_state=$_POST['account_state'];



$res1 = "INSERT INTO `account` SET name='$name', type='$type', comment='$comment', owner='$owner'";
$res2 = "INSERT INTO `geopoint` SET lat='$lat', lng='$lng' ";
 
$insert1 = mysql_query($res1); //сохраняем таблицу 1
$insert2 = mysql_query($res2); //сохраняем таблицу 2
 
$proverka1 = $insert1 == true ? 'Данные, успешно Сохранены в таблицу 1...' : 'Произошла Ошибка... Данные не были сохранены.' ; 
$proverka2 = $insert2 == true ? 'Данные, успешно Сохранены в таблицу 2...' : 'Произошла Ошибка... Данные не были сохранены.' ; 
 
$proverk = $proverka1 == $proverka2 ? true : false ;
 
if(!$proverk){
	// если сохранились в обе
	//echo 'uspeh';
	///////////

}else{
	// если сохранились не в обе удаляем
//mysql_query("DELETE FROM `account` WHERE id='$id' LIMIT 1");
//mysql_query("DELETE FROM `geopoint` WHERE id='$id' LIMIT 1");
 // print "не все прошло успешно";
}


























//                 $result = mysql_query("INSERT INTO account (type,name,comment,owner,account_state) VALUES ('".$type."','".$name."','".$comment."','".$owner."','".$account_state."')");
// if ($result == 'true')
// {
// echo "Запись добавлена успешно-1!";
// }
// else
// {
// echo "Запись не добавлена-1!";
// }
      

//                 $results = mysql_query("INSERT INTO geopoint (lat,lng) VALUES ('".$lat."','".$lng."')");
//                 if ($results == 'true')
// {
// echo "Запись добавлена успешно-2!";
// }
// else
// {
// echo "Запись не добавлена-2!";
// }

        // header('Location:http://geo/general.php/'); //подключаем шаблон
      

  

           



                }
        ?>


    <br><br><br><br>

        
    </div>
</div>
</body>
</html>