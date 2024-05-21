<?php 
$DB_SERVER = "localhost:3308";
$DB_USERNAME = "root";
$DB_PASSWORD = "Agnesa.010704";
$DB_NAME = "projekti";

$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if (mysqli_connect_errno()) {
    echo "Falied to connect";
    exit();
}

?>

<?php 
// MainDB database for cars data
$servername = "localhost";
$username = "root";
$password = "Agnesa.010704"; 
$dbname = "maindb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>