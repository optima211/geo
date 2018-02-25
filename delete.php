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

            // $result = mysql_query ("DELETE FROM account WHERE account_id='$account_id'");
            // if ($result == 'true')
            //   {
            //     echo "<h4>Данные успешно удалены-1.</h4>";
            //   }
            // else
            //   {
            //     echo "<h4>Данные не удалены-1!</h4>";
            //   }
            // $results = mysql_query ("DELETE FROM geopoint WHERE account_id='$account_id'");
            // if ($results == 'true')
            //   {
            //     echo "<h4>Данные успешно удалены-2.</h4>";
            //   }
            // else
            //   {
            //     echo "<h4>Данные не удалены-2!</h4>";
            //   }
                
                // mysqli_query("DELETE FROM `account` WHERE account_id='$account_id'");
                // mysqli_query("DELETE FROM `geopoint` WHERE account_id='$account_id'");
 // print "все прошло успешно";
            $query = "DELETE FROM `account` WHERE account_id='$account_id'"; 
            $res = mysql_query($query); 
            // $row = mysql_fetch_row($res);
                        $querys = "DELETE FROM `geopoint` WHERE account_id='$account_id'"; 
            $res1 = mysql_query($querys); 
            // $row = mysql_fetch_row($res);
 }
        ?>


    <br><br><br><br>

        
    </div>
</div>
</body>
</html>