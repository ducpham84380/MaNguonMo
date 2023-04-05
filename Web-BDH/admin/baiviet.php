<?php
	include('../db/connect.php');
?>
<?php
	if(isset($_POST['thembaiviet'])){
		$tenbaiviet = $_POST['tenbaiviet'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_product = mysqli_query($con,"INSERT INTO tbl_baiviet(tenbaiviet,noidung,baiviet_image) values ('$tenbaiviet','$mota','$hinhanh')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}elseif(isset($_POST['capnhatbaiviet'])) {
		$id_update = $_POST['id_update'];
		$tenbaiviet = $_POST['tenbaiviet'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
	
		$mota = $_POST['mota'];
		$path = '../uploads/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',noidung='$mota' WHERE baiviet_id='$id_update'";
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',noidung='$mota',baiviet_image='$hinhanh' WHERE baiviet_id='$id_update'";
		}
		mysqli_query($con,$sql_update_image);
	}
	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM tbl_baiviet WHERE baiviet_id='$id'");
	} 
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
    <li class="breadcrumb-item active">Bài Viết</li>
    </ol>
    <div class="card card-register mx-auto mt-5">
        <?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_baiviet WHERE baiviet_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
		?>
            <div class="card-header">Cập Nhật Bài Viết</div>
                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail" class="form-control" value="<?php echo $row_capnhat['tenbaiviet'] ?>" name="tenbaiviet" >
                                <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['baiviet_id'] ?>">
                                <label for="inputEmail">Tên bài viết</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="file" class="form-control"   name="hinhanh" >
                                <img src="../uploads/<?php echo $row_capnhat['baiviet_image'] ?>" height="80" width="80"><br>
                                <label>Hình ảnh</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea class="form-control" id="editor1" cols="30" rows="10" name="mota"><?php echo $row_capnhat['noidung'] ?></textarea><br>
                            </div>
                        </div>
                        
                        <input type="submit" name="capnhatbaiviet" value="Cập nhật bài viết" class="btn btn-primary btn-block">
                    </form>
                
                </div>
            </div>
            <?php
                }else{
            ?>  
            <div class="card-header">Thêm Bài Viết</div>
                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail" class="form-control" placeholder="Tên bài viết" required="required" name="tenbaiviet" >
                                <label for="inputEmail">Tên bài viết</label>
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
                                <textarea class="form-control" id="editor1" cols="30" rows="10" name="mota" placeholder="Mô tả" required="required"></textarea><br>
                            </div>
                        </div>
                        <input type="submit" name="thembaiviet" value="Thêm bài viết" class="btn btn-primary btn-block">
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
        Danh Sách Bài Viết</div>
        <?php
			$sql_select_bv = mysqli_query($con,"SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC");
		?> 
        <div class="card-body">
            <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Thứ tự</th>
				<th>Tên bài viết</th>
				<th>Hình ảnh</th>
                <th>Quản lý</th>
            </tr>
            </thead>
            
            <tbody>
            <?php
					$i = 0;
					while($row_bv = mysqli_fetch_array($sql_select_bv)){ 
						$i++;
					?> 
            <tr>
				<td><?php echo $i ?></td>
				<td><?php echo $row_bv['tenbaiviet'] ?></td>
				<td><img src="../uploads/<?php echo $row_bv['baiviet_image'] ?>" height="100" width="80"></td>
				<td><a href="?xoa=<?php echo $row_bv['baiviet_id'] ?>">Xóa</a> || <a href="baiviet.php?quanly=capnhat&capnhat_id=<?php echo $row_bv['baiviet_id'] ?>">Cập nhật</a></td>
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

        

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>BDH EVETNS</span>
          </div>
        </div>
      </footer>

    </div>
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
