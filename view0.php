<!DOCTYPE html>
<html>
<head>
    <link href="/css/menu.css" rel="stylesheet">
    <link href="/css/table.css" rel="stylesheet">
    <?php
    error_reporting(-1);
     include ('./lib/connect.php');
    ?>
</head>
<body>
    <div name="bol" id="bol">
    <?php	include ("template/menu.php");?>
    <div name="content" id="content">
    	<br><br>
    	<!-- <h1>Добро пожаловать</h1> -->
    	<h2>Введите данные для поиска</h2>
    	<form name="fmenu" id="fadd" method="POST" action="view.php">
Название фирмы: <input type="text" name="name" /><br><br>
    <input type="submit" value="Искать"> <br><br>
</form>
        <?php
        if(isset($_POST['name'])){
        	$name=$_POST['name'];
$account = $link->query("SELECT * FROM account where name = '$name'")->fetch_assoc();
$account_id = $account['account_id'];
$type = $account['type'];
$owner = $account['owner'];
$comment = $account['comment'];
$account_state = $account['account_state'];
$geopoint = $link->query("SELECT * FROM geopoint where account_id = '$account_id'")->fetch_assoc();
$lat = $geopoint['lat'];
$lng = $geopoint['lng'];
$zoom = 0;
if(($account_id==0)||($account_id==NULL)){
  echo'<h4>Введено неверное имя</h4>';
}
else{
 echo '<h2>Информация о компании</h2>
 <table id="tborder" name="tborder" border="2px">
 <tr><td>Номер в базе</td> <td>'; echo $account_id; echo'</td></tr>
 <tr> <td>Тип</td> <td>'; if($type==1){echo 'Страна';} if($type==2){echo 'Город';} if($type==3){echo 'Улица';} if($type==4){echo 'Дом';} if($type==5){echo 'Квартира';} if($type==6){echo 'Служебное помещение';} echo'</td></tr>
  <tr>	 <td>Название фирмы:</td> <td>'; echo $name; echo'</td></tr>
  <tr>	 <td>Комментарий:</td> <td>'; echo $comment; echo'</td></tr>
  <tr> <td>Владелец:</td> <td>'; echo $owner; echo'</td></tr>
 <tr>   <td>Статус:</td> <td>'; if($account_state==0){echo 'не установлен';} if($account_state==1) {echo 'введен в эксплуатацию';} echo'</td></tr>
<tr>	 <td>Широта:</td> <td>'; echo $lat; echo'</td></tr>
<tr>	 <td>Долгота:</td> <td>'; echo $lng; echo'</td></tr>
 </table><br><br>';?>
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
          <?php  }}
        ?>
    </div>
</div>
</body>
</html>