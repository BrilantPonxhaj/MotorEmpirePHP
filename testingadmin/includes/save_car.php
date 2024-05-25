<?php
require_once('db.php'); // Ensure this path is correct

function logError($message) {
    error_log($message, 3, 'errors.log');
}

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $model = $_POST['model'];
        $price = $_POST['price'];
        $kilometers = $_POST['kilometers'];
        $engineType = $_POST['engineType'];
        $gearbox = $_POST['gearbox'];
        $description = $_POST['description'];
        $link = $_POST['link'];

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = $_FILES['image']['name'];
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            $imageBaseName = pathinfo($imageName, PATHINFO_FILENAME);
            $imageDir = 'images/bmw cards/';
            $imageUploadPath = $imageDir . $imageName;

            // Check if the upload directory exists
            if (!is_dir($imageDir)) {
                if (!mkdir($imageDir, 0777, true)) {
                    throw new Exception("Failed to create image upload directory.");
                }
            }

            // Check if the file already exists and make the filename unique
            $counter = 1;
            while (file_exists($imageUploadPath)) {
                $imageUploadPath = $imageDir . $imageBaseName . '_' . $counter . '.' . $imageExtension;
                $counter++;
            }

            // Check if the file is actually uploaded
            if (!is_uploaded_file($imageTmpPath)) {
                throw new Exception("Possible file upload attack: " . $imageName);
            }

            // Attempt to move the uploaded file
            if (!move_uploaded_file($imageTmpPath, $imageUploadPath)) {
                throw new Exception("Failed to move uploaded file.");
            }
        } else {
            throw new Exception("Image file is required.");
        }

        // Find the current max carID and set the next auto-increment value
        $result = $conn->query("SELECT MAX(carID) AS maxID FROM cars");
        if ($result) {
            $row = $result->fetch_assoc();
            $maxID = $row['maxID'];
            $nextID = ($maxID + 1) ; 
            $conn->query("ALTER TABLE cars AUTO_INCREMENT = $nextID");
        }

        $stmt = $conn->prepare("INSERT INTO cars (name, category, model, price, kilometers, engineType, gearbox, description, image, link) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("ssssssssss", $name, $category, $model, $price, $kilometers, $engineType, $gearbox, $description, $imageUploadPath, $link);

        if ($stmt->execute()) {
            echo "Car data added successfully!";
        } else {
            throw new Exception("Error adding car data: " . $stmt->error);
        }

        $stmt->close();
    } else {
        throw new Exception("Invalid request method!");
    }
} catch (Exception $e) {
    http_response_code(500);
    $errorMessage = "Error: " . $e->getMessage();
    echo $errorMessage;
    logError($errorMessage . " - " . $e->getFile() . " : " . $e->getLine());
}

$conn->close();
?>
