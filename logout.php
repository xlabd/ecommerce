<?php
 include("functions/functions");
 $con = mysqli_connect("localhost", "root", "", "ecommerce");
 if(mysqli_connect_errno($con))
 echo '<script>alert("Cannot connect");</script>';

 $deletion = mysqli_query($con,"DELETE FROM cart");
 echo "<script>alert({$deletion});</script>";
 session_start();
 
 session_destroy();
 
 echo "<script>window.open('index.php','_self')</script>";


?>