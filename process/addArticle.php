<?php
require_once('../configs/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_article'])) {
  $authorId=$_POST['authorId'];
  $article_title = $_POST['article_title'];
  $article_full_text = $_POST['article_full_text'];
  $article_display = $_POST['article_display'];

  $insert_article = "INSERT INTO articles (authorId, article_title, article_full_text,article_display) VALUES ('$authorId', '$article_title', '$article_full_text','$article_display')";


  if ($DbConn->query($insert_article) === TRUE) {
    header("Location: ../viewArticles.php");
  // echo ("New record created successfully");
  } else {
    echo "Error: " . $insert_article . "<br>" . $DbConn->error;
      }

}

?>