<?php                                                                                                                                                                                                  config.php                                                                                                                                                                                                           <?php
$host = "20.255.57.181";
$user = "webuser";
$password = "123456";
$database = "studentdb";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
