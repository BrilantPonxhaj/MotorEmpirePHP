<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MotorEmpire | Vehicles</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--External Css-->
    <link rel="stylesheet" href="stylecards.css">
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
 <!--HEADER/NAVBAR start-->
 <header>
      
      <div id="MenuBtn" class="fas fa-bars"></div>

      <a href="#" class="logo"><span> <img src="images/logo2.png" width="100px " height="50px" > </span></a>
      <nav class="navbar">
      
        <a href="index.php">Home</a>
        <a href="vehicles.php">Vehicles</a>
  
        <a href="contact.php">Contact</a>
      </nav>


 </header>
<br>
<br>

<div style="margin-top: 70px;" class="filter-container">
    <h3 class="text-center text-uppercase font-monospace m-3">
        Filter
      </h3>
      <div class="container mt-1">
          <form action="#">
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
                          <label>Model</label>
               
                           <select class="form-control" id="filter2">
                                <option value="">-- All --</option>
                                <option value="BMW 5 series">BMW 5 series</option>
                                <option value="BMW M3 CS">BMW M3 CS</option>
                                <option value="BMW 3 series">BMW 3 series</option>
                                <option value="BMW 7 series">BMW 7 series</option>
                                <option value="BMW M4 Competition">BMW M4 Competition</option>
                                <option value="BMW M5 CS">BMW M5 CS</option>
                           </select>
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
                          <label>Price:</label>
               
                           <select class="form-control" id="filter3">
                                <option value="">-- All --</option>
                                <option value="priceRange1">20000$ - 50000$</option>
                                <option value="priceRange2">50000$ - 100000$</option>
                                <option value="priceRange3">100000$ - ...</option>
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
                        <label>Engine type:</label>
             
                         <select class="form-control" id="filter5">
                              <option value="">-- All --</option>
                              <option value="disel">Disel</option>
                              <option value="petrol">Petrol</option>
                              <option value="hybrid">Hybrid</option>
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
                  <div id="Searchbtn" class="text-center mt-5">
    <button id="Searchbtn" class="btn" onclick="applyFilters()">Search</button>
  <i class="fas fa-user"></i>
</div>
          </form>
      </div>

      <?php

$products = [
    [
        "name" => "BMW 3 Series",
        "category" => "new vehicles",
        "model" => "BMW 3 series",
        "price" => "$62,500",
        "kilometers" => "65,000 km",
        "engineType" => "disel",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/1-BMW-3-Series.jpg",
        "demo" => "cardemo1.php",
        "description" => "Experience unmatched elegance and precision with the iconic BMW 3 Series, where dynamic performance meets timeless sophistication on every journey. Elevate your drive with cutting-edge technology and unrivaled comfort, defining the essence of luxury driving."
    ],
    [
        "name" => "BMW 5 Series",
        "category" => "new vehicles",
        "model" => "BMW 5 series",
        "price" => "$84,500",
        "kilometers" => "130,000 km",
        "engineType" => "disel",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/bmw 5.jpg",
        "demo" => "cardemo2.php",
        "description" => "Indulge in refined luxury and exhilarating performance with the BMW 5 Series, where every detail is crafted for a seamless fusion of power. Experience the epitome of driving pleasure, where innovation meets elegance, setting new standards in automotive excellence."
    ],
    [
        "name" => "BMW M3 CS",
        "category" => "new vehicles",
        "model" => "BMW M3 CS",
        "price" => "$118,700",
        "kilometers" => "45,000 km",
        "engineType" => "petrol",
        "gearbox" => "Manual",
        "image" => "images/bmw cards/bmw m3cs.jpg",
        "demo" => "cardemo3.php",
        "description" => "Unleash the adrenaline with the BMW M3 CS series, designed to dominate both the road and the track. Experience the ultimate driving experience, where every curve becomes a conquest and every moment an exhilarating symphony of performance and precision."
    ],
    [
        "name" => "BMW 7 Series",
        "category" => "new vehicles",
        "model" => "BMW 7 series",
        "price" => "$97,000",
        "kilometers" => "130,000 km",
        "engineType" => "hybrid",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/bmw 7 hybrid.jpg",
        "demo" => "cardemo4.php",
        "description" => "Embark on a journey of sustainable luxury with the BMW 7 Series Plug-in Hybrid, seamlessly combining eco-consciousness with unparalleled comfort. Redefining opulence, it offers a silent glide through city streets, empowered by cutting-edge technology and a commitment to a greener future."
    ],
    [
        "name" => "BMW M4 Competition",
        "category" => "new vehicles",
        "model" => "BMW M4 Competition",
        "price" => "$113,000",
        "kilometers" => "90,000 km",
        "engineType" => "petrol",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/m4cardimg.jpg",
        "demo" => "cardemo5.php",
        "description" => "Unleash the beast within with the BMW M4 Competition, where raw power meets refined precision, sculpted for the ultimate driving experience on both road and track. Pushing boundaries with its adrenaline-pumping performance and iconic design, it's the epitome of automotive excellence, redefining the art of exhilaration behind the wheel."
    ],
    [
        "name" => "BMW M5 CS",
        "category" => "new vehicles",
        "model" => "BMW M5 CS",
        "price" => "$142,000",
        "kilometers" => "25,000 km",
        "engineType" => "petrol",
        "gearbox" => "Automatic",
        "image" => "images/bmw cards/bmw m5CS.jpg",
        "demo" => "cardemo6.php",
        "description" => "Experience the pinnacle of performance luxury with the BMW M5 CS, where relentless power meets refined elegance, delivering an unparalleled driving thrill. Precision-engineered to dominate both road and track, it embodies the epitome of automotive excellence, setting new standards in exhilaration and sophistication."
    ],
    // Add other products here
];

