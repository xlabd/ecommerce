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
		   <li><a href="#">My Account</a><li>
		   <li><a href="#">Sign Up</a><li>
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
	   
	   <div id="sidebar-title">AUTHOR</div>
		 
		 <ul id="cats">
		 
		<?php getauthor(); ?>
       </ul>
	</div>
	 
	 <div id="content_area">
	 <div id="shopping_cart">
	       <span style="float:right;font-size:18px;padding:5px;line-height:35px;">
		  
		
		   
		 </span>
	 </div>
		 <div id='products_box'>
		   <?php
		     
			 if(isset($_GET['search']))
			 {
		         $search = $_GET['user_query'];	 
			 
			 $get_pro = "select * from products where p_keywords like '%$search%' ";
                                                               
			$run_pro = mysqli_query($con,$get_pro);
                                                                    
while($row_pro = mysqli_fetch_array($run_pro)){
	      
	      $pro_id = $row_pro['p_id'];
		  $pro_cat = $row_pro['p_category'];
	      $pro_price = $row_pro['p_price'];
	      $pro_author = $row_pro['p_author'];                
	      $pro_image = $row_pro['p_image'];
	      $pro_title = $row_pro['p_title'];
		  
        echo "
		      <div id='single_product'>
	                <h3 id='title'>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='230'  height='230'>
					<p id='title1'><b>$ $pro_price</b></p>
	                  <a href='details.php?pro_id=$pro_id' id= 'details' style='text-decoration:none;float:left;font-size:18px'>Details</a>
					  <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to cart</button></a>
	           </div>
	           ";
      }	  
			 }
		   ?>
		 
		 </div>
		 
		 </div>
		 </div>
		 	<!--content wrapper ends-->

		
		 <div id="footer"><h2>&copy;2017 by www.shopnix.com</h2></div>

		 </div>
	   	<!--main wrapper ends-->

	   
	</body>
</html>