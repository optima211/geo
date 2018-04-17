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
<tr><td>Владелец (номер):</td><td> <input type="number" name="parrent" /></td></tr>
<tr><td>Владелец (название):</td><td> <input type="text" name="owner" /></td></tr>
<tr><td>Статус установки:</td><td><select name="account_state" >
      <option value="0">не установлен </option>
      <option value="1">введен в эксплуатацию </option>
  </select></td></tr>
<!-- <tr><td>Широта:</td><td> <input type="number" name="lat" /></td></tr>
<tr><td>Долгота:</td><td> <input type="number" name="lng" /></td></tr>
 --></table><br>
    <input type="submit" value="Добавить" name="add">
</form>
        <?php
        if(isset($_POST['name']))
        {
            $name=$_POST['name'];
            $type=$_POST['type'];
            $comment=$_POST['comment'];
            $parrent=$_POST['parrent'];
            $owner=$_POST['owner'];
            $account_state=$_POST['account_state'];
            //$lat=$_POST['lat'];
          //  $lng=$_POST['lng'];
$res1 = "INSERT INTO `account` SET name='$name', type='$type', parrent='$parrent', comment='$comment', owner='$owner', account_state='$account_state'";
//$res2 = "INSERT INTO `geopoint` SET lat='$lat', lng='$lng' ";
$insert1 = $mysqli->query($res1); //сохраняем таблицу 1
//$insert2 = $mysqli->query($res2); //сохраняем таблицу 2
                }
        ?>
    <br><br><br><br>
    </div>
</div>
</body>
</html>