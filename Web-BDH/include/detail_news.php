<?php
	if(isset($_GET['id_tin'])){
		$id_baiviet = $_GET['id_tin'];
	}else{
		$id_baiviet = '';
	}
    $sql_baiviet = mysqli_query($con,"SELECT * FROM tbl_baiviet  WHERE baiviet_id='$id_baiviet'");
?>

<section class="detail-news">
    <div class="detail-container">
    <?php 
		while($row_baiviet = mysqli_fetch_array($sql_baiviet)){
	    ?>
        <div class="detail-title">
            <h2><?php echo $row_baiviet['tenbaiviet'] ?></h2>
        </div>
       <div class="detail-content">
        <p><?php echo $row_baiviet['noidung'] ?></p>
       </div>
       <?php
			} 
		?>
    </div>
</section>