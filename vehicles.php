

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
header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
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


</style>
  </head>

  <body>
 <!--HEADER/NAVBAR start-->
 <header>
      
      <div id="MenuBtn" class="fas fa-bars"></div>

      <a href="#" style="margin-right:35px" class="logo"><span> <img src="images/logo2.png" width="100px " height="50px" > </span></a>
      <nav class="navbar">
      
        <a href="index.php">Home</a>
        <a href="vehicles.php">Vehicles</a>
  
        <a href="contact.php">Contact</a>
      </nav>
       <div class="icon-cart">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
            </svg>
        <span>0</span>
        </div>


 </header>
<br>
<br>

<div style="margin-top: 70px;" class="filter-container">
    <h3 class="text-center text-uppercase font-monospace m-3">
        Filter
      </h3>
      <div class="container mt-1">
          <form method="post">
              <div class="row">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label>Used/New:</label>
               
                           <select class="form-control" id="filter1">
                                <option value="">-- All --</option>
                                <option value="new vehicles">New vehicle</option>
                                <option value="used vehicles">Used vehicle</option>
                           </select>
                      </div>
                  </div>
      
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <form method="post">
                            <label>Model</label>
                            <select method="post" class="form-control" id="filter2">
                                <option value="">-- All --</option>
                                <option value="BMW 7 series">BMW 7 series</option>
                                <option value="BMW M5 CS">BMW M5</option>
                                <option value="BMW 5 series">BMW 5 series</option>
                                <option value="BMW M4 Competition">BMW M4</option>
                                <option value="BMW M3 CS">BMW M3</option>
                                <option value="BMW 3 series">BMW 3 Series</option>
                            </select>
                        </form>
                      </div>
                  </div>
      
                  <!-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label>Model:</label>
               
                           <select class="form-control">
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                                <option value="">-- All --</option>
                           </select>
                      </div>
                  </div> -->
      
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="sortOrder">Sort Names:</label>
                <select class="form-control" id="sortOrder" name="sortOrder">
                    <option value="">Select Order</option>
                    <option value="A-Z" <?= (isset($_POST['sortOrder']) && $_POST['sortOrder'] == 'A-Z') ? 'selected' : ''; ?>>A to Z</option>
                    <option value="Z-A" <?= (isset($_POST['sortOrder']) && $_POST['sortOrder'] == 'Z-A') ? 'selected' : ''; ?>>Z to A</option>
                </select>
            </div>
        </div>
      
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label>Kilometers:</label>
               
                           <select class="form-control" id="filter4">
                            <!--Bon mebo 
                              IF NEW DIFFERENT MILEAGE
                              IF USED DIFFERENT
                              ama edhe qishtu bon melan
                            -->
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
             
                        <select class="form-control" id="sortPrice" name="sortPrice">
                          <option value="">Select</option>
                          <option value="lowestToHighest">Lowest to Highest</option>
                         <option value="highestToLowest">Highest to Lowest</option>
                        </select>
                    </div>
                </div>
      
      
      
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label>Gearbox:</label>
               
                           <select class="form-control" id="filter6">
                                <option value="">-- All --</option>
                                <option value="Manual">Manual</option>
                                <option value="Automatic">Automatic</option>
                           </select>
                      </div>
                  </div>
                 
    <button id="Searchbtn" class="btn" type="submit">Search</button>


          </form>
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
        "link" => "cardemo1.php",
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
        "link" => "cardemo2.php",
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
        "link" => "cardemo3.php",
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
        "link" => "cardemo4.php",
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
        "link" => "cardemo5.php",
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
        "link" => "cardemo6.php",
        "description" => "Experience the pinnacle of performance luxury with the BMW M5 CS, where relentless power meets refined elegance, delivering an unparalleled driving thrill. Precision-engineered to dominate both road and track, it embodies the epitome of automotive excellence, setting new standards in exhilaration and sophistication."
    ],
    // Add other products here
];

