<?php
require_once "../configs/db_connect.php";
session_start();
if (isset($_POST['update_user'])) {
    $Full_Name = $_POST['Full_Name'];
    $email = $_POST['email'];
    $phone_Number = $_POST['phone_Number'];
    $Address = $_POST['Address'];
    $Password=$_POST["Password"];
    $userId = $_SESSION['userId'];

  $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    $update_user = "UPDATE users SET 
        Full_Name = '$Full_Name', 
        email = '$email', 
        phone_Number = '$phone_Number',
        Address = '$Address',
        Password = '$hashedPassword'
        WHERE userId = '$userId'";
    
    if ($DbConn->query($update_user) === TRUE) {
        header("Location: ../super_Dashboard.php");

    } else {
        echo "Error: " . $update_user . "<br>" . $DbConn->error;
    }
}
?>
