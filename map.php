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
    	<h2>Введите координаты для проверки места</h2>
    	<h4>(Требуется подключение к сети Интернет)</h4>
    	<form name="fadd" id="fadd" method="POST" action="map.php">
            <table id="oborder" name="oborder">
<tr><td>Широта:</td><td> <input type="text" name="lat" /></td></tr>
<tr><td>Долгота:</td><td> <input type="text" name="lng" /></td></tr>
<tr><td>Масштаб:</td><td> <input type="text" name="zoom" /></td></tr>
</table><br>
    <input type="submit" value="Просмотр" name="map">
</form>
        <?php
        if(isset($_POST['lat']))
        {
        	$zoom=0;
            $lat=$_POST['lat'];
            $lng=$_POST['lng'];
            $zoom=$_POST['zoom'];
        
        ?>
    <?php    echo '<h3>Введенные данные</h3>
        
 <table id="tborder" name="tborder" border="2px">
<tr>     <td>Широта:</td> <td>'; echo $lat; echo'</td></tr>
<tr>     <td>Долгота:</td> <td>'; echo $lng; echo'</td></tr>
<tr>     <td>Масштаб:</td> <td>'; echo $zoom; echo'</td></tr>
 </table>';?>

    <br><br>

        


 <div id="map"></div>
    <script>
      function initMap() {
        <?php
        if(($zoom==NULL)||($zoom==0))
          $zoom=15;
        ?>
        var uluru = {lat: <? echo $lat; ?>, lng: <? echo $lng; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: <? echo $zoom; ?>,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAENKGpbOI9KaivcTR-MSobwnq9Fh83VDc&callback=initMap">
    </script>
    <?php }?>
    <br><br><br>
        </div>
</div>
  </body>
</html>
<!-- https://maps.googleapis.com/maps/api/geocode/json?address=Новосибирск+свечникова+4/1&key=AIzaSyAENKGpbOI9KaivcTR-MSobwnq9Fh83VDc -->