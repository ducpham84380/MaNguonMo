<?php
if(isset($_POST['themgiohang'])){
    $tensanpham = $_POST['tensanpham'];
    $sanpham_id = $_POST['sanpham_id'];
    $hinhanh = $_POST['hinhanh'];
    $gia = $_POST['giasanpham'];
    $soluong = $_POST['soluong'];	
    $sql_select_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
    $count = mysqli_num_rows($sql_select_giohang);
 	if($count>0){
 		$row_sanpham = mysqli_fetch_array($sql_select_giohang);
 		$soluong = $row_sanpham['soluong'] + 1;
 		$sql_giohang = "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'";
 	}else{
 		$soluong = $soluong;
 		$sql_giohang = "INSERT INTO tbl_giohang(tensanpham,sanpham_id,giasanpham,hinhanh,soluong) values ('$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong')";

 	}
 	$insert_row = mysqli_query($con,$sql_giohang);
 	// if($insert_row==0){
 	   // header('Location:index.php?quanly=chitietsp&id='.$sanpham_id);	
 	// }
}elseif(isset($_POST['capnhatsoluong'])){
 	
    for($i=0;$i<count($_POST['product_id']);$i++){
        $sanpham_id = $_POST['product_id'][$i];
        $soluong = $_POST['soluong'][$i];
        if($soluong<=0){
            $sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
        }else{
            $sql_update = mysqli_query($con,"UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'");
        }
    }

}elseif(isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    $sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE giohang_id='$id'");
    header('Location:index.php?quanly=cart');

$insert_row = mysqli_query($con,$sql_giohang);
}elseif(isset($_GET['dangxuat'])){
    $id = $_GET['dangxuat'];
    if($id==1){
        unset($_SESSION['dangnhap_home']);
    }
}elseif(isset($_POST['thanhtoan'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $note = $_POST['note'];
    $address = $_POST['address'];
    $giaohang = $_POST['giaohang'];

    $sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
    if($sql_khachhang){
       $sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
       $mahang = rand(0,9999);
       $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
 		$khachhang_id = $row_khachhang['khachhang_id'];
 		$_SESSION['dangnhap_home'] = $row_khachhang['name'];
 		$_SESSION['khachhang_id'] = $khachhang_id;
       for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
           $sanpham_id = $_POST['thanhtoan_product_id'][$i];
           $soluong = $_POST['thanhtoan_soluong'][$i];
           $sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,khachhang_id,soluong,mahang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
           $sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
       }

   }
}
elseif(isset($_POST['thanhtoandangnhap'])){

    $khachhang_id = $_SESSION['khachhang_id'];
    $mahang = rand(0,9999);	
    for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
            $sanpham_id = $_POST['thanhtoan_product_id'][$i];
            $soluong = $_POST['thanhtoan_soluong'][$i];
            $sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,khachhang_id,soluong,mahang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
            $sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
        }
}
?>
<!-- -----------cart page -->

<section class="cart"></section>
      <div class="container">
        <div class="title-cart">
            <h2>GIỎ HÀNG CỦA BẠN</h2>
            </div>
            <div class="name-customer">
            <?php 
				if(isset($_SESSION['dangnhap_home'])){
					echo '<p style="color:#000;">Xin chào bạn: '.$_SESSION['dangnhap_home'].'<a href="index.php?quanly=cart&dangxuat=1">  Đăng xuất</a></p>';
				}else{
					echo '';
				}
				?>
            </div>
            
            
        <div class="cart-content row">
        <?php
			$sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");

			?>
            <div class="cart-content-letf">
            <form action="" method="POST">
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                        
                    </tr>
                    <?php
						$i = 0;
						$total = 0;
						while($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)){ 

							$subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
							$total+=$subtotal;
							$i++;
						?>
                    <tr>
                    <input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
                        <td><a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><img src="uploads/<?php echo $row_fetch_giohang['hinhanh'] ?>" alt="" height="120"></a></td>
                        <td><p><?php echo $row_fetch_giohang['tensanpham'] ?></p></td>
                        <td><input type="number" value="<?php echo $row_fetch_giohang['soluong'] ?>" min="1" name="soluong[]"></td>
                        <td><p><?php echo number_format($row_fetch_giohang['giasanpham']) ?> <sup>đ</sup></p></td>
                        <td><p><?php echo number_format($subtotal) ?> <sup>đ</sup></p></td>
                        <td><a href="?quanly=cart&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>">Xóa</a></td>
                    </tr>
                    
                    <?php
                        }
                    ?>
                    <tr>
                        <td colspan="7"><input type="submit" class="btn-update" value="Cập nhật" name="capnhatsoluong">
                        <?php 
								$sql_giohang_select = mysqli_query($con,"SELECT * FROM tbl_giohang");
								$count_giohang_select = mysqli_num_rows($sql_giohang_select);

								if(isset($_SESSION['dangnhap_home']) && $count_giohang_select>0){
									while($row_1 = mysqli_fetch_array($sql_giohang_select)){
								?>
								
								<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['sanpham_id'] ?>">
								<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_1['soluong'] ?>">
								<?php 
							}
								?>
								<input type="submit" class="btn-pay-login" value="Thanh toán" name="thanhtoandangnhap">
		
								<?php
								} 
								?>
								
                        </td>
                    </tr>
                </table>
                </form>
            </div>
            <?php
			if(!isset($_SESSION['dangnhap_home'])){ 
			?>
            <div class="cart-content-right">
                <form action="" method="post">
                    <div class="title-customer">
                        <h2>Thông tin giao hàng</h2>
                     </div>
                     <div class="form-input-customer">
                        <input type="text" name="name" placeholder="Họ và tên" required="">
                            <br>
                        <input type="text" name="phone" placeholder="Số điện thoại" required="">
                            <br>
                        <input type="text" name="address" placeholder="Địa chỉ" required="">
                            <br>
                        <input type="text" name="email" placeholder="Email" required="">
                            <br>
                            <input type="password" name="password" placeholder="Password" required="">
                            <br>
                        <input type="text" name="note" placeholder="Ghi chú" required="">
                    </div>
                    <div class="controls-form-group">
                        <select class="option-w3ls" name="giaohang">
                            <option>Chọn hình thức thanh toán</option>
                            <option value="1">Thanh toán online</option>
                            <option value="0">Thanh toán khi nhận hàng</option>
                        </select>
                    </div>
                    <div class="pay-button">
                        <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
                        <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soluong'] ?>">
                     </div>
                
                <div class="cart-content-right-button">
                <?php
                    $sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
                    while($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)){ 
                ?>
                    <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
			        <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soluong'] ?>">
                <?php
                    } 
                ?>
                    <a href="index.php"><button>Tiếp tục mua hàng</button></a>
                    <button name="thanhtoan">Thanh toán</button>
                </div>
                </form>               
            </div>
            <?php
			} 
			?>
        </div>
      </div>