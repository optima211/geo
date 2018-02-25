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
      <h2>Введите данные удаляемого в базе</h2>
      <form name="fadd" id="fadd" method="POST" action="delete.php">
            <table id="oborder" name="oborder">
<tr><td>Номер <br> удаляемого <br> объекта:</td><td> <input type="text" name="account_id"/></td></tr> 
</table><br>
    <input type="submit" value="Удалить" name="add">
</form>
        <?php
        if(isset($_POST['account_id']))
        {
            $account_id=$_POST['account_id'];
            $query = "DELETE FROM `account` WHERE account_id='$account_id'"; 
            $res = mysql_query($query);
                        $querys = "DELETE FROM `geopoint` WHERE account_id='$account_id'"; 
            $res1 = mysql_query($querys);
 }
        ?>
    <br><br><br><br>
    </div>
</div>
</body>
</html>