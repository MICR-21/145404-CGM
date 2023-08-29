<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrator Dashboard</title>
    <link rel="stylesheet" href="css/adminDash.css">
</head>
<body>
    <br>
    <a href="updateUser.php?userId=<?php echo $_SESSION['id']?>">Update Profile</a>
    <br>
    <a href="manageUsers.php">Manage Authors </a>
    <br>
    <a href="logout.php">logout </a>
    <br>
    <a href="viewArticles.php">View Articles </a>
</body>

</html>