?>
      
    <div id="productContainer">

      <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2">
                <div class="card-sl">
                    <div class="card-image">
                        <img src="images/bmw cards/1-BMW-3-Series.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 65 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> 2000cc</strong>
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
                        $62,500€
                    </div>
                    <a href="cardemo1.php" class="card-button"> Purchase</a>
                </div>
            </div>
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2">
                <div class="card-sl">
                    <div class="card-image">
                        <img class=""
                            src="images/bmw cards/bmw 5.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 130 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> 2500cc</strong>
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
                        $84,500€
                    </div>
                    <a href="cardemo2.php" class="card-button"> Purchase</a>
                </div>
            </div>
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2">
                <div class="card-sl">
                    <div class="card-image">
                        <img class=""
                            src="images/bmw cards/bmw m3cs.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 45 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> 3000cc</strong>
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
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2">
                <div class="card-sl">
                    <div class="card-image">
                        <img class=""
                            src="images/bmw cards/bmw 7 hybrid.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 130 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> 3000cc</strong>
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
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2">
                <div class="card-sl">
                    <div class="card-image">
                        <img class=""
                            src="images/bmw cards/m4cardimg.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 90 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> 3000cc</strong>
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
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2">
                <div class="card-sl">
                    <div class="card-image">
                        <img class=""
                            src="images/bmw cards/bmw m5CS.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 25 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> 4400cc</strong>
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
        <p class="mt-5 m-5 fs-2 fa fa-exclamation-circle">  No matching items found.</p>
    </div>






    <!--Bootstrap5 JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        
var products = <?php echo json_encode($products); ?>;

function applyFilters() {
    var filter1Value = document.getElementById("filter1").value;
    var filter2Value = document.getElementById("filter2").value;
    var filter3Value = document.getElementById("filter3").value;
    var filter4Value = document.getElementById("filter4").value;
    var filter5Value = document.getElementById("filter5").value;
    var filter6Value = document.getElementById("filter6").value; 

    var filteredProducts = products.filter(function(product) {
        var filter1Match = filter1Value === "" || product.category === filter1Value;
        var filter2Match = filter2Value === "" || product.model === filter2Value;
        var filter3Match = filter3Value === "" || checkPriceRange(product.price, filter3Value); //Price
        var filter4Match = filter4Value === "" || checkKilometers(product.kilometers, filter4Value); //Kilometrat
        var filter5Match = filter5Value === "" || product.engineType === filter5Value;
        var filter6Match = filter6Value === "" || product.gearbox === filter6Value;

        return filter1Match && filter2Match && filter3Match && filter4Match && filter5Match && filter6Match;
    });
    displayProducts(filteredProducts);
}

