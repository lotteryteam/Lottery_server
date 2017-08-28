<?php
// 允许跨域访问
header("Access-Control-Allow-Origin: *");

include 'conn.php';
include 'My.php';

if (isset($_GET["appid"]) && isset($_GET["type"])) {
  $appid = $_GET["appid"];
  $type = $_GET["type"];

  $sql = "
    SELECT * FROM lottery WHERE appid = '$appid' and type = '$type'
  ";

  $result = mysql_query($sql);
  if ($result == false) {
      MyError(101, 201);
  }

  $row = mysql_fetch_assoc($result);
  if($row == "") {
    MyError(101, 201);
  }
  MySuccess($row, 200);

} else {
  MyError(100, 201);
}
