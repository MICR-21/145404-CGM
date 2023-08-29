<?php
require_once('configs/db_connect.php');

session_start();
// if ($_SESSION['UserType'] === 'Author') {
    if(isset($_GET['authorId'])){
        $userId = $_GET['authorId'];
        $spot_user="SELECT * FROM articles WHERE articles.authorId=$userId";  
        $res_spot_user= $DbConn->query($spot_user);
        $row_spot_user = $res_spot_user->fetch_assoc();
     }
// else{
//     header('Location:index.php');
//      exit;
// }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Article</title>
    <link rel="stylesheet" href="css/editArticle.css">
</head>
<body>
    <h1>Edit Article</h1>
    <form action="process/editArticleprocess.php" method="post">
        <label for="updated_title">Title:</label>
        <input type="text" id="updated_title" name="updated_title" value="<?php echo $row_spot_user['article_title']; ?>" required><br><br>
        <label for="updated_full_text">Full Text:</label><br>
        <textarea id="updated_full_text" name="updated_full_text" rows="4" cols="50" required><?php echo $row_spot_user['article_full_text']; ?></textarea><br><br>

        <input type="submit" name="update_article" value="Update Article">
    </form>
    <a href="manageArticles.php">Back to Manage Articles</a>
</body>
</html>
