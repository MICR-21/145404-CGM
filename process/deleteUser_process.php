<?php
require_once "../configs/db_connect.php";

if (isset($_GET['userId'])) {
  $userId = $_GET['userId'];

$insert_user ="DELETE FROM users
WHERE userId = $userId";
if ($DbConn->query($insert_user) === TRUE) {
  header("Location: ../manageUsers.php");
// echo ("New record created successfully");
} else {
  echo "Error: " . $insert_user . "<br>" . $DbConn->error;
    }

}
?>
