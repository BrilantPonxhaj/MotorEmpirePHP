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

$success_message = '';
$error_message = '';

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

// Retrieve car data based on car ID
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['carId'])) {
    $carId = $conn->real_escape_string($_POST['carId']);
    
    // Fetch car data from the database
    $sql = "SELECT * FROM cars WHERE carID = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        trigger_error("Statement preparation failed: " . $conn->error, E_USER_ERROR);
    }
    $stmt->bind_param('i', $carId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Store car data in session
        $carData = $result->fetch_assoc();
        $_SESSION['productName'] = $carData['name'];
        $_SESSION['productPrice'] = str_replace(',', '', $carData['price']); // Remove commas from the price
        $_SESSION['productImage'] = $carData['image'];
        $_SESSION['carId'] = $carData['carID']; // Store car ID in session
    } else {
        $_SESSION['productName'] = 'No product selected';
        $_SESSION['productPrice'] = 'No price available';
        $_SESSION['productImage'] = '';
        $_SESSION['carId'] = null;
    }
    $stmt->close();
}

// Retrieve product data from session
$productName = isset($_SESSION['productName']) ? $_SESSION['productName'] : 'No product selected';
$productPrice = isset($_SESSION['productPrice']) ? (float)$_SESSION['productPrice'] : 0.00; // Convert to float
$productImage = isset($_SESSION['productImage']) ? $_SESSION['productImage'] : '';
$carId = isset($_SESSION['carId']) ? $_SESSION['carId'] : null;

// Include Stripe PHP library
require '../../vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51PL2if01whnfybSl3EE4RcE3XSfDQQy673bndEoMyqFBLADIakfapImrUUehPz0sOe5fku6YV7VYRCgFf9GpmBXP00jRsXOy6s');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $surname = $conn->real_escape_string($_POST['surname']);
    $dateofbirth = $conn->real_escape_string($_POST['dob']);
    $country = $conn->real_escape_string($_POST['country']);
    $city = $conn->real_escape_string($_POST['city']);
    $postcode = $conn->real_escape_string($_POST['postcode']);
    $street1 = $conn->real_escape_string($_POST['street1']);
    $street2 = $conn->real_escape_string($_POST['street2']);
    $payment = $conn->real_escape_string($_POST['payment']);
    $carName = $productName; // Retrieve car name from session

    if ($payment === 'cash') {
        // Process payment without Stripe
        try {
            // Insert customer data into database
            $sql = "INSERT INTO customer_info (name, surname, dateofbirth, country, city, postcode, street1, street2, payment, car_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                trigger_error("Statement preparation failed: " . $conn->error, E_USER_ERROR);
            }
            $stmt->bind_param('ssssssssss', $name, $surname, $dateofbirth, $country, $city, $postcode, $street1, $street2, $payment, $carName);

            if ($stmt->execute()) {
                // Remove the car from the database
                $deleteSql = "DELETE FROM cars WHERE carID = ?";
                $deleteStmt = $conn->prepare($deleteSql);
                if (!$deleteStmt) {
                    trigger_error("Statement preparation failed: " . $conn->error, E_USER_ERROR);
                }
                $deleteStmt->bind_param('i', $carId);
                $deleteStmt->execute();
                $deleteStmt->close();

                $success_message = "You have successfully bought the car!";
                // Refresh the page after 9 seconds
                header("refresh:9;url=" . $_SERVER['PHP_SELF']);
            } else {
                trigger_error("Execution failed: " . $stmt->error, E_USER_ERROR);
            }
            $stmt->close();
        } catch (Exception $e) {
            $error_message = "Payment processing failed: " . $e->getMessage();
        }
    } else {
        // Process payment with Stripe Checkout
        try {
            $checkout_session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $productName,
                        ],
                        'unit_amount' => $productPrice * 100, // Amount in cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => $baseUrl . 'src/CarDemo/success.php',
                'cancel_url' => $baseUrl . 'src/CarDemo/cancel.php',
            ]);

            // Redirect to Stripe Checkout
            header("Location: " . $checkout_session->url);
            exit();
        } catch (\Stripe\Exception\ApiErrorException $e) {
            $error_message = "Payment failed: " . $e->getMessage();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="../../bootstrap+fonte/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../stylecards.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../bootstrap+fonte/fontAwesome.css">
    <link rel="stylesheet"href="checkoutstyle.css">

    <style>
        body {
            font-size: 16px; /* Base font size */
        }

    </style>
</head>
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
    <!-- Product Card -->
    <div class="product-card">
        <img src="../../<?php echo $productImage; ?>" alt="Product Image">
        <div class="product-info">
            <div class="product-name"><?php echo $productName; ?></div>
            <div class="product-price">$<?php echo number_format($productPrice, 2); ?></div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="heading">Customer Information</h2>
            <?php if (!empty($success_message)): ?>
                <div id="successMessage" class="alert alert-success text-center" role="alert">
                    <?php echo $success_message; ?>
                </div>
            <?php elseif (!empty($error_message)): ?>
                <div id="errorMessage" class="alert alert-danger text-center" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            <form action="" method="post" id="payment-form">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="col-md-6">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select form-control" id="country" name="country" required>
                            <option value="">Select Country</option>
                            <option value="Albania">Albania</option>
                            <option value="Germany">Germany</option>
                            <option value="Kosova">Kosova</option>
                            <option value="UK">UK</option>
                            <option value="USA">USA</option>
                            <!-- Add more countries as needed -->
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="col-md-6">
                        <label for="postcode" class="form-label">Post Code</label>
                        <input type="text" class="form-control" id="postcode" name="postcode">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="street1" class="form-label">Street Name 1</label>
                        <input type="text" class="form-control" id="street1" name="street1" required>
                    </div>
                    <div class="col-md-6">
                        <label for="street2" class="form-label">Street Name 2</label>
                        <input type="text" class="form-control" id="street2" name="street2">
                    </div>
                </div>
             <!-- Payment Method -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="payment-method">
                            <p style="font-size:large">Payment Method:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="payCard" value="card">
                                <label class="form-check-label" for="payCard" style="font-size:large">
                                    Pay with Card
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="payCash" value="cash">
                                <label class="form-check-label" for="payCash" style="font-size:large">
                                    Pay with Cash
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="center-submit">
                    <input type="submit" class="btn btn-primary submit-btn" name="submit" id="submitButton">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
