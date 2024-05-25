<?php
require_once('db.php'); // Ensure this path is correct

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['carID'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $model = $_POST['model'];
        $price = $_POST['price'];
        $kilometers = $_POST['kilometers'];
        $engineType = $_POST['engineType'];
        $gearbox = $_POST['gearbox'];
        $description = $_POST['description'];

        $stmt = $conn->prepare("UPDATE cars SET name=?, category=?, model=?, price=?, kilometers=?, engineType=?, gearbox=?, description=? WHERE carID=?");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("ssssssssi", $name, $category, $model, $price, $kilometers, $engineType, $gearbox, $description, $id);

        if ($stmt->execute()) {
            echo "Car data updated successfully!";
        } else {
            http_response_code(500);
            echo "Error updating car data: " . $stmt->error;
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
