<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'"); 
?>







<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Chi Tiết Dịch Vụ</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
    <?php
                while($row_chitiet = mysqli_fetch_array($sql_chitiet)){ 
            ?>
	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
           
				<div class="col-md-5">
					<div class="single-product-img">
					<img src="uploads/<?php echo $row_chitiet['sanpham_image'] ?>" alt="">    
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h1 style="color: red;"><?php echo $row_chitiet['sanpham_name'] ?></h1>
						<p class="single-product-pricing">Giá: <?php echo number_format ($row_chitiet['sanpham_gia']) ?><sup>đ</sup></p>
						
						<div class="single-product-form">
							<form action="?quanly=cart", method="POST">
								<fieldset>
									<input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name'] ?>" />
									<input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>" />
									<input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_gia'] ?>" />
									<input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_image'] ?>" />
									<input type="hidden" name="soluong" value="1" />			
									<div class="product-content-right-product-button">
			
									<button style="border-radius: 10px;" name="themgiohang"><p>Thêm vào giỏ hàng</p></button>
									</div>
						
								</fieldset >
								
							</form>
							
						</div>
						
					</div>
				</div>
               
			</div>
            <br>
			<br>
            <h2 style="color: red; text-align: center;">Mô tả dịch vụ</h2>
            <br>
            <p style="align-self: center;;"><?php echo $row_chitiet['sanpham_mota'] ?></p>
            
		</div>
	</div>
	<!-- end single product -->
   
    <?php
                } 
                ?>
	