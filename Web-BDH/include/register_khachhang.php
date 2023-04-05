<?php
if(isset($_POST['dangky'])){
    $name = $_POST['name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $password = md5($_POST['password']);
     $note = $_POST['note'];
     $address = $_POST['address'];
     $giaohang = $_POST['giaohang'];

     $sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
     $sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
     $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
     $_SESSION['dangnhap_home'] = $name;
    $_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
    
     header('Location:index.php');
}
?>


<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Đăng Kí</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
    <br>
    <div class="container">
     <div class="noi-dung">
         <div class="form">
            
             <form action="" method="POST">
             <div class="input-form">
                     <span>Họ Tên</span>
                     <input type="text" name="name" placeholder="Nhập họ tên">
                 </div>
                 
                 <div class="input-form">
                     <span>Email</span>
                     <input type="text" name="email" placeholder="Nhập email">
                 </div>
                 <div class="input-form">
                     <span>SĐT</span>
                     <input type="text" name="phone" placeholder="Nhập số điện thoại">
                 </div>
                 <div class="input-form">
                     <span>Địa chỉ</span>
                     <input type="text" name="address" placeholder="Nhập địa chỉ">
                 </div>
                 <div class="input-form">
                     <span>Mật Khẩu</span>
                     <input type="password" name="password" placeholder="Nhập mật khẩu">
                     <input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
                 </div>
                 <div class="input-form">
                     <span>Ghi chú</span>
                     <input type="text" name="note" placeholder="Nhập ghi chú">
                 </div>
                 <div class="input-form">
                     <input type="submit" name="dangky" value="Đăng Kí">
                 </div>
                 
             </form>
         </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->
     <br>
     </div>
 <style>
      /* Thêm các kiểu CSS để định dạng form */
      form {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f4f4f4;
        border-radius: 5px;
      }
      label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
      }
      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
</body>
</html>