function displayProducts(products) {
    var productContainer = document.getElementById("productContainer");
    var noResultsMessage = document.getElementById("noResultsMessage");

    // E fshin previous content
    productContainer.innerHTML = "";
    // E bon check a ka sene Tfiltrune
    if (products.length === 0) {
        noResultsMessage.style.display = "block";
    } else {
        noResultsMessage.style.display = "none";
        
        products.forEach(function(product) {
            var productCard = document.createElement("div");
            productCard.classList.add("col-lg-4", "col-md-4", "col-sm-6", "col-xs-12", "pb-2", "pt-2");

            // Construct the dynamic HTML content for the product card
            productCard.innerHTML = `
                <div class="card-sl" style="margin-top:52px">
                    <div class="card-image">
                        <img src="${product.image}" alt="${product.name}" />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted"><i class="fa fa-dashboard"></i> ${product.kilometers}</strong>
                        <strong class="text-muted"><i class="fa fa-cube"></i> ${product.engineType}</strong>
                        <strong class="text-muted"><i class="fa fa-cog"></i> ${product.gearbox}</strong>
                    </div>
                    <div class="card-heading">${product.name}</div>
                    <div class="card-text">${product.description}</div>
                    <div class="card-text">${product.price}</div>
                    <a href="${product.demo}" class="card-button">Purchase</a>
                </div>`;

            productContainer.appendChild(productCard);
        });
    }
}

// funksioni per price
function checkPriceRange(price, filterValue) {
    var ranges = {
        "priceRange1": [20000, 50000],
        "priceRange2": [50000, 100000],
        "priceRange3": [100000, Infinity]
    };
    var priceRange = ranges[filterValue];
    if (priceRange) {
        var priceValue = parseInt(price.replace(/[^0-9.-]+/g, ""));
        return priceValue >= priceRange[0] && priceValue <= priceRange[1];
    }
    return false;
}

//funksioni per kilometra
function checkKilometers(kilometers, filterValue) {
    var ranges = {
        "kmRange1": [0, 50000],
        "kmRange2": [50001, 100000],
        "kmRange3": [100001, Infinity]
    };
    var kilometersRange = ranges[filterValue];
    if (kilometersRange) {
        var kilometersValue = parseInt(kilometers.replace(/[^0-9.-]+/g, ""));
        return kilometersValue >= kilometersRange[0] && kilometersValue <= kilometersRange[1];
    }
    return false;
}



    </script>
  </body>
</html>


