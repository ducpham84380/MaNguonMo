<?php
	include('../db/connect.php');
?>
<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: login.php');
	} 
	if(isset($_GET['login'])){
 	$dangxuat = $_GET['login'];
	 }else{
	 	$dangxuat = '';
	 }
	 if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location: login.php');
	 }
?>
<?php
	if(isset($_POST['themsanpham'])){
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$giakhuyenmai = $_POST['giakhuyenmai'];
		$danhmuc = $_POST['danhmuc'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_product = mysqli_query($con,"INSERT INTO tbl_sanpham(sanpham_name,sanpham_mota,sanpham_gia,sanpham_giakhuyenmai,sanpham_soluong,sanpham_image,category_id) values ('$tensanpham','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh','$danhmuc')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}elseif(isset($_POST['capnhatsanpham'])) {
		$id_update = $_POST['id_update'];
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$giakhuyenmai = $_POST['giakhuyenmai'];
		$danhmuc = $_POST['danhmuc'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_mota='$mota',sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',category_id='$danhmuc' WHERE sanpham_id='$id_update'";
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_mota='$mota',sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_image='$hinhanh',category_id='$danhmuc' WHERE sanpham_id='$id_update'";
		}
		mysqli_query($con,$sql_update_image);
	}
	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM tbl_sanpham WHERE sanpham_id='$id'");
	} 
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard.php">BDH EVENTS</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
        <div class="input-group-append">
        <p style="font-size: 18px; color: white; ">Xin chào : <?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat" style="font-size: 16px; color: red;">Đăng xuất</a></p>
        </div>
      </div>
    </form>
	

  </nav>

  <div id="wrapper">
    

     <!-- Sidebar -->
     <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="danhmuc.php">
          
          <span>Quản Lý Danh Mục</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sanpham.php">
          
          <span>Quản Lý Sản Phẩm</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="baiviet.php">
          
          <span>Quản Lý Bài Viết</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="donhang.php">
          
          <span>Quản Lý Đơn Hàng</span></a>
      </li>
    </ul>

   
        
        <!-- them-sua san pham -->
    
    
  
        <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Sản Phẩm</li>
    </ol>
    <div class="card card-register mx-auto mt-5">
        <?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				$id_category_1 = $row_capnhat['category_id'];
		?>
            <div class="card-header">Cập Nhật Sản Phẩm</div>
                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail" class="form-control" value="<?php echo $row_capnhat['sanpham_name'] ?>" name="tensanpham" >
                                <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['sanpham_id'] ?>">
                                <label for="inputEmail">Tên sản phẩm</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="file" class="form-control"  required="required" name="hinhanh" >
                                <img src="../uploads/<?php echo $row_capnhat['sanpham_image'] ?>" height="80" width="80"><br>
                                <label>Hình ảnh</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail1" class="form-control" value="<?php echo $row_capnhat['sanpham_gia'] ?>" name="giasanpham" >
                                <label for="inputEmail1">Giá</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail2" class="form-control" value="<?php echo $row_capnhat['sanpham_soluong'] ?>" name="soluong" >
                                <label for="inputEmail2">Số lượng</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea class="form-control" id="editor1" cols="30" rows="10" name="mota"><?php echo $row_capnhat['sanpham_mota'] ?></textarea><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <div class="form-label-group">
                            
                            <?php
                            $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC"); 
                            ?>
                            <select name="danhmuc" class="form-control">
                                <option value="0">-----Chọn danh mục-----</option>
                                <?php
                                while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
                                    if($id_category_1==$row_danhmuc['category_id']){
                                ?>
                                <option selected value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                                <?php 
                                    }else{
                                ?>
                                <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-primary btn-block">
                    </form>
                
                </div>
            </div>
            <?php
                }else{
            ?>  
            <div class="card-header">Thêm Sản Phẩm</div>
                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail" class="form-control" placeholder="Tên sản phẩm" required="required" name="tensanpham" >
                                <label for="inputEmail">Tên sản phẩm</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="file" class="form-control"  required="required" name="hinhanh" >
                                <label>Hình ảnh</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail1" class="form-control" placeholder="Giá sản phẩm" required="required" name="giasanpham" >
                                <label for="inputEmail1">Giá</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail2" class="form-control" placeholder="Số luong" required="required" name="soluong" >
                                <label for="inputEmail2">Số lượng</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea class="form-control" id="editor1" cols="30" rows="10" name="mota" placeholder="Mô tả" required="required"></textarea><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <div class="form-label-group">
                            
                            <?php
                            $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC"); 
                            ?>
                            <select name="danhmuc" class="form-control">
                                <option value="0">-----Chọn danh mục-----</option>
                                <?php
                                while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
                                ?>
                                <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                                <?php 
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-primary btn-block">
                    </form>
                
                </div>
            </div>
 
        <?php
            } 
        ?>
        <br>
        <!-- DataTables Example -->
    <div class="card mb-3">
    <div class="card-header">
        Danh Sách Sản Phẩm</div>
        <?php
			$sql_select_sp = mysqli_query($con,"SELECT * FROM tbl_sanpham,tbl_category WHERE tbl_sanpham.category_id=tbl_category.category_id ORDER BY tbl_sanpham.sanpham_id DESC"); 
		?> 
        <div class="card-body">
            <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Thứ tự</th>
				<th>Tên sản phẩm</th>
				<th>Hình ảnh</th>
				<th>Số lượng</th>
				<th>Danh mục</th>
				<th>Giá sản phẩm</th>
				<th>Quản lý</th>
            </tr>
            </thead>
            
            <tbody>
            <?php
				$i = 0;
				while($row_sp = mysqli_fetch_array($sql_select_sp)){ 
					$i++;
			?> 
            <tr>
				<td><?php echo $i ?></td>
				<td><?php echo $row_sp['sanpham_name'] ?></td>
				<td><img src="../uploads/<?php echo $row_sp['sanpham_image'] ?>" height="100" width="80"></td>
				<td><?php echo $row_sp['sanpham_soluong'] ?></td>
				<td><?php echo $row_sp['category_name'] ?></td>
				<td><?php echo number_format($row_sp['sanpham_gia'])?><sup>đ</sup></td>
				<td><a href="?xoa=<?php echo $row_sp['sanpham_id'] ?>">Xóa</a> || <a href="sanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>">Cập nhật</a></td>
			</tr>
            <?php
				} 
			?>
            </tbody>
           
        </table>
        </div>
    </div>
    </div>
    
    
</div>

<!-- /.container-fluid -->

        

     
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
</script>

</body>

</html>
