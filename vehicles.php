<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MotorEmpire</title>
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
        <a href="featured.html">Featured</a>
        <a href="#Services">Services</a>
        <a href="#Review">Review</a>
        <a href="contact.php">Contact</a>
      </nav>


 </header>
<br>
<br>

<div style="margin-top: 70px;">
    <h3 class="text-center text-uppercase font-monospace m-3">
        Filter
      </h3>
      <div class="container mt-1">
          <form action="#">
              <div class="row">
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label>Used/New:</label>
               
                           <select class="form-control">
                                <option value="">-- All --</option>
                                <option value="new">New vehicle</option>
                                <option value="used">Used vehicle</option>
                           </select>
                      </div>
                  </div>
      
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label>Model</label>
               
                           <select class="form-control">
                                <option value="">-- All --</option>
                                <option value="">BMW 5 series</option>
                                <option value="">BMW 4 series</option>
                                <option value="">BMW 3 series</option>
                                <option value="">BMW 2 series</option>
                                <option value="">BMW 1 series</option>
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
               
                           <select class="form-control">
                                <option value="">-- All --</option>
                                <option value="">20000$ - 50000$</option>
                                <option value="">50000$ - 100000$</option>
                                <option value="">100000$ - ...</option>
                           </select>
                      </div>
                  </div>
      
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label>Kilometers:</label>
               
                           <select class="form-control">
                            <!--Bon mebo 
                              IF NEW DIFFERENT MILEAGE
                              IF USED DIFFERENT
                              ama edhe qishtu bon melan
                            -->
                                <option value="">-- All --</option>
                                <option value="">0Km- 50000Km</option>
                                <option value="">50000Km - 100000km</option>
                                <option value="">100000Km - 150000Km</option>
                                <option value="">150000Km - 250000Km</option>
                                <option value="">250000Km - ...</option>
                           </select>
                      </div>
                  </div>
      
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Engine type:</label>
             
                         <select class="form-control">
                              <option value="">-- All --</option>
                              <option value="">Disel</option>
                              <option value="">Petrol</option>
                              <option value="">Hybrid</option>
                              <option value="">Electric</option>
                         </select>
                    </div>
                </div>
      
      
      
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label>Gearbox:</label>
               
                           <select class="form-control">
                                <option value="">-- All --</option>
                                <option value="">Manual</option>
                                <option value="">Automatic</option>
                           </select>
                      </div>
                  </div>
                  <div id="Searchbtn" class="text-center mt-5">
    <a href="#" id="Searchbtn" class="btn">Search</a>
  <i class="fas fa-user"></i>
</div>
          </form>
      </div>
      

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
                        67,400€
                    </div>
                    <a href="cardemo.php" class="card-button"> Purchase</a>
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
                        BMW 5 Series
                    </div>
                    <div class="card-text">                      
                        Indulge in refined luxury and exhilarating performance with the BMW 5 Series, where every detail is crafted for a seamless fusion of power. 
                        Experience the epitome of driving pleasure, where innovation meets elegance, setting new standards in automotive excellence.
                    </div>
                    <div class="card-text">
                        89,000€
                    </div>
                    <a href="#" class="card-button"> Purchase</a>
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
                        BMW M3 cs
                    </div>
                    <div class="card-text">    
                        Unleash the adrenaline with the BMW M3 CS series, designed to dominate both the road and the track.
                        Experience the ultimate driving experience, where every curve becomes a conquest and every moment an exhilarating symphony of performance and precision.
                    </div>
                    <div class="card-text">
                        158,000€
                    </div>
                    <a href="#" class="card-button"> Purchase</a>
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
                        133,000€
                    </div>
                    <a href="#" class="card-button"> Purchase</a>
                </div>
            </div>
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb-2 pt-2">
                <div class="card-sl">
                    <div class="card-image">
                        <img class=""
                            src="images/bmw cards/bmw m4.jpg" alt="BMW Loading..." />
                    </div>
                    <div class="d-flex justify-content-around mt-2">
                        <strong class="text-muted "><i class="fa fa-dashboard"></i> 90 000km</strong>
                        <strong class="text-muted "><i class="fa fa-cube"></i> 3000cc</strong>
                        <strong class="text-muted "><i class="fa fa-cog"></i> Automatic</strong>
                      </div>

                    <div class="card-heading">
                        BMW M4
                    </div>
                    <div class="card-text">               
                        Unleash the beast within with the BMW M4, where raw power meets refined precision, sculpted for the ultimate driving experience on both road and track. 
                        Pushing boundaries with its adrenaline-pumping performance and iconic design, it's the epitome of automotive excellence, redefining the art of exhilaration behind the wheel.
                    </div>
                    <div class="card-text">
                        113,000€
                    </div>
                    <a href="#" class="card-button"> Purchase</a>
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
                        179,000€
                    </div>
                    <a href="#" class="card-button"> Purchase</a>
                </div>
            </div>
        </div>  
        </div>
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




    <!--Bootstrap5 JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>