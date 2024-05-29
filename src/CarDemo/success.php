<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Custom error handler
function customErrorHandler($errno, $errstr, $errfile, $errline, $errcontext = [])
{
    $errorMessage = "[$errno] $errstr in $errfile on line $errline";
    switch ($errno) {
        case E_USER_ERROR:
            $errorMessage = "Gabim kritik [$errno]: $errstr në linjën $errline në skedarin $errfile";
            break;
        case E_USER_WARNING:
            $errorMessage = "Paralajmërim [$errno]: $errstr në linjën $errline në skedarin $errfile";
            break;
        case E_USER_NOTICE:
            $errorMessage = "Njoftim [$errno]: $errstr në linjën $errline në skedarin $errfile";
            break;
        default:
            $errorMessage = "Gabim [$errno]: $errstr në linjën $errline në skedarin $errfile";
            break;
    }
    error_log($errorMessage); // Log the error
    echo $errorMessage; // Display the error message
}

// Set the custom error handler
set_error_handler("customErrorHandler");

// Start the session
session_start();

// Define the base URL of your project
$baseUrl = "http://localhost:8080/Web-2-1/";

// Database connection
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "maindb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    trigger_error("Connection failed: " . $conn->connect_error, E_USER_ERROR);
}

// Check if car ID is set in the session
if (isset($_SESSION['carId'])) {
    $carId = $_SESSION['carId'];
    $name = $_SESSION['name'];
    $surname = $_SESSION['surname'];
    $dateofbirth = $_SESSION['dob'];
    $country = $_SESSION['country'];
    $city = $_SESSION['city'];
    $postcode = $_SESSION['postcode'];
    $street1 = $_SESSION['street1'];
    $street2 = $_SESSION['street2'];
    $carName = $_SESSION['productName'];
    $payment = 'card'; // Assuming payment method is 'card'. Update as needed.

    // Only process the transaction if car ID exists in session
    try {
        // Insert customer data into the database
        $sql = "INSERT INTO customer_info (name, surname, dateofbirth, country, city, postcode, street1, street2, payment, car_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Statement preparation failed: " . $conn->error);
        }
        $stmt->bind_param('ssssssssss', $name, $surname, $dateofbirth, $country, $city, $postcode, $street1, $street2, $payment, $carName);

        if ($stmt->execute()) {
            // Remove the car from the database
            $deleteSql = "DELETE FROM cars WHERE carID = ?";
            $deleteStmt = $conn->prepare($deleteSql);
            if (!$deleteStmt) {
                throw new Exception("Statement preparation failed: " . $conn->error);
            }
            $deleteStmt->bind_param('i', $carId);
            if ($deleteStmt->execute()) {
                // Clear the session
                session_unset();
                session_destroy();
                // Redirect to success page
                header("Location: success.php");
                exit();
            } else {
                throw new Exception("Execution failed: " . $deleteStmt->error);
            }
        } else {
            throw new Exception("Execution failed: " . $stmt->error);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $stmt->close();
        $conn->close();
    }
} else {
    echo "No car ID found in the session.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="../../bootstrap+fonte/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../stylecards.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../bootstrap+fonte/fontAwesome.css">
    <link rel="stylesheet"href="checkoutstyle.css">
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
<body>
    <header>
        <div id="MenuBtn" class="fas fa-bars"></div>
        <a href="../../Home/index.php" class="logo"><span><img src="../../images/logo2.png" width="100px" height="50px"></span></a>
        <nav class="navbar">
            <a href="../../Home/index.php">Home</a>
            <a href="../../vehicles.php">Vehicles</a>
            <a href="../../src/ContactUs/contact.php">Contact</a>
        </nav>
    </header>
    <br><br>
    <div class="container" style="margin-top: 80px">
        <div class="alert alert-success" role="alert">
            Payment was successful! You have successfully bought the car.
        </div>
        <a href="../../Home/index.php" class="button">Return to Homepage</a>
    </div>
</body>
</html>
