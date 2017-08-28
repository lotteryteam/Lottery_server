<?php
// 允许跨域访问
header("Access-Control-Allow-Origin: *");

include 'conn.php';
include 'My.php';

function check_input($value)
{
  // 去除斜杠
  if (get_magic_quotes_gpc())
    {
    $value = stripslashes($value);
    }
  // 如果不是数字则加引号
  if (!is_numeric($value))
    {
    $value = "'" . mysql_real_escape_string($value) . "'";
    }
  return $value;
}

if (isset($_GET["appid"]) && isset($_GET["type"])) {
  $appid = check_input($_GET["appid"]);
  $type = check_input($_GET["type"]);

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
