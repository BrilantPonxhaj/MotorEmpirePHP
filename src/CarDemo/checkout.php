<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    echo '<script type="text/javascript">
            alert("Please log in to proceed with the purchase.");
            window.location.href = "../Login/login.php";
          </script>';
    exit();
}


// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Custom error handler
function customErrorHandler($errno, $errstr, $errfile, $errline, $errcontext = null) {
    switch ($errno) {
        case E_USER_ERROR:
            $errorMessage = "Critical Error [$errno]: $errstr on line $errline in file $errfile";
            break;
        case E_USER_WARNING:
            $errorMessage = "Warning [$errno]: $errstr on line $errline in file $errfile";
            break;
        case E_USER_NOTICE:
            $errorMessage = "Notice [$errno]: $errstr on line $errline in file $errfile";
            break;
        default:
            $errorMessage = "Error [$errno]: $errstr on line $errline in file $errfile";
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

// Database connection
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "maindb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve car data based on car ID
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['carId'])) {
    $carId = $conn->real_escape_string($_POST['carId']);
    
    // Fetch car data from the database
    $sql = "SELECT * FROM cars WHERE carID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $carId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Store car data in session
        $carData = $result->fetch_assoc();
        $_SESSION['productName'] = $carData['name'];
        $_SESSION['productPrice'] = $carData['price'];
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
$productPrice = isset($_SESSION['productPrice']) ? $_SESSION['productPrice'] : 'No price available';
$productImage = isset($_SESSION['productImage']) ? $_SESSION['productImage'] : '';
$carId = isset($_SESSION['carId']) ? $_SESSION['carId'] : null;

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

    // Initialize card information
    $cardNumber = !empty($_POST['cardNumber']) ? hash('sha256', $conn->real_escape_string($_POST['cardNumber'])) : '';
    $cardExpiry = !empty($_POST['cardExpiry']) ? hash('sha256', $conn->real_escape_string($_POST['cardExpiry'])) : '';
    $cardCVV = !empty($_POST['cardCVV']) ? hash('sha256', $conn->real_escape_string($_POST['cardCVV'])) : '';

    // Insert data into database using prepared statement
    $sql = "INSERT INTO customer_info (name, surname, dateofbirth, country, city, postcode, street1, street2, payment, card_number, card_expiry, card_cvv, car_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssssssss', $name, $surname, $dateofbirth, $country, $city, $postcode, $street1, $street2, $payment, $cardNumber, $cardExpiry, $cardCVV, $carName);

    if ($stmt->execute()) {
        // Remove the car from the database
        $deleteSql = "DELETE FROM cars WHERE carID = ?";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bind_param('i', $carId);
        $deleteStmt->execute();
        $deleteStmt->close();

        $success_message = "You have succesfully bought the car!";
        // Refresh the page after 9 seconds
        header("refresh:9;url=" . $_SERVER['PHP_SELF']);
    } else {
        $error_message = "Error: " . $stmt->error;
    }
    $stmt->close();
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
            <div class="product-price">$<?php echo $productPrice; ?></div>
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
            <form action="" method="post">
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
                                <input class="form-check-input" type="radio" name="payment" id="payCard" value="card" onclick="showCardInfo()">
                                <label class="form-check-label" for="payCard" style="font-size:large">
                                    Pay with Card
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="payCash" value="cash" onclick="hideCardInfo()">
                                <label class="form-check-label" for="payCash" style="font-size:large">
                                    Pay with Cash
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Information -->
                <div id="cardInfo" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="cardNumber" class="form-label">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber" pattern="\d{16}" title="Please enter a valid 16-digit card number">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cardExpiry" class="form-label">Expiry Date</label>
                            <input type="text" class="form-control" id="cardExpiry" name="cardExpiry" placeholder="MM/YY" pattern="(?:0[1-9]|1[0-2])\/[0-9]{2}" title="Please enter a valid expiry date in MM/YY format">
                        </div>
                        <div class="col-md-6">
                            <label for="cardCVV" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cardCVV" name="cardCVV" pattern="\d{3,4}" title="Please enter a valid 3 or 4-digit CVV">
                        </div>
                    </div>
                </div>

                <div class="center-submit">
                    <input type="submit" class="btn btn-primary submit-btn" name="submit" id="submit">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- JavaScript to Toggle Card Information -->
<script>
function showCardInfo() {
    document.getElementById('cardInfo').style.display = 'block';
}

function hideCardInfo() {
    document.getElementById('cardInfo').style.display = 'none';
}
</script>

</body>
</html>
