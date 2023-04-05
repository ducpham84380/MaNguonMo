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
     
<!-- copyright -->
<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>,  All Rights Reserved.<br>
						Distributed By - <a href="https://themewagon.com/">Themewagon</a>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>