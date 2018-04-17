<?php
  //  error_reporting(-1);
     include ('./lib/connect.php');

function google_maps_search($address, $key = '')
{
    $url = sprintf('https://maps.googleapis.com/maps/api/geocode/json?address=%s&key=%s', urlencode($address), urlencode($key));
    $response = file_get_contents($url);
    $data = json_decode($response, 'true');
    return $data;
}

function map_google_search_result($geo)
{
    if (empty($geo['status']) || $geo['status'] != 'OK' || empty($geo['results'][0])) {
        return null;
    }
    $data = $geo['results'][0];
    $postalcode = '';
    foreach ($data['address_components'] as $comp) {
        if (!empty($comp['types'][0]) && ($comp['types'][0] == 'postal_code')) {
            $postalcode = $comp['long_name'];
            break;
        }
    }
    $location = $data['geometry']['location'];
    $formatAddress = !empty($data['formated_address']) ? $data['formated_address'] : null;
    $placeId = !empty($data['place_id']) ? $data['place_id'] : null;

    $result = [
        'lat' => $location['lat'],
        'lng' => $location['lng'],
        'postal_code' => $postalcode,
        'formated_address' => $formatAddress,
        'place_id' => $placeId,
    ];
    return $result;
}




 $sql = "SELECT * FROM account WHERE type = 4 LIMIT 5"; // LIMIT 5 значит что он переведет только 4 записи, это сделано потому что база большая и на опенсервере сайт зависает.
 // Чтобы перевести всю базу надо убрать LIMIT 5
$result = $mysqli->query($sql);

 $actor = $result->fetch_assoc();

 echo "<ul>\n";
 while ($actor = $result->fetch_assoc()) {
   $sql1 = "SELECT * FROM account WHERE  account_id = ".$actor['parrent'];
  $result1 = $mysqli->query($sql1);
  $actor1 = $result1->fetch_assoc();
    $sql1 = "SELECT * FROM account WHERE  account_id = ".$actor1['parrent'];
  $result2 = $mysqli->query($sql1);
  $actor2 = $result2->fetch_assoc();
  $name = $actor2['name'].$actor1['name'].' '.$actor['name'].'';
  $search = implode(', ', [$name]);

  $geoData = google_maps_search($search, $googleKey);
  if (!$geoData) {
      echo "Error: " . $id . "\n";
      exit;
  }

  $mapData = map_google_search_result($geoData);

  $query = "INSERT INTO account_coordinates VALUES ('".$actor['account_id']."', '".$mapData['lat']."', '".$mapData['lng']."')";
$mysqli->query($query);
 }
 echo "</ul>\n";




$mysqli->close();
echo '<h1>finish procedure</h1>'; 
?>
