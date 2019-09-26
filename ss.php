
			<?php
			
			   if(isset($_POST['update_cart'])){
				   
				   $qty = $_POST['qty'];
				   
				   $qty_query = "update cart
				                 set qty = '$qty'";
								 
				    $qty_query_run = mysqli_query($con,$qty_query);	

                    $_SESSION['qty'] = $qty; 					
				   
				   $total = $total * $qty;
				   
			   }
			
			
			
			?>
			
			echo @$up_cart = updatecart();