//Sortimi me asort edhe arsort per qmim 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filteredProducts = array_filter($products, function ($product) {
        return (empty($_POST['category']) || $product['category'] === $_POST['category']) &&
               (empty($_POST['model']) || $product['model'] === $_POST['model']) &&
               (empty($_POST['gearbox']) || $product['gearbox'] === $_POST['gearbox']);
    });

    $priceSortArray = [];
    foreach ($filteredProducts as $key => $product) {
        $priceSortArray[$key] = $product['price'];
    }

    if (!empty($_POST['sortPrice']) && $_POST['sortPrice'] === 'lowestToHighest') {
        asort($priceSortArray);
    } elseif (!empty($_POST['sortPrice']) && $_POST['sortPrice'] === 'highestToLowest') {
        arsort($priceSortArray);
    }

    $sortedProducts = [];
    foreach ($priceSortArray as $key => $value) {
        $sortedProducts[] = $filteredProducts[$key];
    }

    $products = $sortedProducts;
}
?>



<?php
//Sortimi prej A-Z te makinave
// Assuming $products is predefined as shown in previous examples.

// Check if form is submitted and sort order is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sortOrder'])) {
    // Extract names and their corresponding indices
    $nameIndexMap = [];
    foreach ($products as $index => $product) {
        $nameIndexMap[$product['name']] = $index;
    }

    // Sort by names using the selected order from the form
    if ($_POST['sortOrder'] === 'A-Z') {
        ksort($nameIndexMap);
    } elseif ($_POST['sortOrder'] === 'Z-A') {
        krsort($nameIndexMap);
    }

    // Rebuild the products array based on the sorted names
    $sortedProducts = [];
    foreach ($nameIndexMap as $name => $index) {
        $sortedProducts[] = $products[$index];
    }

    // Use the sorted products for display
    $products = $sortedProducts;
}
?>
















