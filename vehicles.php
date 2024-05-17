<?php

require_once('database/configDatabase.php');
// Fetch product data from the database
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

$products = [];
if ($result) {
    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    } else {
        echo "No products found in the database.";
    }
} else {
    // Handle SQL query errors
    echo "Error executing SQL query: " . $conn->error;
}

// Close the database connection
$conn->close();

// Check if the cookie exists
if (isset($_COOKIE['colorSettings'])) {
    // Explode the string into an array based on the delimiter and trim spaces
    $colors = array_map('trim', explode('|', $_COOKIE['colorSettings']));

    $backgroundColor = $colors[0]; // Assuming this is '#222831'
    $_Color = $colors[1]; // Assuming this is 'white'
} else {
    // Default colors if the cookie isn't set
    $backgroundColor = 'defaultBackground'; // Adjust these to your desired defaults
    $_Color = 'defaultHeader'; // Adjust these to your desired defaults
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MotorEmpire | Vehicles</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--External Css-->
    <link rel="stylesheet" href="stylecards.css">
    <link rel="stylesheet" href="style.css">
    <style>
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
            background-color: <?php echo htmlspecialchars($backgroundColor); ?>;
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
            height: 10px; /* Adjust based on your layout */
            margin: auto; /* Center the navbar */
            color: <?php echo htmlspecialchars($_Color); ?>;
            font-size: 1.6rem;
            margin: 0.6rem;
            justify-content: space-between;
        }
        header .navbar a:hover {
            color: var(--main);
            text-decoration: none;
        }
        .icon-cart {
            position: relative;
            margin-right: 35px;
        }
        .icon-cart span {
            position: absolute;
            background-color: red;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            color: #fff;
            top: 50%;
            right: -20px;
        }
        .featured-places .featured-item .card-image {
            overflow: hidden;
            width: 100%;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        } 
        .featured-places .featured-item {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Horizontal offset, vertical offset, blur radius, color */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for hover effects */
        }
        .featured-item:hover {
            box-shadow: 0 20px 16px rgba(0, 0, 0, 0.4); /* Larger shadow on hover for a "lifting" effect */
            transform: scale(1.05); /* Enlarge the card by 5% */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4); /* Larger shadow on hover for a "lifting" effect */
        }
        .no-products {
            text-align: center;
            margin-top: 50px;
            font-size: 24px;
            color: red;
        }
        .filter-container {
            background-color: #f8f9fa; /* Light grey background */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px; /* Adjusted margin-top for better spacing */
        }
        .filter-container h3 {
            color: #333;
            border-bottom: 2px solid #ff0000; /* Red accent under the heading */
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .filter-container select, .filter-container .btn {
            width: 100%;
            height: 40px;
            border-radius: 7px;
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 5px 10px;
            font-size: 14px;
            color: #333;
        }

        #Searchbtn {
            background-color: #ff0000; /* Red color */
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }
        #Searchbtn:hover {
            background-color: #ffffff; /* Darker red on hover */
            color: #ff0000;
            border: 1px solid #ff0000;
            font-size: 16px;
        }
        @media (max-width: 768px) {
            .form-group {
                margin-bottom: 10px;
            }
            .filter-container select, .filter-container .btn {
                font-size: 14px;
            }
        }
    </style>
