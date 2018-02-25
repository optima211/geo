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
    	<h2>Введите данные изменения в базе</h2>
    	<form name="fadd" id="fadd" method="POST" action="adres.php">
            <table id="oborder" name="oborder">
<tr><td>Страна:</td><td> <input type="text" name="country"/></td></tr> 
<tr><td>Город:</td><td> <input type="text" name="city"/></td></tr> 
<tr><td>Улица:</td><td> <input type="text" name="street" /></td></tr>
<tr><td>Дом:</td><td> <input type="text" name="house" /></td></tr>
</table><br>
    <input type="submit" value="Поиск" name="add">
</form>
        <?php
        if(isset($_POST['country']))
        {
            $country=$_POST['country'];
            $city=$_POST['city'];
            $street=$_POST['street'];
            $house=$_POST['house'];
        }
        ?>
    <br><br><br><br>
    </div>
</div>
</body>
</html>