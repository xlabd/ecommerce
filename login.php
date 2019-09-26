<?php

include("includes/db.php");
//include("functions/functions.php");
?>

<div>

<form method="post">
<table bgcolor="skyblue" width="500" height="100" align="center">
    <tr align="center">
	<td colspan="4"><h2>Login or Register to Buy!!!</h2></td>
	</tr>   
      
	  <tr >
	  <td align="right" style="padding:19px">EMAIL:</td>
	  <td ><input type="email" name="email" placeholder="enter your email" required></td><br>
	  
	  </tr><br>
        
        <tr >
	  <td align="right" style="padding:19px">PASSWORD:</td>
	  <td><input type="password" name="password" placeholder="enter your password"  required></td>
	
	  </tr>
	  
	  
	  
	  <tr >
	  <td align="center" colspan="2" style="padding:19px" ><input type="submit" value="login" name="submit">
	  </td>
	  </tr>
</table>
      <h2 ><a href="register.php" style="float:right;text-decoration:none;padding:5px">New?Register Here!!</a></h2>

</form>
</div>

<?php

    if(isset($_POST['submit'])){
		
		$c_email = $_POST['email'];
		$c_pass = $_POST['password'];
		
		$check_c = "select * from customer where customer_email = '$c_email' and customer_pass = '$c_pass' ";
		
		$run_c = mysqli_query($con,$check_c);
		
		$num_c = mysqli_num_rows($run_c);
		
		if($num_c == 0){
			
			echo "<script>alert('Incorrect email id or password!!!')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
			exit();
		}
		$ip = getIp();
		
		$sel_cart = "select * from cart where ip_add = '$ip' ";
		 
		$run_cart = mysqli_query($con,$sel_cart);
		
		$check_cart = mysqli_num_rows($run_cart);
		
		if($num_c>0 AND $check_cart>0)
		{
			  
						   $_SESSION['customer_email'] = $c_email;
						   echo"<script>alert('You logged in successful!!!');</script>";
						   echo"<script>window.open('indexc.php','_self')</script>";
						   
			
		}
		
		else{
			
			               $_SESSION['customer_email'] = $c_email;
						   echo"<script>alert('You logged in successful!!!');</script>";
						   echo"<script>window.open('indexc.php','_self')</script>";
			
		}
		
	}
 
    
 


?>

<?php
if(isset($_POST['forgot'])){
	
	echo"<script>window.open('forgot_pass.php','_self')</script>";
	

}
?>