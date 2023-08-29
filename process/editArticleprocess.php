<?php
require_once('configs/db_connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_article'])) {
    $articleId = $_POST['article_id'];
    $article_title = $_POST['updated_title'];
    $article_full_text = $_POST['updated_full_text'];

    $update_article="UPDATE articles SET article_title = '$article_title', article_full_text = '$article_full_text' 
    WHERE article_id = $articleId;
    ";
}
?>