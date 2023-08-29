<?php
require_once('configs/db_connect.php');
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Articles</title>
    <link rel="stylesheet" href="css/manageArt.css">
</head>
<body>
    <h1>List of Articles</h1>
    <a href="viewArticles.php">View Articles</a>

    <h2>Add New Article</h2>
    <a href="articlEntry.php?userId=<?php echo $_SESSION['id']?>">Add Article</a>
    <br>
    <h2>Edit Article</h2>
    <a href="editArticle.php?userId=$userId">Edit Article</a>
    <br>

    <h2>Dashboard</h2>
    <a href="authorDashboard.php">Back to Dashboard</a>
</body>
</html>
