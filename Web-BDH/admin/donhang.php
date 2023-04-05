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
if(isset($_POST['capnhatdonhang'])){
	$xuly = $_POST['xuly'];
	$mahang = $_POST['mahang_xuly'];
	$sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET tinhtrang='$xuly' WHERE mahang='$mahang'");

}

?>
<?php
	if(isset($_GET['xoadonhang'])){
		$mahang = $_GET['xoadonhang'];
		$sql_delete = mysqli_query($con,"DELETE FROM tbl_donhang WHERE mahang='$mahang'");
		header('Location:xulydonhang.php');
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
          <li class="breadcrumb-item active">Đơn Hàng</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
        <?php
          if(isset($_GET['quanly'])=='xemdonhang'){
            $mahang = $_GET['mahang'];
            $sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_donhang,tbl_sanpham WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.mahang='$mahang'");
          ?>
          <div class="card-header">
            Xem Chi Tiết Đơn Hàng</div>
            <form action="" method="POST">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Thứ tự</th>
                          <th>Mã hàng</th>
                          <th>Tên sản phẩm</th>
                          <th>Số lượng</th>
                          <th>Giá</th>
                          <th>Tổng tiền</th>
                          <th>Ngày đặt</th>
                        </tr>
                      </thead>
                      <?php
                        $i = 0;
                        while($row_donhang = mysqli_fetch_array($sql_chitiet)){ 
                          $i++;
                        ?> 
                      <tbody>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row_donhang['mahang']; ?></td>
                          <td><?php echo $row_donhang['sanpham_name']; ?></td>
                          <td><?php echo $row_donhang['soluong']; ?></td>
                          <td><?php echo $row_donhang['sanpham_gia']; ?></td>
                          <td><?php echo number_format($row_donhang['soluong']*$row_donhang['sanpham_gia']).'vnđ'; ?></td>
                          <td><?php echo $row_donhang['ngaythang'] ?></td>
                          <input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['mahang'] ?>">
                        </tr>
                      </tbody>
                        <?php
                          } 
                          ?> 
                    </table>
                    <select class="form-control" name="xuly">
                    <option value="1">Đã xử lý | Giao hàng</option>
                    <option value="0">Chưa xử lý</option>
                    </select><br>

                    <input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn-update">
                  </div>
                </div>
            </form>
        </div>
        <?php
			    }else{
				?> 
          <div class="card-header">
              Đơn Hàng</div>
        <?php
			    } 
				?> 

         <!-- DataTables Example -->
         <div class="card mb-3">
          <div class="card-header">
            Xem Chi Tiết Đơn Hàng</div>
            <?php
              $sql_select = mysqli_query($con,"SELECT * FROM tbl_sanpham,tbl_khachhang,tbl_donhang WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.khachhang_id=tbl_khachhang.khachhang_id GROUP BY mahang "); 
              ?> 
            
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Thứ tự</th>
                          <th>Mã hàng</th>
                          <th>Tình trạng đơn hàng</th>
                          <th>Tên khách hàng</th>
                          <th>Ngày đặt</th>
                          <th>Ghi chú</th>
                          <th>Quản lý</th>
                        </tr>
                      </thead>
                      <?php
                        $i = 0;
                        while($row_donhang = mysqli_fetch_array($sql_select)){ 
                          $i++;
                        ?> 
                      <tbody>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row_donhang['mahang']; ?></td>
                          <td><?php
                            if($row_donhang['tinhtrang']==0){
                              echo 'Chưa xử lý';
                            }else{
                              echo 'Đã xử lý';
                            }
                          ?></td>
                          <td><?php echo $row_donhang['name']; ?></td>
                          <td><?php echo $row_donhang['ngaythang'] ?></td>
                          <td><?php echo $row_donhang['note'] ?></td>
                          <td><a href="?xoadonhang=<?php echo $row_donhang['mahang'] ?>">Xóa</a> || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>">Xem </a></td>
                        </tr>
                      </tbody>
                        <?php
                          } 
                          ?> 
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
