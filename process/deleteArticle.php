<?php
require_once('../configs/db_connect.php');
if (isset($_GET['authorId'])) {
    $authorId = $_GET['authorId'];
    $delete_article="DELETE FROM articles WHERE authorId = $authorId;";

if ($DbConn->query($delete_article) === TRUE) {
    header("Location: ../viewArticles.php");
}
}
?>