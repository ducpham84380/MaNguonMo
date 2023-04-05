

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Tin Tức</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
       
            <div class="container">
                <div class="row">
                <?php 
                $sql_baiviet = mysqli_query($con,"SELECT * FROM tbl_baiviet ORDER BY baiviet_id DESC");
                    while($row_baiviet = mysqli_fetch_array($sql_baiviet)){
                ?>
                    <div class="col-lg-4 col-md-6">
                            <div class="single-latest-news">
                                <a href="?quanly=detail_news&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>"></a>
                                <img src="uploads/<?php echo $row_baiviet['baiviet_image'] ?>" alt="" style="width: 400px; height: 250px;"> 
                                <h3><a href="?quanly=detail_news&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>"><?php echo $row_baiviet['tenbaiviet'] ?></a></h3>  
                            </div>
                    </div>
                        
                    <?php
                        } 
                    ?>
				
				
				
			</div>

       
		</div>
	</div>
	<!-- end latest news -->