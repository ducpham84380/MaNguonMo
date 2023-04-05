<?php
	if(isset($_POST['search_button'])){

	$tukhoa = $_POST['search_product'];
	
		
	$sql_product = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_name LIKE '%$tukhoa%' ORDER BY sanpham_id DESC");		

	$title = $tukhoa;
	}		
	?> 

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1><?php echo $title ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row product-lists">
      <?php
				while($row_sanpham = mysqli_fetch_array($sql_product)){ 
			?>
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>">
                <img src="uploads/<?php echo $row_sanpham['sanpham_image'] ?>" alt=""></a>
						</div>
						<h3><?php echo $row_sanpham['sanpham_name'] ?></h3>
						<p class="product-price">Giá: <?php echo number_format ($row_sanpham['sanpham_gia']) ?><sup>đ</sup> </p>
						<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Xem dịch vụ</a>
					</div>
				</div>
        <?php
          
        }
      ?>  
				
			</div>

			
		</div>
	</div>
	<!-- end products -->