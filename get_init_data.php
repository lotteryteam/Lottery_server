<?php
// 允许跨域访问
header("Access-Control-Allow-Origin: *");

// include 'conn.php';
include 'My.php';

$db_host = 'localhost';
$db_name = 'mydb';
$db_user = 'root';
$db_pwd = 'hpidc@126';

if (isset($_GET["appid"]) && isset($_GET["type"])) {
  //面向对象方式
  // $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
  $appid = $_GET["appid"];
  $type = $_GET["type"];

  $dbConnection = new PDO('mysql:dbname=mydb;host=127.0.0.1;charset=utf8', $db_user, $db_pwd);

  $dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $dbConnection->prepare('SELECT * FROM lottery WHERE appid = :appid and type = :type');
  $stmt->execute(array(':appid' => $appid, ':type' => $type));
  foreach ($stmt as $row) {
    // do something with $row
    MySuccess3($row, 200);
  }

  MyError(101, 201);

} else {
  MyError(100, 201);
}
