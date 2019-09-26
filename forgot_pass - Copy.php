<!DOCTYPE>
<?php
 session_start();
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
		   <li><a href="#">My Account</a><li>
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
	   
	   <div id="sidebar-title">BRANDS</div>
		 
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
		   
		  
		     <b style="color:yellow">Shopping Cart- </b>Total Items:<?php total_items(); ?>  Total Price: <?php total_price(); ?> <a href="cart.php" style="color:red;text-decoration:none">Go to Cart</a>
		     
			 <?php
			 
			 if(!isset($_SESSION['customer_email'])){
				 
				 echo "<a href='checkout.php' style='color:orange;'>Login</a>";
				 
			 }
			 else{
				 
	        echo "<a href='logout.php' style='color:orange;'>Logout</a>";

				 
			 }
			 
			 
			 
			 ?>
		   
		 </span>
	 </div>+---
		 <div id='products_box'>
		 
<?php

include("includes/db.php");
//include("functions/functions.php");
?>

<div>

<form method="post">
<table bgcolor="skyblue" width="500" height="100" align="center">
    <tr align="center">
	<td colspan="4"><h2>FORGOT PASSWORD!!!</h2></td>
	</tr>   
      
	  <tr >
	  <td align="right" style="padding:19px">EMAIL:</td>
	  <td ><input type="email" name="email" placeholder="enter your email" required></td><br>
	  
	  </tr><br>
        
        <tr >
	  <td align="right" style="padding:19px">PASSWORD:</td>
	  <td><input type="password" name="password1" placeholder="enter your password"  required></td>
	
	  </tr>
	  
	     <tr >
	  <td align="right" style="padding:19px">CONFIRM PASSWORD:</td>
	  <td><input type="password" name="password2" placeholder="re-enter your password"  required></td>
	
	  </tr>
	  
	  <tr >
	  <td align="center" colspan="2" style="padding:19px" ><input type="submit" value="submit" name="submit">
	  </td>
	  </tr>
</table>
      <h2 ><a href="register.php" style="float:right;text-decoration:none;padding:5px">New?Register Here!!</a></h2>

</form>
</div>
         <?php
		 
		    if(isset($_POST['submit'])){
		     
		     $c_email = $_POST['email']; 
			 $c_pass1 = $_POST['password1']; 
		     $c_pass2 = $_POST['password2']; 
			 
			 $sel_email = "select * from customer where customer_email = '$c_email' ";
			 
			 $sel_run = mysqli_query($con,$sel_email);

			 $sel_num = mysqli_num_rows($sel_run);
			  
             if($sel_num > 0){
				   
				   
				   if($c_pass1 == $c_pass2){
				 
				     $change_pass = "update customer
					                  set customer_pass = '$c_pass1'
                                      where customer_email = '$c_email' ";	

                       $change_run = mysqli_query($con,$change_pass);	

				echo "<script>alert('passoword successfully changed!!!');</script>";
				echo "<script>window.open('checkout.php','_self')</script>";
				

					 
			            }
				 else{
					 
					 echo "<script>alert('forgot passowrd and Confirm password must be same!!');</script>";
					 
				 }
			 }			 
            else{
		   
		   echo "<script>alert('Enter a valid email address!!');</script>";
		   
	            }
				
				
		 
	}
		 
		 ?>

        </div>
		 
		 </div>
		 </div>
		 	<!--content wrapper ends-->

		
		 <div id="footer">
		 <h2>&copy;2014 by www.shopnix.com</h2>
		 </div>

		 </div>
	   	<!--main wrapper ends-->

	   
	</body>
</html>