  GNU nano 6.2                                                                                                                                                                                                 config.php                                                                                                                                                                                                           <?php
$host = "localhost";
$user = "webuser";
$password = "123456";
$database = "studentdb";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
