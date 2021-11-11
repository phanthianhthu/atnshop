<?php
  if(isset($_SESSION['admin']) && $_SESSION['admin']==1){
?>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
   <?php
	include_once("connection.php");
    if(isset($_GET["id"]))
    {
		$id = $_GET["id"];
		$result = pg_query($conn, "SELECT * FROM category WHERE cat_id='$id'");
		$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
		$cat_id = $row['cat_id'];
		$cat_name = $row['cat_name'];
		$cat_des = $row['cat_des'];
	
	?>
<div class="container">
	<h2>Updating Product Category</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category ID(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Catepgy ID" readonly value='<?php echo $cat_id ;?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category Name(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" value='<?php echo $cat_name; ?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
								  <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php  echo $cat_des;?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update" onclick="window.location='index.php?page=Category_Management'"/>
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='index.php?page=Category_Management'"/>
                              	
						</div>
					</div>
				</form>
	</div>
   
    <?php
    }
    else
	{
		echo '<meta http-equiv="refresh" content="0;URL=Category_Management.php"/>'; 
	}
	?>


	<?php
   if(isset($_POST["btnUpdate"]))
   {
	   $id = $_POST["txtID"];
	   $name = $_POST["txtName"];
	   $des = $_POST["txtDes"];
	   $err="";
	   if($name==""){
		   $err.="<li> Enter Category Name, please</li>";
	   }
       if($err!=""){
		   echo "<ul>$err</ul>";
	   }
	   else
	   {
		   $sq="SELECT * FROM category WHERE cat_id !='$id' and cat_name='$name'";
		   $result = pg_query($conn,$sq);
		   if(pg_num_rows($result)==0)
		   {
			   pg_query($conn, "UPDATE category SET cat_name  = '$name', cat_des='$des' WHERE cat_id='$id'");
			   echo '<meta http-equiv="refresh" content="0;URL=?page=category_management"/>';
		   }
		   else
		   {
			   echo "<li> Duplicate category Name</li>";
		   }
	   }
   }
   ?>
   <?php
}
?>