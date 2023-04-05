<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: login.php');
	} 
	if(isset($_GET['login'])){
 	$dangxuat = $_GET['login'];
	 }else{
	 	$dangxuat = '';
	 }
	 if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location: login.php');
	 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome Admin</title>
	<link href="style_admin.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<a style="text-decoration: none; color: red;" href="dashboard.php"><h1>TRANG ADMIN</h1></a>
	<div class="title">
	
	<p>Xin chào : <?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat" style="font-size: 16px;">Đăng xuất</a></p>
	</div>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link-danhmuc" href="xulydanhmuc.php">Quản Lý Danh mục</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link-danhmuc" href="xulysanpham.php">Quản Lý Sản phẩm</a>
	      </li>
		  <li class="nav-item">
	        <a class="nav-link-danhmuc" href="xulydonhang.php">Quản Lý Đơn hàng</a>
	      </li>
		  <li class="nav-item">
	        <a class="nav-link-danhmuc" href="xulybaiviet.php">Quản Lý Bài Viết</a>
	      </li>
	      
	    </ul>

	  </div>
	</nav>
</body>
</html>