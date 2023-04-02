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

<div class="container">
      <div id="wrapper">
        <div class="headline">
          <h2><?php echo $title ?></h2>
        </div>
        <ul class="products">
        <?php
            while ($row_sanpham = mysqli_fetch_array($sql_cate)){
                
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