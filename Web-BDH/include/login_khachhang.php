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





<section>
     <div class="noi-dung">
         <div class="form">
             <h2>Đăng nhập Tài Khoản</h2>
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
     <!--Kết Thúc Phần Nội Dung-->
 </section>
</body>
</html>