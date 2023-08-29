<?php
require_once "configs/db_connect.php";
session_start();

?>
<head>
  <link rel="stylesheet" href="css/manageUsers.css">
</head>
  <body>
  <div class = "content_section row">
            <div class = "content">
                <h1>Users</h1>
                <table>
                    <tr>
                        <th>userId</th>
                        <th>Full_Name</th>
                        <th>email</th>
                        <th>phone_Number</th>
                        <th>User_Name</th>
                        <th>UserType</th>
                        <th>Address</th>
                        <th>Links</th>
                    </tr>
<?php
if(($_SESSION['UserType'] === 'Administrator'))
{
  $spot_user = "SELECT * FROM users where UserType = 'Author'";
  $result_spot_user = $DbConn->query($spot_user);
  if ($result_spot_user->num_rows>0 ) {
    // output data of each row
    while($user_row=$result_spot_user->fetch_assoc()) {
          ?>
            <tr>
              <td><?php print $user_row['userId']; ?></td>
              <td><?php print $user_row["Full_Name"]; ?></td>
              <td><?php print $user_row["email"]; ?></td>
              <td><?php print $user_row["phone_Number"]; ?></td>
              <td><?php print $user_row["User_Name"]; ?></td>
              <td><?php print $user_row["UserType"]; ?></td>
              <td><?php print $user_row["Address"]; ?></td>
              <td>
                  [ <a href="updateUser.php?userId=<?php print $user_row["userId"]?>" title="Update Users <?php print $user_row["Full_Name"]; ?>">Update User</a>][<a href="add_user.php">Add New User</a>] [<a href="listUser.php">List All Users</a>] [ <a href="process/deleteUser_process.php?userId=<?php print $user_row["userId"]; ?>" OnClick="return confirm('Are you sure you want to delete <?php print $user_row["Full_Name"]; ?> from the database?')" title="Delete <?php print $user_row["Full_Name"]; ?>">Delete User</a> ] [<a href="exportUsers.php">Export Users</a>]
              </td>
            </tr>
          <?php
          }
          }
}elseif(($_SESSION['UserType'] === 'Super_User')){
  $spot_user = "SELECT * FROM users";
$result_spot_user = $DbConn->query($spot_user);

if ($result_spot_user->num_rows>0 ) {
  // output data of each row
  while($user_row=$result_spot_user->fetch_assoc()) {
        ?>
          <tr>
            <td><?php print $user_row['userId']; ?></td>
            <td><?php print $user_row["Full_Name"]; ?></td>
            <td><?php print $user_row["email"]; ?></td>
            <td><?php print $user_row["phone_Number"]; ?></td>
            <td><?php print $user_row["User_Name"]; ?></td>
            <td><?php print $user_row["UserType"]; ?></td>
            <td><?php print $user_row["Address"]; ?></td>
            <td>
                [ <a href="updateUser.php?userId=<?php print $user_row["userId"]?>" title="Update Users <?php print $user_row["Full_Name"]; ?>">Update User</a>] [<a href="add_user.php">Add New User</a>] [<a href="listUser.php">List All Users</a>] [ <a href="process/deleteUser_process.php?userId=<?php print $user_row["userId"]; ?>" OnClick="return confirm('Are you sure you want to delete <?php print $user_row["Full_Name"]; ?> from the database?')" title="Delete <?php print $user_row["Full_Name"]; ?>">Delete User</a> ] [<a href="exportUsers.php">Export Users</a>]
            </td>
          </tr>
        <?php
        }
        }
}else {
  echo "0 results";
}
?>
          </table>
    </div>
          </div>
  </body>
        