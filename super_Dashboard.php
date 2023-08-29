<?php
require_once "configs/db_connect.php";
$sql = "SELECT * FROM users";
$result = $DbConn->query($sql);
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/superDash.css">
</head>
<body>
<?php
    if(isset($_SESSION['UserType']) === 'Super_User'){
        while ($row = $result->fetch_assoc()) {
        echo "<h1>Welcome, " . $row['Full_Name'] . "</h1>";
            }
    }
    
?>

    <a href="update_Superprofile.php?userId=<?php echo $_SESSION['id']?>">Update Profile </a><br>
    <a href="manageUsers.php">Manage Other Users</a><br>
    <a href="logout.php">Logout</a><br>
</body>
</html>
