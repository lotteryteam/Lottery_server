<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

include 'conn.php';
include 'My.php';

if (isset($_GET['caipiao'])) {
  $caipiao = $_GET['caipiao'];

  $url_prefix = "http://caipiao.163.com/t/awardlist.html?gameEn=";

    $url = $url_prefix.$caipiao;
    $html = file_get_contents($url);

    echo $html;
}
