<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: index.html");
}

    $host='localhost';
    $username='root';
    $pass='';
    $db='ecommerce';
    $link = mysqli_connect($host, $username, $pass, $db);
    if(!$link)
    {
        echo 'Error in connecting.';
        
    } else{
	echo 'high';
	}


if(isset($_POST['Submit']))
{
 
 $fname = $_POST['Firstname'];

 $lname = $_POST['Lastname'];

 $email = $_POST['email'];

 $upass = $_POST['password']; 

 $pcode = $_POST['Address'];
  



 if(mysqli_query($link,"INSERT INTO signup(F_name,L_name,Email,password,Address) VALUES('$fname','$lname','$email','$upass','$pcode')"))
 {
  ?>
        <script>alert('successfully registered ');</script>
        <?php
	header('Location: index - copy.php')
        //$_SESSION['s']=$lname;

  ?>
 }
 else
 {
        <script>alert('error while registering you...');</script>
        <?php
 }
}




?>