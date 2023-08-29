<?php
require_once "configs/db_connect.php";
session_start();

?>
<html>
<head>
    <title>List Users</title>
    <link rel="stylesheet" href="css//listUser.css">
</head>
<h2>List of Users</h2>

    <ul>
        
        <?php
        if($_SESSION['UserType'] === 'Administrator')
        { 
            $sql = "SELECT * FROM users where UserType = 'Author'";
            $result = $DbConn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['Full_Name']} - <a href='process/deleteUser_process.php?userId={$row['userId']}'>Delete</a> | <a href='updateUser.php?userId={$row['userId']}'>Edit</a></li>";
            }

            
        }else
        {
            $sql = "SELECT * FROM users";
            $result = $DbConn->query($sql);
            while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['Full_Name']} - <a href='manage_users.php?delete_id={$row['userId']}'>Delete</a> | <a href='edit_user.php?id={$row['userId']}'>Edit</a></li>";
            }
        }
        
        ?>
    </ul>