<?php
  if(isset($_SESSION['admin']) && $_SESSION['admin']==1){
?> 
<link rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>

<?php
	include_once("connection.php");
	function bind_Category_List($conn)
	{
		$sqlString = "select cat_id, cat_name from category";
		$result = pg_query($conn,$sqlString);
		echo "<select name='CategoryList' class='form-control'>
			<option value='0'>Choose category</option>";
			while($row=pg_fetch_array($result, NULL, PGSQL_ASSOC))
			{
				echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
			}
		echo "</select>";
	}
	if(isset($_POST["btnAdd"]))
	{
		$id = $_POST["txtID"];
		$proname = $_POST["txtName"];
		$short = $_POST["txtShort"];
		$detail = $_POST["txtDetail"];
		$price = $_POST["txtPrice"];
		$qty = $_POST["txtQty"];
		$pic = $_FILES["txtImage"];
		$category = $_POST["CategoryList"];
		$err="";
		if(trim($id)=="")
		{
			$err .= "Invalid ID</br>";
		}
		if(trim($proname)=="")
		{
			$err .= "Invalid Name</br>";
		}
		if($category=="")
		{
			$err .= "Invalid category</br>";
		}
		if(!is_numeric($price))
		{
			$err .= "Invalid price</br>";
		}
		if(!is_numeric($qty))
		{
			$err .= "Invalid quantity</br>";
		}
		if($err!="")
		{
			echo $err;
		}
		else
		{
			if($pic['type']=="image/jpg" || $pic['type']=="image/jpeg"|| $pic['type']=="image/png" || $pic['type']=="image/gif")
			{
				if($pic['size']<=614400)
				{
					$sql="select * from product where product_id='$id' and product_name='$proname'";
					$result = pg_query($conn, $sql);
					if(pg_num_rows($result)=="0")
					{
						copy($pic['tmp_name'], "img/".$pic['name']);
						$filepic = $pic['name'];
						$sqlString = "insert into product(product_id, product_name, price, smalldesc, detaildesc, prodate, pro_qty, pro_image, cat_id)
						values('$id','$proname','$price','$short','$detail','".date('Y-m-d H:i:s')."',$qty,'$filepic','$category')";
						pg_query($conn,$sqlString);
						echo '<meta http-equiv="refresh" content="0;URL =?page=product_management"';
					}
					else
					{
						echo "Duplicate ID or Name</br>";
					}
				}
				
			}
			else
			{
				echo "Image not correct format";
			}
		}
	}
?>
<div class="container">
	<h2>Adding new Product</h2>
	 	<form id="frmProduct" name="frmProduct" method="post" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
				<div class="form-group">
					<label for="txtTen" class="col-sm-2 control-label">Product ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" value=''/>
							</div>
				</div> 
				<div class="form-group"> 
					<label for="txtTen" class="col-sm-2 control-label">Product Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value=''/>
							</div>
                </div>   
                <div class="form-group">   
                    <label for="" class="col-sm-2 control-label">Product category(*):  </label>
						<div class="col-sm-10">
							<?php bind_Category_List($conn); ?>
						</div>
                </div>  
                <div class="form-group">  
                    <label for="lblGia" class="col-sm-2 control-label">Price(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value=''/>
							</div>
                 </div>   
                <div class="form-group">   
                    <label for="lblShort" class="col-sm-2 control-label">Short description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Short description" value=''/>
							</div>
                </div>
                <div class="form-group">  
        	        <label for="lblDetail" class="col-sm-2 control-label">Detail description(*):  </label>
							<div class="col-sm-10">
							      <textarea name="txtDetail" rows="4" class="ckeditor"></textarea>
              					  <script language="javascript">
                                        CKEDITOR.replace( 'txtDetail',
                                        {
                                            skin : 'kama',
                                            extraPlugins : 'uicolor',
                                            uiColor: '#eeeeee',
                                            toolbar : [ ['Source','DocProps','-','Save','NewPage','Preview','-','Templates'],
                                                ['Cut','Copy','Paste','PasteText','PasteWord','-','Print','SpellCheck'],
                                                ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                                                ['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
                                                ['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
                                                ['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote'],
                                                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
                                                ['Link','Unlink','Anchor', 'NumberedList','BulletedList','-','Outdent','Indent'],
                                                ['Image','Flash','Table','Rule','Smiley','SpecialChar'],
                                                ['Style','FontFormat','FontName','FontSize'],
                                                ['TextColor','BGColor'],[ 'UIColor' ] ]
                                        });
                                    </script> 
							</div>
                </div>
            	<div class="form-group">  
                    <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*):  </label>
							<div class="col-sm-10">
							      <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value=""/>
							</div>
                </div>
				<div class="form-group">  
	                <label for="sphinhanh" class="col-sm-2 control-label">Image(*):  </label>
							<div class="col-sm-10">
							      <input type="file" name="txtImage" id="txtImage" class="form-control" value=""/>
							</div>
                </div>
				<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=product_management'" />
						</div>
				</div>
			</form>
</div>

<?php
    }
    else{
        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    }
?>