
<?php
// Check if the cookie exists
if(isset($_COOKIE['colorSettings'])) {
    // Explode the string into an array based on the delimiter and trim spaces
    $colors = array_map('trim', explode('|', $_COOKIE['colorSettings']));

    $backgroundColor = $colors[0]; // Assuming this is '#222831'
    $_Color = $colors[1]; // Assuming this is 'white'
} else {
    // Default colors if the cookie isn't set
    $backgroundColor = 'defaultBackground'; //
    $_Color = 'defaultHeader'; //
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--External Css-->
    <link rel="stylesheet" href="stylecards.css">
    <link rel="stylesheet" href="style.css">
    <style>
   
svg{
    width: 30px;
}
.heading
{
    padding-bottom: 2rem;
    font-size: 4.5rem;
    text-align: center;
}
header
{
    z-index: 10000;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    padding: 2rem 9%;
    background-color:
   <?php
   echo htmlspecialchars($backgroundColor); 
  ?>;
  
    box-shadow: var(--box_shadow);
    display: flex;
    justify-content: space-between;
    align-items: center;
}
header .logo{
    color: #000;
    border: #000;
    font-size: 2.5rem;
    font-weight: 700;
}
header .logo span{
    color:var(--main);
}
header .navbar{
    position: relative;
    min-height: 9px;
    margin-bottom: 6px;
    border: 1px solid transparent;
}
header .navbar a{
    height: 10px; /* Adjust based on your layout */
    margin: auto; /* Center the navbar */
     /* Flexbox layout for the items */
     color: 
  <?php
   echo htmlspecialchars($_Color); 
  ?>;
    font-size: 1.6rem;

    margin: 0.6rem;
    justify-content: space-between;
}
header .navbar a:hover{
    color: var(--main);
    text-decoration: none;
}
.icon-cart{
    position: relative;
    margin-right: 35px;
}
.icon-cart span{
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
width:100%;

  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
} 
.featured-places .featured-item{
  
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

/* General styling for the filter container */
.filter-container {
    background-color: #f8f9fa; /* Light grey background */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    padding: 20px;
    margin-top: 20px; /* Adjusted margin-top for better spacing */
}

/* Styling headings within the filter */
.filter-container h3 {
    color: #333;
    border-bottom: 2px solid #ff0000; /* Red accent under the heading */
    padding-bottom: 10px;
}

/* Form group styling */
.form-group {
    margin-bottom: 15px;
}

/* Styling for all select elements and button */
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

/* Button specific styling */
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
    font-size: 16px
}

/* Media query for smaller screens */
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

  <body>
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
            <form method="post">
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

$products = [
    [
        "name" => "BMW 3 Series",
        "category" => "new vehicles",
        "model" => "BMW 3 series",
         "price" => 62500,
        "kilometers" => "65,000 km",
        "engineType" => "disel",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/1-BMW-3-Series.jpg",
        "link" => "src/CarDemos/cardemo1.php",
        "description" => "Experience unmatched elegance and precision with the iconic BMW 3 Series, where dynamic performance meets timeless sophistication on every journey. Elevate your drive with cutting-edge technology and unrivaled comfort, defining the essence of luxury driving."
    ],
    [
        "name" => "BMW 545e xDrive",
        "category" => "new vehicles",
        "model" => "BMW 5 series",
        "price" => 84500,
        "kilometers" => "130,000 km",
        "engineType" => "disel",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/bmw 5.jpg",
        "link" => "src/CarDemos/cardemo2.php",
        "description" => "Indulge in refined luxury and exhilarating performance with the BMW 5 Series, where every detail is crafted for a seamless fusion of power. Experience the epitome of driving pleasure, where innovation meets elegance, setting new standards in automotive excellence."
    ],
    [
        "name" => "BMW M3 CS",
        "category" => "new vehicles",
        "model" => "BMW M3 CS",
        "price" => 118700,
        "kilometers" => "45,000 km",
        "engineType" => "petrol",
        "gearbox" => "Manual",
        "image" => "images/bmw cards/bmw m3cs.jpg",
        "link" => "src/CarDemos/cardemo3.php",
        "description" => "Unleash the adrenaline with the BMW M3 CS series, designed to dominate both the road and the track. Experience the ultimate driving experience, where every curve becomes a conquest and every moment an exhilarating symphony of performance and precision."
    ],
    [
        "name" => "BMW 7 Series",
        "category" => "new vehicles",
        "model" => "BMW 7 series",
        "price" => 97000,
        "kilometers" => "130,000 km",
        "engineType" => "hybrid",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/bmw 7 hybrid.jpg",
        "link" => "src/CarDemos/cardemo4.php",
        "description" => "Embark on a journey of sustainable luxury with the BMW 7 Series Plug-in Hybrid, seamlessly combining eco-consciousness with unparalleled comfort. Redefining opulence, it offers a silent glide through city streets, empowered by cutting-edge technology and a commitment to a greener future."
    ],
    [
        "name" => "BMW M4 Competition",
        "category" => "new vehicles",
        "model" => "BMW M4 Competition",
        "price" => 113000,
        "kilometers" => "90,000 km",
        "engineType" => "petrol",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/m4cardimg.jpg",
        "link" => "src/CarDemos/cardemo5.php",
        "description" => "Unleash the beast within with the BMW M4 Competition, where raw power meets refined precision, sculpted for the ultimate driving experience on both road and track. Pushing boundaries with its adrenaline-pumping performance and iconic design, it's the epitome of automotive excellence, redefining the art of exhilaration behind the wheel."
    ],
    [
        "name" => "BMW M5 CS",
        "category" => "new vehicles",
        "model" => "BMW M5 CS",
        "price" => 142000,
        "kilometers" => "25,000 km",
        "engineType" => "petrol",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/bmw m5CS.jpg",
        "link" => "src/CarDemos/cardemo6.php",
        "description" => "Experience the pinnacle of performance luxury with the BMW M5 CS, where relentless power meets refined elegance, delivering an unparalleled driving thrill. Precision-engineered to dominate both road and track, it embodies the epitome of automotive excellence, setting new standards in exhilaration and sophistication."
    ],
    [
        "name" => "BMW iX2",
        "category" => "new vehicles",
        "model" => "BMW iX2",
        "price" => 61660,
        "kilometers" => "15,000 km",
        "engineType" => "electric",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/ix2.jpg",
        "link" => "src/CarDemos/cardemo7.php",
        "description" => "Experience the future of sustainable luxury with the BMW iX2, where innovative technology meets eco-conscious design, delivering an unmatched driving experience.
        Crafted with precision to redefine electric mobility, it embodies the essence of automotive advancement, setting a new benchmark in sustainability and sophistication.             
        "
    ],
    [
        "name" => "BMW M3 Competition",
        "category" => "used vehicles",
        "model" => "BMW M3 Competition",
        "price" => 50500,
        "kilometers" => "120,000 km",
        "engineType" => "petrol",
        "gearbox" => "Manual",
        "image" => "images/bmw cards/m3.7.jpg",
        "link" => "src/CarDemos/cardemo8.php",
        "description" => "Experience the ultimate fusion of power and precision with the BMW M3 Competition. Crafted to reign supreme on every road and circuit, it epitomizes automotive perfection, pushing the boundaries of performance and luxury to new heights."
    ],
    [
        "name" => "BMW X7",
        "category" => "new vehicles",
        "model" => "BMW X7",
        "price" => 116050,
        "kilometers" => "15,000 km",
        "engineType" => "petrol",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/x7.7.jpg",
        "link" => "src/CarDemos/cardemo9.php",
        "description" => "Embark on a journey of unparalleled luxury and commanding power with the BMW X7. Designed to traverse any terrain with effortless grace and precision, the X7 stands as a testament to automotive excellence, setting new standards in performance and opulence."
    ],
    

    // Add other products here
];

//Sortimi me asort edhe arsort per qmim 

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
        // Create an array of names with original keys preserved
        $names = array_column($filteredProducts, 'name', 'id'); // Assume each product has an 'id' or use array keys
        if ($sortOrder === 'A-Z') {
            asort($names);
        } else {
            arsort($names);
        }
        // Reconstruct the array based on sorted names
        $sortedProducts = [];
        foreach ($names as $id => $name) {
            $sortedProducts[$id] = $filteredProducts[$id];
        }
        $filteredProducts = $sortedProducts;
    }
    
    // Sorting by price using a workaround with ksort()
    if ($sortPrice === 'lowestToHighest' || $sortPrice === 'highestToLowest') {
        // This approach presumes adjusting the array so that keys are prices
        // This is not typical; you'd normally use usort(), but here's a ksort() approach as requested
        $priceSorted = [];
        foreach ($filteredProducts as $key => $product) {
            $uniquePriceKey = $product['price'] * 1000 + $key; // Multiplying to handle decimal places
            $priceSorted[$uniquePriceKey] = $product;
        }
        if ($sortPrice === 'lowestToHighest') {
            ksort($priceSorted);
        } else {
            krsort($priceSorted);
        }
        $filteredProducts = array_values($priceSorted); // Reset keys after sorting
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
<!-- vardump  -->
<?php
function console_var_dump($variable) {
    echo "<script>console.log(" . json_encode($variable, JSON_PRETTY_PRINT) . ");</script>";
}

$bmw_cars = array(
    "1 Series" => array(
        "120d",
        "135i",
        "M140i",
        "etc"
    ),
    "2 Series" => array(
        "220d",
        "M240i",
        "etc"
    ),
    "3 Series" => array(
        "320d",
        "330i",
        "M340i",
        "etc"
    ),
    "4 Series" => array(
        "420d",
        "430i",
        "M440i",
        "etc"
    ),
    "5 Series" => array(
        "520d",
        "530i",
        "M550i",
        "etc"
    ),
    "6 Series" => array(
        "620d",
        "630i",
        "M650i",
        "etc"
    ),
    "7 Series" => array(
        "730d",
        "740i",
        "M760i",
        "etc"
    ),
    "8 Series" => array(
        "840d",
        "850i",
        "M8" ,
        "etc"
    )
);

console_var_dump($bmw_cars);
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
                                <strong class="text-muted"><i class="fa fa-dashboard"></i> <?= htmlspecialchars($product['kilometers']); ?></strong>
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
                            <div class="card-text">$<?= number_format($product['price']); ?></div>
                            <a href="<?= htmlspecialchars($product['link']); ?>" class="card-button">Purchase</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>




    </div>






    <!--Bootstrap5 JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>   
        var products = <?php echo json_encode($products); ?>;
    </script>
  </body>
</html>