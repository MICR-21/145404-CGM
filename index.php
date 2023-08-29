<!DOCTYPE html>
<html>
<head>
    <title>Login Pages</title>
    <link rel="stylesheet" href="css/indexstyle.css">
</head>
<body>
    <form action="process/login.php" method="post">
        <label for="username">Username:</label>
        <br>
        <input type="text" id="User_Name" name="User_Name" size="20" required><br><br>
        <label for="password">Password:</label>
        <br>
        <input type="password" id="Password" name="Password" size="20" required><br><br>
        <label for="usertype">User Type:</label>
        <br>
        
        <select id="UserType" name="UserType">
            <option value="Administrator">Administrator</option>
            <option value="Super_User">Super User</option>
            <option value="Author">Author</option>
        </select><br><br>
        <input type="submit" value="Login" >
        <br>
        <br>
        <a href="add_user.php">ADD USER</a>
    </form>
    
</body>
</html>
