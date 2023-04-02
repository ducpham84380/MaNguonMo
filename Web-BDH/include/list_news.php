

<section class="news">

    <div class="news-container">
    
        <div class="news-title">
            <h1 style="color: red;">Tin Tức</h1>
        </div> 
        <?php 
       $sql_baiviet = mysqli_query($con,"SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC");
		while($row_baiviet = mysqli_fetch_array($sql_baiviet)){
	    ?>
       <div class="news-content row">
         <div class="news-content-letf">
            <a href="?quanly=detail_news&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>"><img src="uploads/<?php echo $row_baiviet['baiviet_image'] ?>" alt=""></a>
        </div>
        <div class="new-content-right">	
            <a href="?quanly=detail_news&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>"><?php echo $row_baiviet['tenbaiviet'] ?></a>
        </div>
       </div>
       <?php
			} 
		?>
    </div>
   
</section>