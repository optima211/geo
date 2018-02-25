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
    	<h2>Введите данные изменения в базе</h2>
    	<form name="fadd" id="fadd" method="POST" action="update.php">
            <table id="oborder" name="oborder">
<tr><td>Номер <br> изменяемого <br> объекта:</td><td> <input type="text" name="account_id"/></td></tr> 
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
<tr><td>Владелец:</td><td> <input type="text" name="owner" /></td></tr>
<tr><td>Статус установки:</td><td><select name="account_state" >
      <option value="0">не установлен </option>
      <option value="1">введен в эксплуатацию </option>
  </select></td></tr>
<tr><td>Широта:</td><td> <input type="text" name="lat" /></td></tr>
<tr><td>Долгота:</td><td> <input type="text" name="lng" /></td></tr>
<!-- <tr><td>Масштаб:</td><td> <input type="text" name="zoom" /></td></tr> -->
</table><br>
    <input type="submit" value="Изменить" name="add">
</form>
        <?php
        if(isset($_POST['account_id']))
        {

            $account_id=$_POST['account_id'];
            $name=$_POST['name'];
            $type=$_POST['type'];
            $comment=$_POST['comment'];
            $owner=$_POST['owner'];
            $lat=$_POST['lat'];
            $lng=$_POST['lng'];
            $account_state=$_POST['account_state'];
          
            // $result = mysql_query ("UPDATE account SET name='$name', type='$type', comment='$comment', owner='$owner', account_state='$account_state' WHERE account_id='$account_id'");
            // if ($result == 'true')
            //   {
            //     echo "<h4>Данные успешно обновлены-1.</h4>";
            //   }
            // else
            //   {
            //     echo "<h4>Данные не обновлены-1!</h4>";
            //   }
            // $result = mysql_query ("UPDATE geopoint SET lat='$lat', lng='$lng' WHERE account_id='$account_id'");
            // if ($result == 'true')
            //   {
            //     echo "<h4>Данные успешно обновлены-2.</h4>";
            //   }
            // else
            //   {
            //     echo "<h4>Данные не обновлены-2!</h4>";
            //   }


$res1 = "UPDATE account SET name='$name', type='$type', comment='$comment', owner='$owner', account_state='$account_state' WHERE account_id='$account_id'";
$res2 = "UPDATE geopoint SET lat='$lat', lng='$lng' WHERE account_id='$account_id'";
 
$insert1 = mysql_query($res1); //сохраняем таблицу 1
$insert2 = mysql_query($res2); //сохраняем таблицу 2
 
$proverka1 = $insert1 == true ? 'Данные, успешно Сохранены в таблицу 1...' : 'Произошла Ошибка... Данные не были сохранены.' ; 
$proverka2 = $insert2 == true ? 'Данные, успешно Сохранены в таблицу 2...' : 'Произошла Ошибка... Данные не были сохранены.' ; 
 
$proverk = $proverka1 == $proverka2 ? true : false ;
 
if(!$proverk){
	// если сохранились в обе
	 // echo 'uspeh';
	///////////

}else{
	// если сохранились не в обе удаляем
//mysql_query("DELETE FROM `account` WHERE id='$id' LIMIT 1");
//mysql_query("DELETE FROM `geopoint` WHERE id='$id' LIMIT 1");
   // print "не все прошло успешно";
}




                }
        ?>


    <br><br><br><br>

        
    </div>
</div>
</body>
</html>