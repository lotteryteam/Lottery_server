<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

include 'conn.php';
include 'My.php';

if (isset($_GET['start']) && isset($_GET['end'])) {
  $start = $_GET['start'];
  $end = $_GET['end'];
  $url_prefix = "http://c.m.163.com/nc/article/headline/T1356600029035/";
  $url = $url_prefix.$start.'-'.$end.'.html';
  $html = file_get_contents($url);
  echo $html;
}
