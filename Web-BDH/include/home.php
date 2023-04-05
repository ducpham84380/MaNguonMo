<!-- home page slider -->
<div class="homepage-slider">
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-1">
		
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Dịch Vụ Chất Lượng</p>
								<h1>Tổ Chức Tiệc Cưới</h1>
								<div class="hero-btns">
									<a href="?quanly=chitietsp&id=14" class="boxed-btn">Xem Dịch Vụ</a>
									<a href="?quanly=lienhe" class="bordered-btn">Liên Hệ</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Trải Nghiệm Tuyệt Vời!</p>
								<h1>Khai Trương Từng Bừng</h1>
								<div class="hero-btns">
									<a href="?quanly=chitietsp&id=16" class="boxed-btn">Xem Dịch Vụ</a>
									<a href="?quanly=lienhe" class="bordered-btn">Liên Hệ</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single home slider -->
		<div class="single-homepage-slider homepage-bg-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-right">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Đầy đủ sản phẩm</p>
								<h1>Đủ Loại Dịch Vụ</h1>
								<div class="hero-btns">
									<a href="?quanly=chitietsp&id=15" class="boxed-btn">Xem Dịch Vụ</a>
									<a href="?quanly=lienhe" class="bordered-btn">Liên Hệ</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end home page slider -->
  <!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Miễn Phí Vận Chuyển</h3>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>Hỗ Trợ 24/7</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Lắp Đặt Nhanh Chóng</h3>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		
		<div class="container">
			<div class="row">
				
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Dịch Vụ</span> Của Chúng Tôi</h3>
					</div>
				</div>
			</div>
			<div class="row">
			<?php
				$sql_product = mysqli_query($con," SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC");
				while ($row_sanpham = mysqli_fetch_array($sql_product)){
				?>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>">
								<img src="uploads/<?php echo $row_sanpham['sanpham_image'] ?>"></a>
						</div>
						<h3><?php echo $row_sanpham['sanpham_name'] ?></h3>
						<p class="product-price"><span></span> <?php echo number_format ($row_sanpham['sanpham_gia']) ?><sup>đ</sup> </p>
						<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Xem dịch vụ</a>
					</div>
				</div>
				<?php
				}
				?>  
				
			</div>
		</div>
			
	</div>
	<!-- end product section -->

	<!-- cart banner section -->
	<section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            	<!--Image Column-->
            	<div class="image-column col-lg-6">
                	<div class="image">
                    	<img src="assets/img/banner1.jpg" alt="">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
					<h3><span class="orange-text">Dịch vụ</span> được sử dụng nhiều nhất</h3>
                    <h4>Tổ Chức Tiệc Cưới</h4>
                    <div class="text">Đám cưới là một sự kiện quan trọng đối với mỗi cặp đôi, vì thế bất kỳ một sơ suất nào cũng có thể ảnh hưởng đến ngày vui của hai bạn. BDH EVENTS sẽ giúp bạn thực hiện việc đó.</div>
                    <!--Countdown Timer-->
                	<a href="?quanly=chitietsp&id=14" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Xem thêm</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->

	
	<br>
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<img src="assets/img/logo-big.png" alt="">
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<h2>Chúng tôi là  <span class="orange-text">BDH EVENTS</span></h2>
						<p>BDH EVENTS đơn vị tổ chức sự kiện giúp cho doanh nghiệp có thể tiếp cận khách hàng tốt hơn, đồng thời tăng thêm độ nhận diện cho thương hiệu.</p>
						<p>Dù là bất kỳ sự kiện nào BDH EVENTS cũng luôn hướng đến các giá trị tốt nhất cho khách hàng.</p>
						<a href="href="?quanly=lienhe"" class="boxed-btn mt-4">Xem thêm</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->
	
	

	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">
			
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="section-title">	
							<h3><span class="orange-text">Tin</span> Tức</h3>
							
						</div>
					</div>
				</div>

			<div class="row">
				<?php 
					$sql_baiviet = mysqli_query($con,"SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC");
					while($row_baiviet = mysqli_fetch_array($sql_baiviet)){
				?>
					<div class="col-lg-4 col-md-6">
								<div class="single-latest-news">
									<a href="?quanly=detail_news&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>"></a>
									<img src="uploads/<?php echo $row_baiviet['baiviet_image'] ?>" alt="" style="width: 400px; height: 250px;"> 
									<h3><a href="?quanly=detail_news&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>"><?php echo $row_baiviet['tenbaiviet'] ?></a></h3> 
								</div>
								
					</div>
				<?php
					} 
				?>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="?quanly=detail_news" class="boxed-btn">Tin khác</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->
