<?php
  if(isset($_SESSION['admin']) && $_SESSION['admin']==1){
	?> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<?php
		  include_once("connection.php");
		  if(isset($_POST["btnAdd"]))
		  {
			  $id = $_POST["txtID"];
			  $name = $_POST["txtName"];
			  $des = $_POST["txtDes"];
			  $err="";
			  if($id==""){
				  $err.="<li>Enter Category ID, please</li>";
			  }
			  if($name==""){
				  $err.="<li>Enter Category Name, please</li>";
			  }
			  if($err=""){
				  echo "<ul>$err</ul>";
			  }
			  else{
				  $sq="SELECT * FROM category WHERE cat_id='$id' or cat_name='$name'";
				  $result = pg_query($conn,$sq);
				  if(pg_num_rows($result)==0)
				  {
					  pg_query($conn,"INSERT INTO category (cat_id, cat_name, cat_des) VALUES ('$id', '$name', '$des')");
					  echo '<meta http-equiv="Refesh" content="0;URL=Category_Management.php"/>';
				  }
				  else
				  {
					  echo "<li>Duplicate  category ID or Name</li>";
				  }
			  }
		  }
	?>

<div class="container">
	<h2>Adding Category</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category ID(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Catepgy ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
							</div>
					</div>	
				 <div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Category Name(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Description(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php echo isset($_POST["txtDes"])?($_POST["txtDes"]):"";?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" onclick="window.location='?page=Category_Management'" />
                              <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Ignore" onclick="window.location='?page=Category_Management'" />
                              	
						</div>
					</div>
				</form>
	</div>
 <?php
  }
?>