<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Custom error handler
function customErrorHandler($errno, $errstr, $errfile, $errline, $errcontext) {
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
    $sql = "SELECT * FROM cars WHERE carID = '$carId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Store car data in session
        $carData = $result->fetch_assoc();
        $_SESSION['productName'] = $carData['name'];
        $_SESSION['productPrice'] = $carData['price'];
        $_SESSION['productImage'] = $carData['image'];
    } else {
        $_SESSION['productName'] = 'No product selected';
        $_SESSION['productPrice'] = 'No price available';
        $_SESSION['productImage'] = '';
    }
}

// Retrieve product data from session
$productName = isset($_SESSION['productName']) ? $_SESSION['productName'] : 'No product selected';
$productPrice = isset($_SESSION['productPrice']) ? $_SESSION['productPrice'] : 'No price available';
$productImage = isset($_SESSION['productImage']) ? $_SESSION['productImage'] : '';

$success_message = '';
$error_message = '';

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

    // Initialize card information
    $cardNumber = !empty($_POST['cardNumber']) ? hash('sha256', $conn->real_escape_string($_POST['cardNumber'])) : '';
    $cardExpiry = !empty($_POST['cardExpiry']) ? hash('sha256', $conn->real_escape_string($_POST['cardExpiry'])) : '';
    $cardCVV = !empty($_POST['cardCVV']) ? hash('sha256', $conn->real_escape_string($_POST['cardCVV'])) : '';

    // Insert data into database
    $sql = "INSERT INTO customer_info (name, surname, dateofbirth, country, city, postcode, street1, street2, payment, card_number, card_expiry, card_cvv)
            VALUES ('$name', '$surname', '$dateofbirth', '$country', '$city', '$postcode', '$street1', '$street2', '$payment', '$cardNumber', '$cardExpiry', '$cardCVV')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "New record created successfully";
        // Refresh the page after 9 seconds
        header("refresh:9;url=" . $_SERVER['PHP_SELF']);
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
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

    <style>
        .container {
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        h2.heading {
            color: red;
            text-align: center;
            margin-bottom: 30px;
        }
        label.form-label {
            color: red;
        }
        input.form-control,
        select.form-select {
            border: 1px solid red;
            border-radius: 5px;
        }
        input[type="radio"].form-check-input {
            border-color: red;
        }
        .btn-primary {
            background-color: red;
            border-color: red;
        }
        .btn-primary:hover {
            background-color: #c62828;
            border-color: #c62828;
        }
        svg {
            width: 30px;
        }
        .heading {
            padding-bottom: 2rem;
            font-size: 4.5rem;
            text-align: center;
        }
        header {
            z-index: 10000;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 2rem 9%;
            background-color: #ffffff;
            box-shadow: var(--box_shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header .logo {
            color: #000;
            border: #000;
            font-size: 2.5rem;
            font-weight: 700;
        }
        header .logo span {
            color: var(--main);
        }
        header .navbar {
            position: relative;
            min-height: 9px;
            margin-bottom: 6px;
            border: 1px solid transparent;
        }
        header .navbar a {
            height: 10px;
            margin: auto;
            color: #000;
            font-size: 1.6rem;
            margin: 0.6rem;
            justify-content: space-between;
        }
        header .navbar a:hover {
            color: var(--main);
            text-decoration: none;
        }
        .center-submit {
            display: flex;
            justify-content: center;
        }
        .payment-method {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        .payment-method p {
            font-size: 1.2rem;
            font-weight: bold;
            color: red;
            margin-bottom: 10px;
        }
        .payment-method .form-check {
            margin-bottom: 10px;
        }
        .payment-method .form-check-label {
            font-size: 1.1rem;
            color: #333;
        }
        .payment-method .form-check-input {
            margin-right: 10px;
        }
        .product-card {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .product-card img {
            width: 150px;
            height: auto;
            border-radius: 10px;
            margin-right: 20px;
        }
        .product-card .product-info {
            display: flex;
            flex-direction: column;
        }
        .product-card .product-info .product-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .product-card .product-info .product-price {
            font-size: 20px;
            color: red;
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
                            <p>Payment Method:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="payCard" value="card" onclick="showCardInfo()">
                                <label class="form-check-label" for="payCard">
                                    Pay with Card
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="payCash" value="cash" onclick="hideCardInfo()">
                                <label class="form-check-label" for="payCash">
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
                    <input type="submit" class="btn btn-primary" name="submit" id="submit">
                </div>
            </form>
        </div>
    </div>
</div>

    <?php   
        if (!empty($success_message)) {
        echo '<div class="alert alert-success mt-3">' . $success_message . '</div>';
        }
        if (!empty($error_message)) {
        echo '<div class="alert alert-danger mt-3">' . $error_message . '</div>';
        }
    ?>


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
