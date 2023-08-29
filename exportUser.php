<h2>Export Users List</h2>
    <p><a href="export_articles.php?format=pdf">Export as PDF</a></p>
    <p><a href="export_users.php?format=text">Export as Text</a></p>
    <p><a href="export_users.php?format=excel">Export as Excel</a></p>

    <a href="super_Dashboard.php">Back to Dashboard</a>
    <?php
require_once('configs/db_connect.php');

// Start session
session_start();

// Check if the user is logged in as a Super_User
if (!isset($_SESSION['userType']) || $_SESSION['userType'] !== 'Super_User') {
    header('Location: index.php');
    exit;
}


// Retrieve all Users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Generate and export the user list based on the selected format
if ($_GET['format'] === 'pdf') {

} elseif ($_GET['format'] === 'text') {

} elseif ($_GET['format'] === 'excel') {}

?>
