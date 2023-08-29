<?php
require_once('configs/db_connect.php');

$sql = "SELECT * FROM articles ORDER BY article_created_date DESC LIMIT 6";
$result = $DbConn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Articles</title>
    <link rel="stylesheet" href="css/manageArt.css">
    
</head>
<body>
    <h1>View Articles</h1>

    <!-- List of the last 6 posted Articles -->
    <h2>List of the Last 6 Posted Articles</h2>
    <ul>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['article_title']} - {$row['article_created_date']}</li>";
            echo "<p>". $row["article_full_text"]. "</p>";
            echo '<a href="editArticle.php?authorId=' . $row["authorId"] . '">Edit Article</a> ';
            echo '<a href="process/deleteArticle.php?authorId=' . $row["authorId"] . '">Delete</a>';
        }
        ?>
    </ul>
    
    <?php
    if ($result && $result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["articletitle"] . "</h2>";
            echo "<h3>" . "By " . $row["authorname"] . " on " . $row["publicationdate"] . "</h3>";
            echo "<p>". $row["article_full_text"]. "</p>";
            echo '[<a href="editArticle.php?authorId=' . $row["authorId"] . '">Edit Article</a>] ';
            echo '[<a href="process/deleteArticle.php?authorId=' . $row["authorId"] . '">Delete</a>]';
        }
    }
    ?>

    <a href="manageArticles.php">Back to Home</a>
</body>
</html>
