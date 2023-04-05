<?php
	if(isset($_GET['id_tin'])){
		$id_baiviet = $_GET['id_tin'];
	}else{
		$id_baiviet = '';
	}
    $sql_baiviet = mysqli_query($con,"SELECT * FROM tbl_baiviet  WHERE baiviet_id='$id_baiviet'");
?>


<?php 
    while($row_baiviet = mysqli_fetch_array($sql_baiviet)){
?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1><?php echo $row_baiviet['tenbaiviet'] ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	
	<!-- single article section -->
	<div class="mt-150 mb-150">
		<div class="container">
	
             <h2 style="text-align: center;">Nội dung chi tiết</h2>
            <p style="align-items: center;"><?php echo $row_baiviet['noidung'] ?></p>
        
		</div>
	</div>
	<!-- end single article section -->
    <?php
			            } 
		            ?>