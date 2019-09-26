<!DOCTYPE>
<?php
 session_start();
 include("functions/functions.php");
 include("includes/db.php");

?>
<html>
  <head>
      <title>MY online store</title>
	  <link rel="stylesheet" href="style.css" media="all">
	  <style>
	  form table tr td{
		  
		  padding:7px;
		  font-size:20px;
	  }
	  
	  
	  </style>
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
		   <li><a href="login.php">Sign Up</a><li>
		   <li><a href="cart.php">Shopping Cart</a><li>
		   <li><a href="#">Contact Us</a><li>
		 
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
		  
		  Welcome Guest!   <b style="color:yellow">Shopping Cart- </b>Total Items:<?php total_items(); ?>  Total Price: <?php total_price(); ?> <a href="cart.php" style="color:red;text-decoration:none">Go to Cart</a>
		     
		   
		 </span>
	 </div>
		 <form action="register.php" method="post" enctype="multipart/form-data">
		   
		   <table align="center" width="750">
		   
		      <tr align="center">
		             <td colspan="8"><h2 style="color: orange;">Create an Account</h2></td>
		      </tr>
		            
		       <tr>
			     <td align="right">Name:</td>
			      
				  <td><input type="text" name="c_name" required></td>
			   </tr>
			   
			    <tr>

			     <td align="right">Email:</td>
			      
				  <td><input type="email" name="c_email" required></td>
			   </tr>
			   
			    <tr>
			     <td align="right">Password:</td>
			      
				  <td><input type="password" name="c_pass" required></td>
			   </tr>
			   
			 
			    
			   
			    <tr>
			     <td align="right">Address:</td>
			      
				  <td><textarea cols="22" rows="5" name="c_address" required></textarea></td>
			   </tr>
			   
			   <tr>
			     <td align="right">City:</td>
			      
				  <td><input type="text" name="c_city" required></td>
			   </tr>
			   
			    <tr>
			     <td align="right">Mobile Number:</td>
			      
				  <td><input type="number" name="c_number"  maxlength="10"  pattern="[0-9]{10}" ></td>
			   </tr>
			   
			    
			    <tr align="center">
			      
				  <td colspan="8"><input type="submit" name="register" value="Register"></td>
				  
			   </tr>
		     </table>
		 </form>
		 </div>
		 </div>
		 	<!--content wrapper ends-->
             <?php
			       if(isset($_POST['register']))
				   {
					   $ip = getIp();
				      $c_name = $_POST['c_name'];
					  $c_email = $_POST['c_email'];
					  $c_pass = $_POST['c_pass'];
					  $c_country = $_POST['c_country'];
					  $c_address= $_POST['c_address'];
					  $c_city = $_POST['c_city'];
					  $c_number = $_POST['c_number'];
					  
					  $insert_c = "INSERT into customer(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_address,customer_city,customer_contact) values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_address','$c_city','$c_number')";
					  
					  $insert_query = mysqli_query($con,$insert_c);
			     
			           $sel_cart = "select * from cart where ip_add = '$ip' ";
					   $run_cart = mysqli_query($con,$sel_cart);
					   $check_cart = mysqli_num_rows($run_cart);
					   
					   if($check_cart==0){
						   
						   $_SESSION['customer_email'] = $c_email;
						   echo"<script>alert('Account has been created successful!!!');</script>";
						   echo"<script>window.open('index.php','_self')</script>";
						   
					   }
					   else{
						   
						    $_SESSION['customer_email'] = $c_email;
						   echo"<script>alert('Account has been created successful!!!');</script>";
						   echo"<script>window.open('index.php','_self')</script>";
						   
						   
					   }
			 
				   }
			 
			 
			 ?>
		
		 <div id="footer">
		 <h2>&copy;2017 by www.shopnix.com</h2>
		 </div>

		 </div>
	   	<!--main wrapper ends-->

	   
	</body>
</html>