<section class="featured-places">
<div class="container" style="margin-top:50px;">
    <div class="row" id="productContainer">
        <?php foreach ($products as $product): ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-4 ">
                <div class="featured-item">
                    <div class="card-image">
                        <img src="<?= $product['image']; ?>" alt="Loading image...">
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted"><i class="fa fa-dashboard"></i> <?= $product['kilometers']; ?> km</strong>
                        <strong class="text-muted"><i class="fa fa-cube"></i> <?= $product['engineType']; ?></strong>
                        <strong class="text-muted"><i class="fa fa-cog"></i> <?= $product['gearbox']; ?></strong>
                    </div>
                    <div class="card-heading"><?= $product['name']; ?></div>
                    <div class="card-text">
                        <?php
                        // Shorten description if it's longer than 100 characters
                        if (strlen($product['description']) > 100) {
                            echo substr($product['description'], 0, 100) . '...';
                        } else {
                            echo $product['description'];
                        }
                        ?>
                    </div>
                    <div class="card-text">$<?= number_format($product['price']); ?></div>
                    <a href="<?= $product['link']; ?>" class="card-button">Purchase</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>




        <!-- <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2">
                <div class="card-sl" >
                    <div class="card-image">
                        <img src="images/bmw cards/1-BMW-3-Series.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 65 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> Disel</strong>
                        <strong class="text-muted "><i class="fa fa-cog"></i> Automatic</strong>
                      </div>
                    <div class="card-heading">
                        BMW 3 Series
                    </div>
                    <div class="card-text">
                    Experience unmatched elegance and precision with the iconic BMW 3 Series, where dynamic performance meets timeless sophistication on every journey.
                    Elevate your drive with cutting-edge technology and unrivaled comfort, defining the essence of luxury driving.
                    </div>
                    <div class="card-text">
                        $62,500
                    </div>
                    <form action="add_to_cart.php" method="post">
                        <input type="hidden" name="product_name" value="BMW 3 Series">
                        <input type="hidden" name="product_price" value="62500">
                        <a href="cardemo1.php" class="card-button">Add to Cart</a>
                    </form>
                </div>
            </div>
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2" >
                <div class="card-sl">
                    <div class="card-image">
                        <img class=""
                            src="images/bmw cards/bmw 5.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 130 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> Disel</strong>
                        <strong class="text-muted "><i class="fa fa-cog"></i> Automatic</strong>
                      </div>
                    <div class="card-heading">
                        BMW 545e xDrive
                    </div>
                    <div class="card-text">                      
                        Indulge in refined luxury and exhilarating performance with the BMW 5 Series, where every detail is crafted for a seamless fusion of power. 
                        Experience the epitome of driving pleasure, where innovation meets elegance, setting new standards in automotive excellence.
                    </div>
                    <div class="card-text">
                        $84,500
                    </div>
                    <a href="cardemo2.php" class="card-button"> Purchase</a>
                </div>
            </div>
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2" >
                <div class="card-sl">
                    <div class="card-image">
                        <img class=""
                            src="images/bmw cards/bmw m3cs.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 45 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> Petrol</strong>
                        <strong class="text-muted "><i class="fa fa-cog"></i> Manual</strong>
                      </div>

                    <div class="card-heading">
                        BMW M3 CS
                    </div>
                    <div class="card-text">    
                        Unleash the adrenaline with the BMW M3 CS series, designed to dominate both the road and the track.
                        Experience the ultimate driving experience, where every curve becomes a conquest and every moment an exhilarating symphony of performance and precision.
                    </div>
                    <div class="card-text">
                    $118,700
                    </div>
                    <a href="cardemo3.php" class="card-button"> Purchase</a>
                </div>
            </div>
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2" >
                <div class="card-sl">
                    <div class="card-image">
                        <img class=""
                            src="images/bmw cards/bmw 7 hybrid.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 130 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> Hybrid</strong>
                        <strong class="text-muted "><i class="fa fa-cog"></i> Automatic</strong>
                      </div>

                    <div class="card-heading">
                        BMW 7 Series
                    </div>
                    <div class="card-text">
                        Embark on a journey of sustainable luxury with the BMW 7 Series Plug-in Hybrid, seamlessly combining eco-consciousness with unparalleled comfort. 
                        Redefining opulence, it offers a silent glide through city streets, empowered by cutting-edge technology and a commitment to a greener future.
                    </div>
                    <div class="card-text">
                        $97,000
                    </div>
                    <a href="cardemo4.php" class="card-button"> Purchase</a>
                </div>
            </div>
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2" >
                <div class="card-sl">
                    <div class="card-image">
                        <img class=""
                            src="images/bmw cards/m4cardimg.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 90 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> Petrol</strong>
                        <strong class="text-muted "><i class="fa fa-cog"></i> Automatic</strong>
                      </div>

                    <div class="card-heading">
                        BMW M4 Competition
                    </div>
                    <div class="card-text">               
                        Unleash the beast within with the BMW M4 Competition, where raw power meets refined precision, sculpted for the ultimate driving experience on both road and track. 
                        Pushing boundaries with its adrenaline-pumping performance and iconic design, it's the epitome of automotive excellence, redefining the art of exhilaration behind the wheel.
                    </div>
                    <div class="card-text">
                        $113,000
                    </div>
                    <a href="cardemo5.php" class="card-button"> Purchase</a>
                </div>
            </div>
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2" >
                <div class="card-sl">
                    <div class="card-image">
                        <img class=""
                            src="images/bmw cards/bmw m5CS.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 25 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> petrol</strong>
                        <strong class="text-muted "><i class="fa fa-cog"></i> Automatic</strong>
                      </div>

                    <div class="card-heading">
                        BMW M5 CS
                    </div>
                    <div class="card-text">   
                        Experience the pinnacle of performance luxury with the BMW M5 CS, where relentless power meets refined elegance, delivering an unparalleled driving thrill.
                        Precision-engineered to dominate both road and track, it embodies the epitome of automotive excellence, setting new standards in exhilaration and sophistication.
                    </div>
                    <div class="card-text">
                        $142,000
                    </div>
                    <a href="cardemo6.php" class="card-button"> Purchase</a>
                </div>
            </div>
        </div>  
        </div>
    </div>

    <div id="noResultsMessage" style="display: none;">
        <p class="mt-5 m-5 fs-2 fa fa-exclamation-circle">  No matching items found.</p> -->
    </div>






    <!--Bootstrap5 JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>   
        var products = <?php echo json_encode($products); ?>;
    </script>
    <script src="filterjavaScript.js"></script>
    <script>
    


    </script>
  </body>
</html>