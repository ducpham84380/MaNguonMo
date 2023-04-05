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

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Giỏ Hàng</h1>
                        <br>
                        <?php 
                            if(isset($_SESSION['dangnhap_home'])){
                                echo '<p style="color: while;">Xin chào bạn: '.$_SESSION['dangnhap_home'].'<a href="index.php?quanly=cart&dangxuat=1">  Đăng xuất</a></p>';
                            }else{
                                echo '';
                            }
                        ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- end breadcrumb section -->
<!-- cart -->
<div class="cart-section mt-150 mb-150">
<?php
		$sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");

	?>
		<div class="container">
			<div class="row">
            
				<div class="col-lg-8 col-md-12">
                <form action="" method="POST">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Hình ảnh</th>
									<th class="product-name">Tên</th>
									<th class="product-price">Giá</th>
									<th class="product-quantity">Số lượng</th>
									<th class="product-total">Thành tiền</th>
								</tr>
							</thead>
                           
							<tbody>
                            <?php
                                $i = 0;
                                $total = 0;
                                while($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)){ 

                                    $subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
                                    $total+=$subtotal;
                                    $i++;
                            ?>
								<tr class="table-body-row">
                                <input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
									<td class="product-remove"><a  href="?quanly=cart&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="uploads/<?php echo $row_fetch_giohang['hinhanh'] ?>" alt=""></td>
									<td class="product-name"><?php echo $row_fetch_giohang['tensanpham'] ?></td>
									<td class="product-price"><?php echo number_format($row_fetch_giohang['giasanpham']) ?><sup>đ</sup></td>
									<td class="product-quantity"><input type="number" value="<?php echo $row_fetch_giohang['soluong'] ?>" min="1" name="soluong[]"></td>
									<td class="product-total"><?php echo number_format($subtotal) ?> <sup>đ</sup></td>
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
							</tbody>
                            <tr>
                        
						</table>
					</div>
                    </form>
				</div>
                <?php
                if(!isset($_SESSION['dangnhap_home'])){ 
                ?>                   
				<div class="col-lg-4">
                    <form action="" method="post">
                        <div class="total-section">
                            <table class="total-table">
                                <h4 style="text-align: center;">Thông tin giao hàng</h4>
                                <div >
                                    <input style="border-radius: 10px; width: 300px;" type="text" name="name" placeholder=" Họ và tên" required="">
                                        <br>
                                        <br>
                                    <input style="border-radius: 10px; width: 300px;" type="text" name="phone" placeholder="Số điện thoại" required="">
                                        <br>
                                        <br>
                                    <input style="border-radius: 10px; width: 300px;" type="text" name="address" placeholder="Địa chỉ" required="">
                                        <br>
                                        <br>
                                    <input style="border-radius: 10px; width: 300px;" type="text" name="email" placeholder="Email" required="">
                                        <br>
                                        <br>
                                        <input style="border-radius: 10px; width: 300px;" type="password" name="password" placeholder="Password" required="">
                                        <br>
                                        <br>
                                    <input style="border-radius: 10px; width: 300px;" type="text" name="note" placeholder="Ghi chú" required="">
                                </div>
                            </table>
                             <br>
            
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
                            <br>
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
                                    <a href="index.php" class="boxed-btn">Tiếp tục mua hàng</a>
                                    <button style="border-radius: 20px;"  name="thanhtoan">Thanh toán</button>
                            </div>
                        </div>
                    </form> 

					
				</div>
                <?php
                    } 
                    ?>
			</div>
		</div>
        
	</div>
	<!-- end cart -->