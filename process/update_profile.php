<?php
require_once "../configs/db_connect.php";

if ( isset($_POST['Update'])) {
  $Full_Name = $_POST['full_name'];
  $email = $_POST['email'];
  $phone_Number = $_POST['phone_Number'];
  $UserType = $_POST['UserType'];
  $Address = $_POST['Address'];
  $Password=$_POST["Password"];

 $insert_user="UPDATE users SET 
    Full_Name = '$Full_Name', 
    email = '$email', 
    phone_Number = '$phone_Number', 
    UserType = '$UserType',  
    Address = '$Address',
    Password= '$Password'
    WHERE userId = '$userId'";
    
  if ($DbConn->query($insert_user) === TRUE) {
    header("Location: ../authorDashboard.php?userId=$userId");
  } else {
    echo "Error: " . $insert_user . "<br>" . $DbConn->error;
      }
}

?>