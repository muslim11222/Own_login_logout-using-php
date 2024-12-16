<?php 
 session_start();

 if(isset($_SESSION['email'])) {
     echo "Wellcome" . $_SESSION['firstname'];
 } else {
     header("location:deshboard.php");
 }

?>
<a href="logout.php">Logout</a>