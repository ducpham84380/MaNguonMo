<?php
	include('../db/connect.php');
?>
<?php
	if(isset($_POST['themdanhmuc'])){
		$tendanhmuc = $_POST['danhmuc'];
		$sql_insert = mysqli_query($con,"INSERT INTO tbl_category(category_name) values ('$tendanhmuc')");
	}elseif(isset($_POST['capnhatdanhmuc'])){
		$id_post = $_POST['id_danhmuc'];
		$tendanhmuc = $_POST['danhmuc'];
		$sql_update = mysqli_query($con,"UPDATE tbl_category SET category_name='$tendanhmuc' WHERE category_id='$id_post'");
		header('Location:danhmuc.php');
	}
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM tbl_category WHERE category_id='$id'");
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

       
    <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Danh Mục</li>
    </ol>
    <div class="card card-register mx-auto mt-5">
        <?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_category WHERE category_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
		?>
            <div class="card-header">Cập Nhật Danh Mục</div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail" class="form-control" placeholder="Tên danh mục" required="required" name="danhmuc" value="<?php echo $row_capnhat['category_name'] ?>">
                                <input type="hidden" class="form-control" name="id_danhmuc" value="<?php echo $row_capnhat['category_id'] ?>">
                                <label for="inputEmail">Tên danh mục</label>
                            </div>
                        </div>
                        <input type="submit" name="capnhatdanhmuc" value="Cập nhật danh mục" class="btn btn-primary btn-block">
                    </form>
                
                </div>
            </div>
            <?php
                }else{
            ?>  
            <div class="card-header">Thêm Danh Mục</div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail" class="form-control" placeholder="Tên danh mục" required="required" name="danhmuc" >
                                <label for="inputEmail">Tên danh mục</label>
                            </div>
                        </div>
                        <input type="submit" name="themdanhmuc" value="Thêm danh mục" class="btn btn-primary btn-block">
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
        Danh Sách Danh Mục</div>
        <?php
			$sql_select = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC"); 
		?>
        <div class="card-body">
            <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên Danh Mục</th>
                <th>Quản Lý</th>
            </tr>
            </thead>
            
            <tbody>
            <?php
				$i = 0;
				while($row_category = mysqli_fetch_array($sql_select)){ 
				$i++;
			?>
            <tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row_category['category_name'] ?></td>
				<td><a href="?xoa=<?php echo $row_category['category_id'] ?>">Xóa</a> || <a href="?quanly=capnhat&id=<?php echo $row_category['category_id'] ?>">Cập nhật</a></td>
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

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