<!-- sene qe mujn me vyjt ma von -->
<!-- <div class="container py-5">
        <h1 class="text-center ">Product Cards</h1>

        <div class="container-fluid  mt-4">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-4 boxanimation"> 
                    <div> 
                        <img class="card-img-top" src="img/images/bmwred.jpg" alt="BMW" style="width:100%">
                        <div class="card-img-overlay d-flex justify-content-around ">
                            <strong class="text-muted"><i class="fa fa-dashboard"></i> 130 000km</strong>
                            <strong class="text-muted"><i class="fa fa-cube"></i> 2000cc</strong>
                            <strong class="text-muted"><i class="fa fa-cog"></i> Automatic</strong>
                          </div>
                          <div class="card-body">
                              <h1 class="card-title">BMW 1 Series</h1>
                              <p>Some text about the BMW 1 Series</p>
                              <p class="price">32500$</p>
                           <div class="p-1 rounded text-center">
                              <p><button type="button" class="btn btn-primary rounded ">Add to Cart</button></p>
                           </div>
                           </div>
                      
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-4"> 
                    <div class="card"> 
                        <img class="card-img-top" src="img/images/bmwred.jpg" alt="BMW" style="width:100%">
                        <div class="card-img-overlay d-flex justify-content-around ">
                            <strong class="text-info"><i class="fa fa-dashboard"></i> 130 000km</strong>
                            <strong class="text-info"><i class="fa fa-cube"></i> 2000cc</strong>
                            <strong class="text-info"><i class="fa fa-cog"></i> Automatic</strong>
                          </div>
                          <div class="card-body">
                              <h1 class="card-title">BMW...</h1>
                              <p>Some text about the BMW..</p>
                              <p class="price">...$</p>
                           <div class="p-3 rounded">
                              <p><button type="button" class="btn btn-primary rounded ">Add to Cart</button></p>
                           </div>
                           </div>
                      
                    </div>
                </div>
        
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-4"> 
                    <div class="card"> 
                        <img class="card-img-top" src="img/images/bmwzez.jpg" alt="BMW" style="width:100%">
                        <div class="card-img-overlay d-flex justify-content-around ">
                            <strong class="text-info"><i class="fa fa-dashboard"></i> 130 000km</strong>
                            <strong class="text-info"><i class="fa fa-cube"></i> 2000cc</strong>
                            <strong class="text-info"><i class="fa fa-cog"></i> Automatic</strong>
                          </div>
                          <div class="card-body">
                              <h1 class="card-title">BMW...</h1>
                              <p>Some text about the BMW..</p>
                              <p class="price">...$</p>
                           <div class="p-3 rounded">
                              <p><button type="button" class="btn btn-primary rounded ">Add to Cart</button></p>
                           </div>
                           </div>
                      
                    </div>
                </div>
        
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-4"> 
                    <div class="card"> 
                        <img class="card-img-top" src="img/images/vehiclesbmw4.jpg" alt="BMW" style="width:100%">
                        <div class="card-img-overlay d-flex justify-content-around ">
                            <strong class="text-info"><i class="fa fa-dashboard"></i> 130 000km</strong>
                            <strong class="text-info"><i class="fa fa-cube"></i> 2000cc</strong>
                            <strong class="text-info"><i class="fa fa-cog"></i> Automatic</strong>
                          </div>
                          <div class="card-body">
                              <h1 class="card-title">BMW...</h1>
                              <p>Some text about the BMW..</p>
                              <p class="price">...$</p>
                           <div class="p-3 rounded">
                              <p><button type="button" class="btn btn-primary rounded ">Add to Cart</button></p>
                           </div>
                           </div>
                      
                    </div>
                </div>
        
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-4"> 
                    <div class="card"> 
                        <img class="card-img-top" src="img/images/vehiclessbmw.webp" alt="BMW" style="width:100%">
                        <div class="card-img-overlay d-flex justify-content-around ">
                            <strong class="text-info"><i class="fa fa-dashboard"></i> 130 000km</strong>
                            <strong class="text-info"><i class="fa fa-cube"></i> 2000cc</strong>
                            <strong class="text-info"><i class="fa fa-cog"></i> Automatic</strong>
                          </div>
                          <div class="card-body">
                              <h1 class="card-title">BMW...</h1>
                              <p>Some text about the BMW..</p>
                              <p class="price">...$</p>
                           <div class="p-3 rounded">
                              <p><button type="button" class="btn btn-primary rounded ">Add to Cart</button></p>
                           </div>
                           </div>
                      
                    </div>
                </div>
        
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-4"> 
                    <div class="card"> 
                        <img class="card-img-top" src="img/images/vehiclesbmw.png" alt="BMW" style="width:100%">
                        <div class="card-img-overlay d-flex justify-content-around ">
                            <strong class="text-info"><i class="fa fa-dashboard"></i> 130 000km</strong>
                            <strong class="text-info"><i class="fa fa-cube"></i> 2000cc</strong>
                            <strong class="text-info"><i class="fa fa-cog"></i> Automatic</strong>
                          </div>
                          <div class="card-body">
                              <h1 class="card-title">BMW...</h1>
                              <p>Some text about the BMW..</p>
                              <p class="price">...$</p>
                           <div class="p-3 rounded">
                              <p><button type="button" class="btn btn-primary rounded ">Add to Cart</button></p>
                           </div>
                           </div>
                      
                    </div>
                </div>


            </div>
        </div>
        </div> -->
<!--function applyFilters() {
//     var filter1Value = document.getElementById("filter1").value;
//     var filter2Value = document.getElementById("filter2").value;
//     var filter3Value = document.getElementById("filter3").value;
//     var filter4Value = document.getElementById("filter4").value;
//     var filter5Value = document.getElementById("filter5").value;

//     // Filter products based on the selected criteria
//     var filteredProducts = products.filter(function(product) {
//         return (
//             (filter1Value === "" || product.category === filter1Value) &&
//             (filter2Value === "" || product.model === filter2Value) &&
//             (filter3Value === "" || checkPriceRange(product.price, filter3Value)) &&
//             (filter4Value === "" || product.engineType === filter4Value) &&
//             (filter5Value === "" || product.gearbox === filter5Value)
//         );
//     });

//     // Display filtered products
//     displayProducts(filteredProducts);
// } -->

