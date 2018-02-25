<?
include ('config.inc.php');
@mysql_connect(DB_SERVER, DB_USER, DB_PASS)   // 127.0.0.1:3306
	or die ("Ошибка подключения к базе данных");
@mysql_select_db(DB_DATABASE);
$link = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE) or die('Could not connect: ' . mysql_error());
?>

<!-- <script type="text/javascript"> // connect to js
// include mysql module
var mysql = require('mysql');
 
// create a connection variable with the required details
var con = mysql.createConnection({
  host: <?php echo $host ?>,    // ip address of server running mysql
  user: <?php echo $username ?>,    // user name to your mysql database
  password: <?php echo $password ?>,    // corresponding password
  database: <?php echo $dbname ?> // use the specified database
});</script> -->