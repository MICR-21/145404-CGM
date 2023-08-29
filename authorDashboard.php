<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Author Dashboard</title>
    <link rel="stylesheet" href="css/authDash.css">
</head>
<body>
    <h1>Welcome Author!</h1>
    <ul>
        <li><a href="updateUser.php?userId=<?php echo $_SESSION['id']?>">Update Profile</a>
        </li>
        <li><a href="manageArticles.php">Manage Articles</a></li>
        <li><a href="ViewArticles.php">View Articles</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