</head>
<body onload="document.getElementById('filterForm').reset();">
    <!-- HEADER/NAVBAR start -->
    <header>
        <div id="MenuBtn" class="fas fa-bars"></div>
        <a href="Home/index.php"  class="logo"><img src="images/logo2.png" width="100px" height="50px"></a>
        <nav class="navbar">
            <a href="Home/index.php">Home</a>
            <a href="vehicles.php">Vehicles</a>
            <a href="src/ContactUs/contact.php">Contact</a>
        </nav>
    </header>
    <br><br>

    <div style="margin-top: 70px;" class="filter-container">
        <h3 class="text-center text-uppercase font-monospace m-3">Filter</h3>
        <div class="container mt-1">
            <form method="post" id="filterForm">
                <div class="row" style="margin-top: 20px">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Used/New:</label>
                            <select class="form-control" name="usedNew">
                                <option value="">-- All --</option>
                                <option value="new vehicles">New vehicle</option>
                                <option value="used vehicles">Used vehicle</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Model:</label>
                            <select class="form-control" name="model">
                                <option value="">-- All --</option>
                                <option value="BMW 7 series">BMW 7 series</option>
                                <option value="BMW X7">BMW X7</option>
                                <option value="BMW M5 CS">BMW M5</option>
                                <option value="BMW 5 series">BMW 5 series</option>
                                <option value="BMW M4 Competition">BMW M4</option>
                                <option value="BMW M3 CS">BMW M3 CS</option>
                                <option value="BMW M3 Competition">BMW M3 Competition</option>
                                <option value="BMW 3 series">BMW 3 Series</option>
                                <option value="BMW iX2">BMW iX2</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="sortOrder">Sort Names:</label>
                            <select class="form-control" name="sortOrder">
                                <option value="">Select Order</option>
                                <option value="A-Z">A to Z</option>
                                <option value="Z-A">Z to A</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Kilometers:</label>
                            <select class="form-control" name="kilometers">
                                <option value="">-- All --</option>
                                <option value="kmRange1">0Km- 50000Km</option>
                                <option value="kmRange2">50000Km - 100000km</option>
                                <option value="kmRange3">100000Km - 150000Km</option>
                                <option value="kmRange4">150000Km - 250000Km</option>
                                <option value="kmRange5">250000Km - ...</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Price:</label>
                            <select class="form-control" name="sortPrice">
                                <option value="">Select</option>
                                <option value="lowestToHighest">Lowest to Highest</option>
                                <option value="highestToLowest">Highest to Lowest</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Gearbox:</label>
                            <select class="form-control" name="gearbox">
                                <option value="">-- All --</option>
                                <option value="Manual">Manual</option>
                                <option value="Automatic">Automatic</option>
                            </select>
                        </div>
                    </div>

                    <button id="Searchbtn" class="btn" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    // Sort and filter products
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usedNew = $_POST['usedNew'] ?? '';
        $model = $_POST['model'] ?? '';
        $kilometers = $_POST['kilometers'] ?? '';
        $gearbox = $_POST['gearbox'] ?? '';
        $sortOrder = $_POST['sortOrder'] ?? '';
        $sortPrice = $_POST['sortPrice'] ?? '';

        // Filter products based on selection
        $filteredProducts = array_filter($products, function ($product) use ($usedNew, $model, $kilometers, $gearbox) {
            return ($usedNew === '' || $product['category'] === $usedNew) &&
                   ($model === '' || $product['model'] === $model) &&
                   ($gearbox === '' || $product['gearbox'] === $gearbox) &&
                   ($kilometers === '' || checkKilometersRange($product['kilometers'], $kilometers));
        });

        // Sort products based on selection
        if ($sortOrder === 'A-Z' || $sortOrder === 'Z-A') {
            usort($filteredProducts, function ($a, $b) use ($sortOrder) {
                if ($sortOrder === 'A-Z') {
                    return strcmp($a['name'], $b['name']);
                } else {
                    return strcmp($b['name'], $a['name']);
                }
            });
        }

        if ($sortPrice === 'lowestToHighest' || $sortPrice === 'highestToLowest') {
            usort($filteredProducts, function ($a, $b) use ($sortPrice) {
                if ($sortPrice === 'lowestToHighest') {
                    return $a['price'] <=> $b['price'];
                } else {
                    return $b['price'] <=> $a['price'];
                }
            });
        }

        $products = $filteredProducts;
    }

    function checkKilometersRange($kmValue, $range) {
        $km = intval(str_replace(',', '', $kmValue)); // Remove commas and convert to integer
        switch ($range) {
            case 'kmRange1': return $km <= 50000;
            case 'kmRange2': return $km > 50000 && $km <= 100000;
            case 'kmRange3': return $km > 100000 && $km <= 150000;
            case 'kmRange4': return $km > 150000 && $km <= 250000;
            case 'kmRange5': return $km > 250000;
            default: return true; // No filter selected
        }
    }
    ?>

    <section class="featured-places">
        <div class="container" style="margin-top:50px;">
            <div class="row" id="productContainer">
                <?php if (empty($products)): ?>
                    <div class="col-12">
                        <div class="no-products text-center">
                            No products found
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-4">
                            <div class="featured-item">
                                <div class="card-image">
                                    <img src="<?= htmlspecialchars($product['image']); ?>" alt="Loading image...">
                                </div>
                                <div class="d-flex justify-content-around mt-2">
                                    <strong class="text-muted"><i class="fa fa-dashboard"></i> <?= htmlspecialchars($product['kilometers']); ?> km</strong>
                                    <strong class="text-muted"><i class="fa fa-cube"></i> <?= htmlspecialchars($product['engineType']); ?></strong>
                                    <strong class="text-muted"><i class="fa fa-cog"></i> <?= htmlspecialchars($product['gearbox']); ?></strong>
                                </div>
                                <div class="card-heading"><?= htmlspecialchars($product['name']); ?></div>
                                <div class="card-text">
                                    <?php
                                    // Shorten description if it's longer than 100 characters
                                    echo strlen($product['description']) > 100 ? substr($product['description'], 0, 100) . '...' : $product['description'];
                                    ?>
                                </div>
                                <div class="card-text">$<?= htmlspecialchars($product['price']); ?></div>
                                <a href="<?= htmlspecialchars($product['link']); ?>" class="card-button">Purchase</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!--Bootstrap5 JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>   
        var products = <?php echo json_encode($products); ?>;
    </script>
</body>
</html>
