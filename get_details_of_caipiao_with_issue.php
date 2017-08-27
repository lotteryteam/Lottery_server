<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

include 'conn.php';
include 'My.php';
require 'simple_html_dom.php';

if (isset($_GET['code']) && isset($_GET['issue'])) {
  $code = $_GET['code'];
  $issue = $_GET['issue'];

  $url_prefix = "http://caipiao.163.com/t/award/";

  $url = $url_prefix.$code.'/'.$issue.'.html';

  // 初始化一个 cURL 对象
  $curl = curl_init();
  // 设置你需要抓取的URL
  curl_setopt($curl, CURLOPT_URL, $url);
  // 设置header 响应头是否输出
  // curl_setopt($curl, CURLOPT_HEADER, 1);
  // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
  // 1如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  // 运行cURL，请求网页
  $data = curl_exec($curl);
  // 关闭URL请求
  curl_close($curl);
  // 显示获得的数据
  // print_r($data);
  // echo $data;
  // //
  // // echo $html;

  $html = new simple_html_dom();
  $html->load((string)$data);
  foreach($html ->find('header') as $item) {
    $item->outertext = '';
  }

  foreach ($html ->find('nav[class=detailNav]') as $item) {
    # code...
    $item->outertext = '';
  }

  foreach ($html ->find('section[class=bottomBox]') as $item) {
    # code...
    $item->outertext = '';
  }
  $html->save();
  echo $html;
}
