<?php
	if(isset($_POST['search_button'])){

	$tukhoa = $_POST['search_product'];
	
		
	$sql_product = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_name LIKE '%$tukhoa%' ORDER BY sanpham_id DESC");		

	$title = $tukhoa;
	}		
	?> 

<div class="container">
      <div id="wrapper">
        <div class="headline">
          <h2><?php echo $title ?></h2>
        </div>
        <ul class="products">
        <?php
				while($row_sanpham = mysqli_fetch_array($sql_product)){ 
			?>
          <li>
            <div class="products-item">
              <div class="products-top">
                <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="products-thumb">
                  <img src="uploads/<?php echo $row_sanpham['sanpham_image'] ?>" alt="">
                </a>
              </div>
              <div class="products-info">
                <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="product-name"><?php echo $row_sanpham['sanpham_name'] ?></a>
                <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="product-price-sale">Giá khuyến mãi: <?php echo number_format ($row_sanpham['sanpham_giakhuyenmai']) ?><sup>đ</sup></a>
                <a style="text-decoration-line: line-through" href="" class="products-price">Giá: <?php echo number_format ($row_sanpham['sanpham_gia']) ?><sup>đ</sup></a>
                <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="details">Xem sản phẩm</a>
              </div>
            </div>
          </li>
          <?php
          
        }
      ?>  
        </ul>
      </div>
    </div>