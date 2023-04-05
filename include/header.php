
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDH STORE</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/style.css" type="text/css" rel="stylesheet" />
    <link rel="icon" type="image/png" sizes="192x192" href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <header>
        <div class="header">
            <div class="logo">
              <a href="index.php"><img src="images/logo.png"  width="200px" height="100px"></a>
           </div> 
           <div class="menu">
                <li><a href="index.php">TRANG CHỦ</a></li>
                <?php
                  $sql_category_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");
                  while ($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)){
                  ?>
                <li><a href="?quanly=danhmuc&id=<?php echo $row_category_danhmuc['category_id'] ?>">
                  <?php echo $row_category_danhmuc['category_name'] ?></a>
                
                </li>
                  
                    
                  <?php
                  }
                  ?>
                  <li><a href="?quanly=list_news">TIN TỨC</a></li>
                 <li><a href="?quanly=lienhe">LIÊN HỆ</a></li>
            </div>
            <div class="login">
            
            <?php 
            if(isset($_SESSION['dangnhap_home'])){
              echo '<p style="color:#000;">Xin chào bạn: '.$_SESSION['dangnhap_home'].'<a href="index.php?quanly=cart&dangxuat=1">  Đăng xuất</a></p>';
            }else{
              echo '';
            }
            ?>
              </div>
            <?php
            if(!isset($_SESSION['dangnhap_home'])){ 
            ?>
            <div class="login">
            
                <a href="?quanly=login_khachhang" style="color: #000; text-decoration: none;"><i class="fa-solid fa-user"></i> Đăng Nhập</a>
              </div>
              <?php
              } 
              ?>
            </div>      
            <form action=""></form>   
            <div class="others">
              <form class="form-inline" action="index.php?quanly=search" method="POST">
              <input type="text" class="search-text" name="search_product" placeholder="Searching...">
              <button class="fa-solid fa-magnifying-glass" name="search_button" type="submit"></button>
                <a href="?quanly=cart"class="cart-btn">
                  <i class="fa-solid fa-cart-shopping"></i></a>
                 
              </form>
                
            </div>        
           
        </div>
    </header>
    
      <div class="banner">
        <div class="banner-letf">
          <a href="?quanly=chitietsp&id=2"><img src="images/banner.png" ></a>
        </div>
        <div class="banner-right">
          <a href="?quanly=chitietsp&id=3"><img src="images/banner2.jpg" ></a>
        </div>
      </div>
      