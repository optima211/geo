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
    	<h2>Введите координаты для проверки места</h2>
    	<h4>(Требуется подключение к сети Интернет)</h4>
    	<form name="fadd" id="fadd" method="POST" action="maper.php">
            <table id="oborder" name="oborder">
<tr><td>Адрес1:</td><td> <input type="text" name="lat" /></td></tr>
<tr><td>Адрес2:</td><td> <input type="text" name="lng" /></td></tr>
<tr><td>Адрес3:</td><td> <input type="text" name="zoom" /></td></tr>
</table><br>
    <input type="submit" value="Просмотр" name="maper">
</form>
        <?php
        if(isset($_POST['lat']))
        {
        	$zoom=0;
            $lat=$_POST['lat'];
            $lng=$_POST['lng'];
            $zoom=$_POST['zoom'];
        ?>
    <?php    echo '<h3>Ваш адрес:</h3> <br><br>
        
'; echo $lat; echo'_'; echo $lng; echo'_'; echo $zoom; echo'</td></tr>
 </table>';?>
    <br><br>
<a href="https://maps.googleapis.com/maps/api/geocode/json?address=<?php echo $lat;?>+<?php echo $lng;?>+<?php echo $zoom;?>&key=AIzaSyAENKGpbOI9KaivcTR-MSobwnq9Fh83VDc" target="_blank">Ссылка будет открыта в новом окне</a>


    <?php }?>
    <br><br><br>
        </div>
</div>
  </body>
</html>