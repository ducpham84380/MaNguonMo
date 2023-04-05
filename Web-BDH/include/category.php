<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = '';
    }
        $sql_cate = mysqli_query($con,"SELECT * FROM tbl_category, tbl_sanpham WHERE tbl_category.category_id = tbl_sanpham.category_id
        AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id DESC");
        $sql_category = mysqli_query($con,"SELECT * FROM tbl_category,tbl_sanpham WHERE tbl_category.category_id=tbl_sanpham.category_id AND tbl_sanpham.category_id='$id' ORDER BY tbl_sanpham.sanpham_id DESC");
        $row_title = mysqli_fetch_array($sql_category);
        $title = $row_title['category_name'];
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
            while ($row_sanpham = mysqli_fetch_array($sql_cate)){
                
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