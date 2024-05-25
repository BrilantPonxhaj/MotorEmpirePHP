<?php
require_once('db.php'); // Ensure this path is correct

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $carID = $_POST['carID'];

        $stmt = $conn->prepare("DELETE FROM cars WHERE carID = ?");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("i", $carID);

        if ($stmt->execute()) {
            echo "Car deleted successfully!";
        } else {
            http_response_code(500);
            echo "Error deleting car: " . $stmt->error;
        }

        $stmt->close();
    } else {
        http_response_code(400);
        echo "Invalid request method!";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
