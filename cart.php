<?php
 session_start();
?>
<!DOCTYPE>
<?php
 
 include("functions/functions.php");


?>
<html>
  <head>
      <title>MY online store</title>
	  <link rel="stylesheet" href="style.css" media="all">
  </head>
    <body>
	<!--main wrapper starts-->
	   <div class="main_wrapper">
	   	
		<!--header wrapper starts-->

	     <div class="header_wrapper">
		 <img id="logo" src="images\logo.png">
		 <img id="banner" src="images\banner2.jpg">
		  </div>
		  
		  	<!--header wrapper ends-->

				<!--menubar starts-->

		 <div class="menubar">
		 <ul id="menu">
		   <li><a href="index.php">Home</a><li>
		   <li><a href="allproducts.php">All Products</a><li>
		   <li><a href="register.php">Sign Up</a><li>
		   <li><a href="cart.php">Shopping Cart</a><li>
		   <li><a href="contact_us.php">Contact Us</a><li>
		 
		 </ul>
		 <div id="form">
		 <form method="get" action="results.php" enctype="multipart/form-data">
		 <input id="text" type="text" placeholder="search item" name="user_query">
         <input id="search" type="submit" value="Search" name="search">		 
		 </form>
		 
		 </div>
		 
		 </div>
		 
		 	<!--menubar ends-->

			
				<!--content wrapper starts-->

		 <div class="content_wrapper">
		 
		 <div id="sidebar">
		 
		 <div id="sidebar-title">CATEGORIES</div>
		 
		 <ul id="cats">
		 
		 <?php getcats(); ?>
		 
       </ul>
	   
	   <div id="sidebar-title">AUTHORS</div>
		 
		 <ul id="cats">
		 
		<?php getauthor(); ?>
       </ul>
	</div>
	 
	 <div id="content_area">
	 
	  <?php get_cart(); ?>
	 
	 <div id="shopping_cart">
	       <span style="float:right;font-size:18px;padding:5px;line-height:35px;">
		   
		   
		    <?php 
		      if(isset($_SESSION['customer_email']))
			  {
				  
				  echo "<b style='color:darkturquoise;font-size:26px'>Welcome:-</b>"."  ".$_SESSION['customer_email'];
				  
			  }
		   else{
			   
			   echo "<b>Welcome Guest!!</b>";
		   }
		      
			  ?>
		  
		     
		   <?php
			 
			 if(!isset($_SESSION['customer_email'])){
				 
				 echo "<a href='checkout.php' style='color:orange;'>Login</a>";
				 
			 }
			 else{
				 
	        echo "<a href='logout.php' style='color:orange;'>Logout</a>";

				 
			 }
			 
			 ?>
		 </span>
	 </div>
		 <div id='products_box'>
		 
		   
		    <form action="" method="post" enctype="multipart/form-data">
			
			<table align="center" width="600" bgcolor="skyblue">
			<tr align="center" style="font-size:20px;color:green;font-family:cursive" >
			   <th><b>Remove</b></th>
			   <th><b>Product(s)</b></th>
			   <th><b>Quantity</b></th>
			   <th><b>total Price</b></th>
			</tr>
			<?php
			
		$total =0;
		
		global $con;
		
		$ip = getIp();
		
		$create_query = "select * from cart where ip_add = '$ip'";
		
		$run_query = mysqli_query($con,$create_query);
		
		while($price = mysqli_fetch_array($run_query)){
			
			$pro_id = $price['pii_id'];
			
			$price_query = "select * from products where p_id = '$pro_id'";
			
			$price_run_query = mysqli_query($con,$price_query);
			
			while($pp_price = mysqli_fetch_array($price_run_query))
			{
				$final_price = array($pp_price['p_price']);
				
				$product_title = $pp_price['p_title'];
				
				$product_image = $pp_price['p_image'];
				
				$single_price = $pp_price['p_price'];

				$product_quantity = $pp_price['p_quantity'];
				
				$values = array_sum($final_price);
				
				$total += $values;
				
		   ?>
			<tr align="center">
			<td><input type="checkbox" name= "remove[]" value="<?php echo $pro_id ; ?>" ></td>
			<td style="font-size:20px;color:red;font-family:cursive"><?php echo $product_title; ?><br>
			<img style="border:2px solid orange" src = "admin_area/product_images/<?php echo $product_image; ?>" width="140" height="120">
			</td>
			<td><input type="number" size="4" name="qty" value = "<?php echo $_SESSION['qty'] ?>"></td>
			<?php
			
			  
			if(isset($_POST['update_cart'])){
				   
				   $qty = $_POST['qty'];
				   
				   $qty_query = "update cart
				                 set qty = '$qty'";
								 
				    $qty_query_run = mysqli_query($con,$qty_query);	
					


                    $_SESSION['qty'] = $qty; 					
				   
				   $total = $total * $qty;

				   $product_quantity=$product_quantity-$qty
				   
			   }
			
			
			?>
			<td style="font-size:20px;"><?php echo "$".$single_price;?></td>
			</tr>
			<?php 
			}
		} ?>
			<tr align="right">
			   <td colspan="5" style="font-size:20px;color:blue;font-family:cursive">Sub Total:</td>
			   <td style="font-size:20px;"><?php echo "$".$total; ?></td>
			</tr>
			<tr align="center">
			    <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
			    <td><input type="submit" name="continue" value="Continue"></td>
 			    <td><button style='text-decoration:none'><a style='text-decoration:none;color:black' href="checkout.php"> Checkout</a></button></td>
                    
			</tr>
			</table>
			</form>
		   <?php
		   
		   function updatecart(){
			   
		   global $con;
		   
		      $ip = getIp();
		   
		        if(isset($_POST['update_cart'])){
					
					
					
					foreach($_POST['remove'] as $remove_id)
					{
						$delete_product ="DELETE FROM cart where pii_id='$remove_id' and ip_add = '$ip'";
						
						$run_delete = mysqli_query($con,$delete_product);
						
						if($run_delete){
							
							echo "<script>
							alert('item deleted from the cart');
							window.open('cart.php','_self');
							</script>";
						}
					
					}
					
				}
				echo @$up_cart = updatecart();

			} 
				if(isset($_POST['continue']))
				{
					
					echo"
					<script>window.open('index.php','_self')</script>
					";
					
				}
		   
		 ?>
		 </div>
		 
		 </div>
		 </div>
		 	<!--content wrapper ends-->

		
		 <div id="footer"><h2>&copy;2017 by www.shopnix.com</h2></div>

		 </div>
	   	<!--main wrapper ends-->

	   <?php updatecart(); ?>
	</body>
</html>