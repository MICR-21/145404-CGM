<?php
require_once "configs/db_connect.php";
session_start();
if(isset($_GET['userId'])){
    $userId = $_GET['userId'];
    $spot_user="SELECT * FROM users WHERE users.userId=$userId";  $res_spot_user= $DbConn->query($spot_user);
    $row_spot_user = $res_spot_user->fetch_assoc();
}
if(isset($_SESSION["data"])){
?>
    <?php print "Welcome " . $_SESSION["data"]
    ["authorname"]; ?>
    <a href = "logout.php" >log out</a>
    <?php        
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Blog Submission Form
</title>
<script>
        function resetForm() {
            document.getElementById("blogForm").reset();
        }
    </script>
    <link rel="stylesheet" href="css/articlEntry.css">
</head>
    <body>
        <div class="form-container">
            <h1 class="form-header">Blog Submission Form</h1>

            <form action="process/addArticle.php" method="POST" autocomplete="off">
                <label class="form-label" for="authorId">Author ID</label>
                <input class="form-input" type="text" id="authorId" name="authorId" value="<?php print $row_spot_user["userId"]; ?>" required>

                <label class="form-label" for="article_title">Article Title</label>
                <input class="form-input" type="text" id="article_title" placeholder="Please enter the title of the blog" name="article_title" required>

                <label class="form-label" for="article_full_text">Article Full Text</label>
                <textarea class="form-textarea" id="article_full_text" name="article_full_text" placeholder="Write your blog here..." required></textarea>

                <label class="form-label" for="article_display">Display Article:</label>
                <select class="form-select" id="article_display" name="article_display">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

                <input class="form-button" type="submit" name="add_article" value="Add Article">
                <input class="form-reset-button" type="reset" value="Reset Form">
            </form>
        </div>
    </body>
</html>





