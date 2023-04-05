<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>BDH EVENTS</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<h4 style="font-weight: bold; color: red">BDH EVENTS</h4>
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="index.php">TRANG CHỦ</a>
                <?php
                  $sql_category_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");
                  while ($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)){
                  ?>
                  <li><a href="?quanly=danhmuc&id=<?php echo $row_category_danhmuc['category_id'] ?>">
                  <?php echo $row_category_danhmuc['category_name'] ?></a>
                    
                    </li>
                    
                  <?php
                  }
                  ?>
							
				<li><a href="?quanly=list_news">TIN TỨC</a></li>
								</li>
                <li><a href="?quanly=lienhe">LIÊN HỆ</a></li>
								</li>
								<li>
								
									<div class="header-icons">
										<a class="shopping-cart" href="?quanly=cart"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
										<?php 
										if(isset($_SESSION['dangnhap_home'])){
										echo '<p style="color: red; ">'.$_SESSION['dangnhap_home'].'<a href="index.php?quanly=cart&dangxuat=1">  Đăng xuất</a></p>';
										}else{
										echo '';
										}
										?>
										<?php
										if(!isset($_SESSION['dangnhap_home'])){ 
										?>
										<a class="shopping-cart" href="?quanly=login_khachhang"><i class="fas fa-user"></i></a>
										<?php
										} 
										?>
									</div>
								</li>
							</ul>
						</nav>
						
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
  <!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Tìm Kiếm:</h3>
							<form class="form-inline" action="index.php?quanly=search" method="POST">
							<input type="text" class="search-text" name="search_product" placeholder="Searching...">
							<button type="submit" name="search_button">Tìm <i class="fas fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->