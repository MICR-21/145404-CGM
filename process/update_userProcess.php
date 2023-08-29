<?php
require_once "../configs/db_connect.php";
session_start();
if ( isset($_POST['Update'])) {
  $Full_Name = $_POST['full_name'];
  $email = $_POST['email'];
  $phone_Number = $_POST['phone_Number'];
  $UserType = $_POST['UserType'];
  $Address = $_POST['Address'];
  $Password=$_POST["Password"];
  $userId = $_SESSION['userId'];

  $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

 $insert_user="UPDATE users SET 
    Full_Name = '$Full_Name', 
    email = '$email', 
    phone_Number = '$phone_Number', 
    UserType = '$UserType',  
    Address = '$Address',
    Password= '$hashedPassword'
    WHERE userId = '$userId'";

  
    

  if ($DbConn->query($insert_user) === TRUE) {
    if ($_SESSION['UserType'] === 'Administrator') {
      header('Location:../adminDashboard.php?userId=$userId');
      exit;
  } elseif ($_SESSION['UserType'] === 'Author') {
      header('Location:../authorDashboard.php?userId=$userId');
      exit;
  }
  } else {
    echo "Error: " . $insert_user . "<br>" . $DbConn->error;
      }
}

?>