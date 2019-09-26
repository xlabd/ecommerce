<?php
 $con = mysqli_connect("localhost","root","","ecommerce");
 
 //getting the ip address of the user
 function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

  
 //adding items into the cart
 function get_cart(){
	  global $con;
	 
	 if(isset($_GET['add_cart'])){
		 
		  
		   
		   $ip = getIp();
		   
		   
		   $pro_id = $_GET['add_cart'];
		 
		    $check_pro = "select * from cart where ip_add='$ip' AND pii_id='$pro_id'";
			
			$run_check = mysqli_query($con,$check_pro);
			
			if(mysqli_num_rows($run_check)>0){
				
				
				echo"<script>
				alert('item   already exist in the cart');
				window.open('index.php','_self');
				</script>
				";
				
			}
		else{
				$insert_pro = "insert into cart(pii_id,ip_add) values('$pro_id','$ip')";
				
				$run_pro = mysqli_query($con,$insert_pro);
				
				echo"<script>
				alert('item added to the cart');
				window.open('index.php','_self');
				</script>
				";
				
				
			
		}
		 
		 
	 }
 }	
	
	//getting total items in the cart
	
	function total_items(){
		
		
		
		if(isset($_GET['add_cart'])){
			global $con;
			
			$ip = getIp();
			
			$item_query = "select * from cart where ip_add = '$ip'";
			
			$run_query = mysqli_query($con,$item_query);
			
			$count_items = mysqli_num_rows($run_query);
			
		}
		else{
			global $con;
			
			$ip = getIp();
			
			$item_query = "select * from cart where ip_add = '$ip'";
			
			$run_query = mysqli_query($con,$item_query);
			
			$count_items = mysqli_num_rows($run_query);
			
			
		}
		
		echo "$count_items";
		
		
		
	}
	
	//getting the total price of the items in the cart
	
	function total_price(){
		
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
				
				$total_price = array_sum($final_price);
				
				$total += $total_price;
				
				
			}
		}
		
		
		 echo "$".$total;
		
	}
	
 
 //getting the categories
 
 function getcats(){
	 
	 global $con;
	 
	 $get_cats = "select * from categories";
	 
	 $run_cats = mysqli_query($con,$get_cats);
	 
	 while($row_cats = mysqli_fetch_array($run_cats))
	 {
		 
		 $cat_id = $row_cats['cat_id'];
		 $cat_title = $row_cats['cat_title'];
		 
		 echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	 }
	 
 }
 ?>
 
 <?php
 $con = mysqli_connect("localhost","root","","ecommerce");
 
 //getting the author
 
 function getauthor(){
	 
	 global $con;
	 
	 $get_author = "select * from author";
	 
	 $run_author = mysqli_query($con,$get_author);
	 
	 while($row_author = mysqli_fetch_array($run_author))
	 {
		 
		 $author_id = $row_author['author_id'];
		 $author_name = $row_author['author_name'];
		 
		 echo "<li><a href='index.php?author=$author_id'>$author_name</a></li>";
	 }
	 
 }
 ?>
 <?php

   
   function get_pro(){
	         if(!isset($_GET['cat'])){
				 if(!isset($_GET['author'])){
			
	  global $con;
     $get_pro = "select * from products LIMIT 0,6";
                                                               
															   
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
					<p id='title1'><b>Price :$$pro_price</b></p>
	<a href='details.php?pro_id=$pro_id' id= 'details' style='text-decoration:none;float:left;font-size:18px'>Details</a>

	           </div>
	           ";
      }	  
				 }
			 }
	     }
?>

<?php

   
   function get_cat_pro(){
	         if(isset($_GET['cat'])){
				 
			$get_cat= $_GET['cat'];
	      global $con;
     $get_cat_pro = "select * from products where p_category = '$get_cat'";
                                                               
															   
     $run_cat_pro = mysqli_query($con,$get_cat_pro);
                                                                    
while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
	      
	      $pro_id = $row_cat_pro['p_id'];
		  $pro_cat = $row_cat_pro['p_category'];
	      $pro_price = $row_cat_pro['p_price'];
	      $pro_author = $row_cat_pro['p_author'];                
	      $pro_image = $row_cat_pro['p_image'];
	      $pro_title = $row_cat_pro['p_title'];
		  
        echo "
		      <div id='single_product'>
	                <h3 id='title'>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='230'  height='230'>
					<p id='title1'><b>Price :$$pro_price</b></p>
	                  <a href='details.php?pro_id=$pro_id' style='text-decoration:none','float:left';>Details</a>
	           </div>
	           ";
        
				 }
			 }
	     }
?>


<?php

   
   function get_author_pro(){
	        
	         if(isset($_GET['author'])){
				 
			$get_author= $_GET['author'];
	      global $con;
     $get_author_pro = "select * from products where p_author = '$get_author'";
                                                               
															   
     $run_author_pro = mysqli_query($con,$get_author_pro);
                                                                    
while($row_author_pro = mysqli_fetch_array($run_author_pro)){
	      
	      $pro_id = $row_author_pro['p_id'];
		  $pro_cat = $row_author_pro['p_category'];
	      $pro_price = $row_author_pro['p_price'];
	      $pro_author = $row_author_pro['p_author'];                
	      $pro_image = $row_author_pro['p_image'];
	      $pro_title = $row_author_pro['p_title'];
		  
        echo "
		      <div id='single_product'>
	                <h3 id='title'>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='230'  height='230'>
					<p id='title1'><b>Price :$$pro_price</b></p>
	                  <a href='details.php?pro_id=$pro_id' style='text-decoration:none','float:left';>Details</a>
	           </div>
	           ";
        
				 }
			 }
	     }
?>
