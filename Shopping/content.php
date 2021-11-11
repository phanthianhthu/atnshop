 <?php
include_once("connection.php");
?>


<hr>
     <div class="slider-area">
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="images/hinhnen1.jpg" alt="Slide">
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
		  				   	$result = pg_query($conn, "SELECT * FROM product" );
			
			                while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
				            ?>
				            <!--Một sản phẩm -->
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="images/<?php echo $row['pro_image']?>" width="150" height="150">
                                    <div class="product-hover">
                                        <a href="?page=cart&ma=<?php echo  $row['product_id']?>" class="add-to-cart-link" ><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="?page=menu&ma=<?php echo  $row['product_id']?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="?page=menu&ma=<?php echo  $row['product_id']?>">Product Name: <?php echo  $row['product_name']?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins>Price($): <?php echo  $row['price']?></ins>
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





   
  