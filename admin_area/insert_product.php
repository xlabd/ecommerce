<!DOCTYPE>
<?php

 include("includes/db.php");


?>

<html>
  <head>
      <title>Inserting product</title>
   </head>
     <body>
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
		<table width="650" align="center" border="3" bgcolor="orange">
		  
		  <tr align="center" >
		    <td colspan="8"><h2>INSERT PAGE</h2></td>
		   </tr>
	        
			<tr>
			<td align="right">Product Title:</td>
			<td><input type="text" name="product_title" required></td>
			</tr>
			
			<tr>
			<td align="right">Product Category:</td>
			<td>
			<select name="product_cat" required>
			<option>Select a Category</option>
			<?php
			$get_cats = "select * from categories";
	 
	 $run_cats = mysqli_query($con,$get_cats);
	 
	 while($row_cats = mysqli_fetch_array($run_cats))
	 {
		 
		 $cat_id = $row_cats['cat_id'];
		 $cat_title = $row_cats['cat_title'];
		 
		 echo "<option value='$cat_id'>$cat_title</option>";
	 }
			
			
			?>
			<select>
			</td>
			</tr>
			
			<tr>
			<td align="right">Product author:</td>
			<td>
			<select name="product_author" required>
			<option>Select  author</option>
			<?php
			 $get_author = "select * from author";
	 
	 $run_author = mysqli_query($con,$get_author);
	 
	 while($row_author = mysqli_fetch_array($run_author))
	 {
		 
		 $author_id = $row_author['author_id'];
		 $author_name = $row_author['author_name'];
		 
		 echo "<option value='$author_id'>$author_name</option>";
	 }
	 
			?>
			</select>
			</td>
			</tr>
			
			<tr>
			<td align="right">Product Image:</td>
			<td><input type="file" name="product_image" required></td>
			</tr>
			
			<tr>
			<td align="right">Product Price:</td>
			<td><input type="text" name="product_price" required></td>
			</tr>
			
			<tr>
			<td align="right">Product Description:</td>
			<td><textarea cols="25" rows="7" name="product_desc"></textarea></td>
			</tr>
			
			<tr>
			<td align="right">Product Keywords:</td>
			<td><input type="text" name="product_keyword" required></td>
			</tr>
			
			<tr align="center" >
			<td colspan="8"><input type="submit" name="insert_post" value="Insert Product now"></td>
			</tr>
	 
	 
	 
	    </table> 
	 </form>
  </body>
</html>
<?php
    if(isset($_POST['insert_post']))
	{
		$product_title = $_POST['product_title'];
	    $product_cat = $_POST['product_cat'];
		$product_author = $_POST['product_author'];
        $product_price = $_POST['product_price'];
        $product_keyword = $_POST['product_keyword'];
		$product_desc = $_POST['product_desc'];
		
		$product_image = $_FILES['product_image']['name'];
		$product_image_temp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_temp,"product_images/$product_image");
		
		$insert_pro = "INSERT INTO products(p_category,	p_author,p_title,p_price,p_descript,p_image,p_keywords) values('$product_cat','$product_author','$product_title',' $product_price','$product_desc','$product_image ','$product_keyword')";
		
		$insert = mysqli_query($con,$insert_pro);
		
		if($insert)
		{
			echo "<script>
			alert('product has been inserted')
			</script>";
			echo "<script>
			window.open('insert_product.php','_self');
			</script>";
		}
		}


?>