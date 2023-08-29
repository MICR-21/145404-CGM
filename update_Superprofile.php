<?php
include_once "configs/db_connect.php";
if(isset($_GET['userId'])){
    $userId = $_GET['userId'];
    $spot_user="SELECT * FROM users WHERE users.userId=$userId";  $res_spot_user= $DbConn->query($spot_user);
    $row_spot_user = $res_spot_user->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
    <link rel="stylesheet" href="css/updateuser.css">
</head>
<body>
    <h1>Update Profile</h1>
    <form action="process/updateSuper.php" method="post">
        <label for="full_name">Full Name:</label>
        <input type="text" id="Full_Name" name="Full_Name" value="<?php print $row_spot_user["Full_Name"]; ?>"><br>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"value="<?php print $row_spot_user["email"]; ?>" ><br>
        <br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="<?php print $row_spot_user["phone_Number"]; ?>" >
        <br>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="Password" name="Password" value="<?php print $row_spot_user["Password"]; ?>"><br>
        <br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" value="<?php print $row_spot_user["Address"]; ?>"></textarea><br>
        <br>
        
        <input type="submit" name="update_user" value="Update Profile">
    </form>
</body>
</html>

