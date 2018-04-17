<?php
    error_reporting(-1);
     include ('../lib/connect.php');
     include ('../template/google_maps_api.php');






 $mysqli = "SELECT * FROM account WHERE type = 4 LIMIT 5"; // LIMIT 5 значит что он переведет только 4 записи, это сделано потому что база большая и на опенсервере сайт зависает.
 // Чтобы перевести всю базу надо убрать LIMIT 5
$result = $mysqli->query($mysqli);

 $actor = $result->fetch_assoc();

 echo "<ul>\n";
 while ($actor = $result->fetch_assoc()) {
   $sql1 = "SELECT * FROM account WHERE  account_id = ".$actor['parrent'];  //Выбор улицы
  $result1 = $mysqli->query($sql1);
  $actor1 = $result1->fetch_assoc();
    $sql1 = "SELECT * FROM account WHERE  account_id = ".$actor1['parrent'];  //выбор города
  $result2 = $mysqli->query($sql1);
  $actor2 = $result2->fetch_assoc();
      $sql1 = "SELECT * FROM account WHERE  account_id = ".$actor2['parrent'];  //выбор страны
  $result3 = $mysqli->query($sql1);
  $actor3 = $result3->fetch_assoc();
  $name = $actor3['name'].' '.$actor2['name'].' '.$actor1['name'].' '.$actor['name'].'';
  $search = implode(', ', [$name]);

  $geoData = google_maps_search($search, $googleKey);  // вывод адреса
  if (!$geoData) {
      echo "Error: " . $id . "\n";
      exit;
  }

  $mapData = map_google_search_result($geoData); //прием координат

  $query = "INSERT INTO account_coordinates VALUES ('".$actor['account_id']."', '".$mapData['lat']."', '".$mapData['lng']."')";
$mysqli->query($query);
 }
 echo "</ul>\n";




$mysqli->close();
echo '<h1>finish procedure</h1>'; 
?>
