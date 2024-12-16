<?php 

session_start();

$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'own_database';

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if(isset($_POST['submit'])) {
     $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
     $email = $_POST['email'];
     $password = $_POST['password'];

     $sql = "INSERT INTO own_user (firstname, lastname, email, password) VALUES('$firstname', '$lastname', '$email', '$password')";
     $query = mysqli_query($conn, $sql);

     if($query == true) {
          header("location:login.php");
     } else {
          echo 'data already not inserted';
     }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
</head>
<body>
    <form action="register.php" method="POST">
        <input type="text" name="firstname" placeholder="Enter Your Firstname" required> <br> <br>
        <input type="text" name="lastname" placeholder="Enter Your Lastname" required> <br> <br>
        <input type="email" name="email" placeholder="Enter Your Email" required> <br> <br>
        <input type="password" name="password" placeholder="Enter Your Password" required> <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>











