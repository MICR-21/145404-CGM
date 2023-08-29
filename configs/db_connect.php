<?php
require_once "constants.php";
$DbConn = new mysqli($servername, $username, $password, $dbname);
if ($DbConn->connect_error) {
  die("Connection failed: " . $DbConn->connect_error);
}

?>