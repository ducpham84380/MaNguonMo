<?php
	// session_destroy();
	// unset('dangnhap');
	if(isset($_POST['dangnhap_home'])) {
		$taikhoan = $_POST['email_login'];
		$matkhau = md5($_POST['password_login']);
		if($taikhoan=='' || $matkhau ==''){
			echo '<script>alert("Làm ơn không để trống")</script>';
		}else{
			$sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
			$count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
			if($count>0){
				$_SESSION['dangnhap_home'] = $row_dangnhap['name'];
				$_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];
				
				header('Location: index.php');
			}else{
				echo '<script>alert("Tài khoản mật khẩu sai")</script>';
			}
		}
	}
?> 



<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Đăng Nhập</h1>
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
                     <span>Tài khoản</span>
                     <input type="text" name="email_login" placeholder="Nhập email" required="Hãy nhập tài khoản">
                 </div>
                 <div class="input-form">
                     <span>Mật Khẩu</span>
                     <input type="password" name="password_login" placeholder="Nhập mật khẩu" required="Hãy nhập mật khẩu">
                 </div>
                 <div class="input-form">
                     <input type="submit" name="dangnhap_home" value="Đăng Nhập">
                 </div>
                 <div class="input-form">
                     <p>Bạn Chưa Có Tài Khoản? <a href="?quanly=register_khachhang">Đăng Ký</a></p>
                 </div>
             </form>
         </div>
     </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->

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
     <br>
</body>
</html>