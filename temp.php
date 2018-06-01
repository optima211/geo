    <?php
    error_reporting(-1);
     include ('./lib/config.inc.php');
     $data= $_POST;
    ?>
<!DOCTYPE html>
<html>
<head>
    <link href="/css/menu.css" rel="stylesheet">
    <link href="/css/table.css" rel="stylesheet">
</head>
<body>
    <div name="bol" id="bol">
    <?php	include ("template/menu.php");?>
    <div name="content" id="content">
    	<br><br>
<?php
$link = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE) or die('Could not connect: ' . mysql_error());
 
$query = "SELECT `contracts`.`number` FROM `contracts`";
$result = mysqli_query($query);
$row = mysqli_fetch_array($result);
 
$ComboCode = '<select name="contract" size="1">';
foreach ($row as $Value)
$ComboCode .= '<option value="'.$Value.'">'.$Value.'</option>';
$ComboCode .= '</select>';

?>

    </div>
</div>
</body>
</html>