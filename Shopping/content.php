 <?php
include_once("connection.php");
?>


<hr>
     <div class="slider-area">
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="images/anhnen.jpg" alt="Slide">
						<div class="caption-group"></div>
					</li>
                </ul>
            </div>
    </div> 
</hr>



<div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">New Product</h2>
                        <div class="product-carousel">
                        
                        <!--Load san pham tu DB -->
                           <?php
						  // 	include_once("database.php");
		  				   	$result = mysqli_query($conn, "SELECT * FROM product" );
			
			                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				            ?>
				            <!--Một sản phẩm -->
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="images/<?php echo $row['Pro_image']?>" width="150" height="150">
                                    <div class="product-hover">
                                        <a href="?page=cart&ma=<?php echo  $row['Product_ID']?>" class="add-to-cart-link" ><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="?page=menu&ma=<?php echo  $row['Product_ID']?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="?page=menu&ma=<?php echo  $row['Product_ID']?>">Product Name: <?php echo  $row['Product_Name']?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins>Price($): <?php echo  $row['Price']?></ins>
                                </div> 
                            </div>
                
                <?php
				}
				?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->





   
  