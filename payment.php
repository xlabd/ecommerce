<?php
// include("checkout.php");
//session_start();
?>

<!DOCTYPE>
<html>
<body>
<h1 align="center">INVOICE</h1>
<?php
include("includes/db.php");
//include("functions/functions.php");
?>
	
	<?php
			
		$total = 0;
         $ip = getIp();     
		global $con;
		
		
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
				
				$values = array_sum($final_price);
				
				$total += $values;
				
				$qty = $price['qty']
								
			      
				
		   ?>
		   <table>
			<tr align="center">
			
			<td style="font-size:35px;color:orange;font-family:cursive;"><?php echo $product_title; ?><br>
			<img style="border:2px solid orange;margin-left:100px" src = "admin_area/product_images/<?php echo $product_image;?>" width="450" height="300"><br>
			<?php
			 echo "QUANTITY:     "."  ".$price['qty'];
			 ?><br>
			<?php
			   
			   echo " TOTAL:    ".$total * $qty ;
			  
			  ?>
			</td>
			<tr>
			  <td>
			  
			   </td>
			</tr>
			<?php
			 
			 
			}
		}
			?>
			
			
			</table>
			<?php
			     
				  if(isset($_SESSION['customer_email'])){
				           
						   $email = $_SESSION['customer_email'];
				  
				  $c_query = "select * from customer where customer_email = '$email';";
				 $c_run = mysqli_query($con,$c_query);
				 $c_data = mysqli_fetch_array($c_run); 
				 
				 echo " ID: ".$c_data['customer_id']."<br>";
			     echo " NAME: ".$c_data['customer_name']."<br>";
				 echo " EMAIL ID: ".$c_data['customer_email']."<br>";
				 echo " ADDRESS: ".$c_data['customer_address']."<br>";
				 echo " CITY: ".$c_data['customer_city']."<br>";
				 echo "CONTACT NO: ".$c_data['customer_number']."<br>";

            
                  $today = getdate();
                   print_r('DATE:').print_r($today['mday'])."  ".print_r($today['mon']).print_r($today['year']);
                    
								 
				 
			 }
			
			
			
			
			?>
			<?php
	
	   if(isset($_POST['place_order']))
	  {
		  echo "<script>alert('ORDER PLACED SUCCESSFULLY');</script>";
		  echo "<script>window.open('submit.php','_self')</script>";
		  
		  
		  
	  }
	
	
	
	?>
			<br>
			<form method="post">
			<input type = "submit" name="place_order" value="place order" style = "width: 301px;
    /* align-items: flex-start; */
    margin-left: 176px;
    height: 34px;
    font-size: 26px;
    font-family: monospace;
    color: tomato;
    background-color: yellowgreen;
    border-radius: 26px;">
	</form>
	
		     </body>
         </html>