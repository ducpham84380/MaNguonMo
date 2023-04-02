<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'"); 
?>





<section class="product">
        <div class="container">
        <?php
            while($row_chitiet = mysqli_fetch_array($sql_chitiet)){ 
        ?>
            <div class="product-content-letf-product-name">
                <h1><?php echo $row_chitiet['sanpham_name'] ?></h1>
            </div>

            <div class="product-content row">
            
                <div class="product-content-letf row">
               
                    <div class="product-content-letf-big-img">
                        <img src="uploads/<?php echo $row_chitiet['sanpham_image'] ?>" alt="">    
                    </div>
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-price">
                        <a class="product-price-sale">Giá khuyến mãi: <?php echo number_format ($row_chitiet['sanpham_giakhuyenmai']) ?><sup>đ</sup></a>
                    </div>
                    <div class="product-content-right-product-price-sale">
                        <a style="text-decoration-line: line-through" class="products-price">Giá: <?php echo number_format ($row_chitiet['sanpham_gia']) ?><sup>đ</sup></a>
                    </div>
                    <form action="?quanly=cart", method="POST">
                            <fieldset>
                                <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name'] ?>" />
								<input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>" />
								<input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_gia'] ?>" />
								<input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_image'] ?>" />
								<input type="hidden" name="soluong" value="1" />			
                                <div class="product-content-right-product-button">
                        
                        <button name="themgiohang"><i class="fas fa-shopping-cart"></i><p>MUA HÀNG</p></button>
                        </div>
                            </fieldset >
                            
                        </form>
                    
                </div>
            </div>
            <div class="product-title-motasp">

            </div>
            <div class="product-motasp">
                <h2>Thông tin sản phẩm</h2>
                <p><?php echo $row_chitiet['sanpham_mota'] ?></p>
            </div>

        </div>
        <?php
	    } 
	    ?>
      </section>
    