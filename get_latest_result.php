<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

include 'conn.php';
include 'My.php';

if (isset($_GET['caipiao'])) {
  $caipiao = $_GET['caipiao'];
  $caipiao_arr = explode(',', $caipiao);

  $url_prefix = "http://caipiao.163.com/t/awardlist.html?gameEn=";

  $arr_result = array();
  foreach ($caipiao_arr as $value) {
    $url = $url_prefix.$value;
    // echo $url;
    $html = file_get_contents($url);
    // echo $html;
    $obj = json_decode($html);
    $obj_arr = object_array($obj);

    // $arr_single = array();
    // $arr_single["list"] = $obj_arr["list"][0];

    // echo json_encode($arr_single);
    // print_r($arr_single);
    $arr_result[$value] = $obj_arr["list"][0];
  }

  echo json_encode($arr_result);
  // MySuccess2($arr_result, 200);
}
