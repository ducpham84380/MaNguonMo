<?php
session_start();
include_once('db/connect.php');
include ("include/header.php");   

if(isset($_GET['quanly'])){
  $tam = $_GET['quanly'];
}else{
  $tam = '';
}

if($tam=='danhmuc'){
  include('include/category.php');
}elseif($tam=='chitietsp'){
  include('include/chitietsp.php');
}elseif($tam=='cart') {
  include('include/cart.php');
}elseif ($tam=='search') {
  include('include/search.php');
}elseif ($tam=='login_khachhang') {
  include('include/login_khachhang.php');
}elseif ($tam=='register_khachhang') {
  include('include/register_khachhang.php');
}elseif ($tam=='list_news') {
  include('include/list_news.php');
}elseif ($tam=='detail_news') {
  include('include/detail_news.php');
}elseif ($tam=='lienhe') {
  include('include/lienhe.php');
}



else{
  include('include/home.php'); 
}

 
include ("include/footer.php");
?>
     
</body>
</html>