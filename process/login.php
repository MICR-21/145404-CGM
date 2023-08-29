<?php
session_start();
require_once '../configs/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_username = mysqli_escape_string($DbConn, $_POST["User_Name"]);
    $entered_password = mysqli_escape_string($DbConn, $_POST["Password"]);

    if (isset($_POST['UserType'])) {
        $UserType = $_POST['UserType'];

        $query = "SELECT * FROM users WHERE User_Name = '$entered_username' AND UserType = '$UserType' LIMIT 1";
        $res_spot_user = $DbConn->query($query);

        if ($res_spot_user->num_rows == 1) {
            $row_spot_user = $res_spot_user->fetch_assoc();
            $stored_password = $row_spot_user["Password"];
            $userId=$row_spot_user["userId"];
            

            if (password_verify($entered_password, $stored_password)) {
                $_SESSION['id']=$userId;
                $_SESSION['user'] = $row_spot_user;
                $_SESSION['UserType'] = $UserType; 
                
                
                if ($_SESSION['UserType'] === 'Administrator') {
                    header('Location:../adminDashboard.php');
                    exit;
                } elseif ($_SESSION['UserType'] === 'Super_User') {
                    header('Location:../super_Dashboard.php');
                    exit;
                } elseif ($_SESSION['UserType'] === 'Author') {
                    header('Location:../authorDashboard.php');
                    exit;
                }
            } else {
                die("Error: Wrong Password");
            }
        } else {
            die("Error: username doesn't exist/ Wrong UserType");
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}

$DbConn->close();
?>
