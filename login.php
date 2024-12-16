<?php 
session_start();

$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'own_database';

$conn = mysqli_connect($hostname, $username, $password, $db_name);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM own_user WHERE email = '$email' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    if($email == $data['email'] && $password == $data['Password']) {
        $_SESSION['email'] = $data['email'];
        $_SESSION['firstname'] = $data['firstname'];
    } else {
        echo 'please try again';
    }
}

if (isset($_SESSION['email'])) {
    header("location:deshboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Enter Your Email" required> <br>
        <input type="password" name="password" placeholder="Enter Your Password" required> <br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
