<?php 
$DB_SERVER = "localhost:3308";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "projekti";

$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if (mysqli_connect_errno()) {
    echo "Falied to connect";
    exit();
}

?>
