<?php
include_once "configs/db_connect.php";
session_start();
if(isset($_GET['userId'])){
        $userId = $_GET['userId'];
        $spot_user="SELECT * FROM users WHERE users.userId=$userId";  $res_spot_user= $DbConn->query($spot_user);
        $row_spot_user = $res_spot_user->fetch_assoc();
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User Details</title>
    <link rel="stylesheet" href="css/updateuser.css">
</head>
<body>
    <h1>Update User Details</h1>
    <form action="process/update_userProcess.php" method="post">

        <label for="full_name">Full Name:</label>
        <br>
        <input type="text" id="full_name" name="Full_Name" Placeholder = "Enter your full_name" value="<?php print $row_spot_user["Full_Name"]; ?>" required><br><br>

        <label for="email">Email:</label>
        <br>
        <input type="email" id="email" name="email" Placeholder = "Enter your email" value="<?php print $row_spot_user["email"]; ?>" required><br><br>

        <label for="phone_number">Phone Number:</label>
        <br>
        <input type="text" id="phone_number" name="phone_Number" Placeholder = "Enter your phone_number" value="<?php print $row_spot_user["phone_Number"];?>" required><br><br>

        <label for="Password">Password:</label>
        <br>
        <input type="Password" id="Password" name="Password" Placeholder = "Enter your password" value="<?php print $row_spot_user["Password"]; ?>" required><br><br>

        <label for="user_type">User Type:</label>
        <br>
        <input id="user_type" name="user_type" Placeholder = "Enter your UserType" value="<?php print $row_spot_user["UserType"]; ?>" required><br><br>

        <label for="full_name">Username:</label>
        <br>
        <input type="text" id="User_Name" name="User_Name" Placeholder = "Enter your UserName" value="<?php print $row_spot_user["User_Name"]; ?>" required><br><br>

        <label for="Address">Address:</label>
        <br>
        <textarea id="Address" name="Address" value="<?php print $row_spot_user["Address"]; ?>" required></textarea><br><br>

        <input type="submit" name="Update" value="Update User">
    </form>
</body>
</html>
