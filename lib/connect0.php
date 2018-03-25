<?
include ('config.inc.php');
@mysql_connect(DB_SERVER, DB_USER, DB_PASS)
	or die ("Ошибка подключения к базе данных");
@mysql_select_db(DB_DATABASE);
$link = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE) or die('Could not connect: ' . mysql_error());
?>