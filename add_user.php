<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
    <link rel="stylesheet" href="css/addUser.css">
</head>
<body>
    <h1>Add New User</h1>
    <form action="process/add_user_process.php" method="post" enctype="multipart/form-data">
        <label for="full_name">Full Name:</label>
        <br>
        <input type="text" id="full_name" name="full_name" max length="18" size="30"  required><br>
        <br>

        <label for="email">Email:</label>
        <br>
        <input type="email" id="email" name="email" size="30"   required><br>
        <br>

        <label for="User_Name">UserName:</label>
        <br>
        <input type="text" id="User_Name" name="User_Name" size="30"   required><br>
        <br>

        <label for="phone_number">Phone Number:</label>
        <br>
        <input type="text" id="phone_number" name="phone_number" size="30"   required><br>
        <br>

        <label for="password">Password:</label>
        <br>
        <input type="password" id="Password" name="Password" size="30" required><br>
        <br>

        <label for="user_type">User Type:</label>
        <br>
        <select id="user_type" name="user_type"  >
            <option value="Super_User">Super_User</option>
            <option value="Administrator">Administrator</option>
            <option value="Author">Author</option>
        </select><br>
        <br>

        <label for="address">Address:</label>
        <br>
        <textarea id="address" name="address" size="30" ></textarea><br>
        <br>

        <label for="file_name">profileImage:</label>
        <br>
        <input type="file" name="file_name" >
        <br>
        <br>

        <input type="submit" name="add_user" size="30"  value="Add User">
    </form>
</body>
</html>
