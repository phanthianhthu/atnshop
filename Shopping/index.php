<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ATN SHOP</title>
    <link rel="stylesheet" href="css/style2.css">

    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    
 
    <link href="csseshop/bootstrap.min.css" rel="stylesheet">
    <link href="csseshop/font-awesome.min.css" rel="stylesheet">
    <link href="csseshop/prettyPhoto.css" rel="stylesheet">
    <link href="csseshop/price-range.css" rel="stylesheet">
    <link href="csseshop/animate.css" rel="stylesheet">
	<link href="csseshop/main.css" rel="stylesheet">
	<link href="csseshop/responsive.css" rel="stylesheet">
    
    <link href="css/salomon.css" rel="stylesheet">
    

	<script src="js/jquery-3.2.0.min.js"/></script>
    <script src="js/jquery.dataTables.min.js"/></script>
    <script src="js/dataTables.bootstrap.min.js"/></script>
    
</head>

<body>
<?php
    session_start();
    include_once("connection.php"); 
  ?>

   <header id="header">
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 965423541</a></li>
								<li><a href="" target="_blank"><i class="fa fa-envelope"></i>atnshop64@gmail.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="header-middle" style="background-color:	#777777">
			<div class="container" >
				<div>


                <div class="col-sm-6" >
						<div class="logo pull-left" >
                            <a href="index.php" style="background-color:#069;color:#FFF">
                            <img src="images/Logo.jpg" width="150" height="150"></a>
						</div>
					</div>

						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home Page</a></li>
                                <li><a class="active"><input type="search" id="search" placeholder="Enter product name...."></a></li>
                                <li><a href="?page=payment">Payment</a></li>
                                <?php
                                    if(isset($_SESSION['admin']) && $_SESSION['admin']==1){
                                ?> 
								<li class="dropdown"><a href="#">Management<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="?page=Category_Management">Category edit</a></li>
										<li><a href="?page=product_management">Product edit</a></li>
                                    </ul>
                                    <?php
                                        }
                                     ?>
                                    <?php
                                   if (isset($_SESSION['us']) && $_SESSION['us']!=""){
                                       ?> 
                                       <li><a href="?page=update_customes">
                                       <i class="fa fa-lock"></i>Hello, <?php echo $_SESSION['us']?></a>
                                        </li>
                                           <li><a href="?page=logout">
                                            <i class="fa fa-crosshairs"></i>Logout</a></li>
                                <?php
                                        }
                                        else
                                        {
                                    ?>
                                <li><a href="?page=login" >
                                <i class="fa fa-lock"></i>Login</a></li>
                                <li><a href="?page=register">
                                <i class="fa fa-star"></i>Register</a></li>
                                <?php
                                        }
                                        ?>
                                </li> 
							</ul>
                            
						</div>
                        <marquee width="100%" behavior="scroll" bgcolor="pink"><b>WELCOME TO ATN SHOP - THE PLAVE TO ALWAYS UPDATE THE LASTEST PRODUCT</b></marquee>
					</div>

				</div>
			</div>
		</div>
	</header>
  
    <?php
    if(isset($_GET['page']))
    {
        $page=$_GET['page'];
        if($page=="register")
        {
            include_once("Register.php");
        }
        elseif($page=="login")
        {
            include_once("Login.php");
        }
        elseif($page=="Category_Management")
        {
            include_once("Category_Management.php");
        }
        elseif($page=="product_management")
        {
            include_once("Product_Management.php");
        }
        elseif($page=="Add_Category")
        {
            include_once("Add_Category.php");
        }
        elseif($page=="update_category")
        {
            include_once("Update_Category.php");
        }
        elseif($page=="category_management")
        {
            include_once("Category_Management.php");
        }
        elseif($page=="payment")
        {
            include_once("payment.php");
        }
        elseif($page=="logout")
        {
            include_once("logout.php");
        }
        elseif($page=="update_product")
        {
            include_once("Update_Product.php");
        }
        elseif($page=="add_product")
        {
            include_once("Add_Product.php");
        }
        elseif($page=="update_customes")
        {
            include_once("Update_customer.php");
        }
    } 
    else{
        include("Content.php");
    }
	?>
    </div> 
    
    </div> 
   
    <script src="https://code.jquery.com/jquery.min.js"></script>
    

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    

    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    

    <script src="js/jquery.easing.1.3.min.js"></script>
    

    <script src="js/main.js"></script>

    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
    

    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"></script>   
            </ul>
        </div>       
         
        <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><span>ATN Shop</span></h2>
                        <p>The children's toy shop is currently doing business in the form of online sales through a hotline number. <br>
                        The shop has a nationwide delivery service, so you can access and order anywhere. <br>
                        For quick and convenient shopping advice, you can directly buy goods at ATN Shop. <br>
                        </p>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/Just-Authentic-101349471810663    " target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://https://www.youtube.com/watch?v=65JrtwtTOdc&t=2s" target="_blank"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                

    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy;Just do it
                            <img src="images/hinhcute.jpg" width="50" height="50"> </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>

</html>