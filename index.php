
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MotorEmpire</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <!--SWIPER JS-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!--FONT AWESOME LINK edhe ma posht osht si link i downlodum-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
   <link rel="stylesheet" href="bootstrap+fonte/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap+fonte/bootstrap-theme.min.css">
        <link rel="stylesheet" href="bootstrap+fonte/fontAwesome.css">
        <link rel="stylesheet" href="bootstrap+fonte/hero-slider.css">
        <link rel="stylesheet" href="bootstrap+fonte/owl-carousel.css">

    <!--STYLESHEET I KTIJ PAGE-->
    <link rel="stylesheet" href="style.css" />
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

      <!-- Login Button -->

<div id="LoginBtn">
  <a href="login.php" id="loginButton" class="btn">Login</a>
  <i class="fas fa-user"></i>
</div>
    </header>




    <!--HOME SECTION startpoint-->
    <!--HOME SECTION startpoint-->
    <!--HOME SECTION-->

<!--HOME SECTION-->



<section id="Home" class="home">
  <div class="home-background">
      <img src="images/bgfr.png" alt="Featured Car" class="hero-image"> <!-- Replace with your hero image -->
  </div>
  <div class="home-content">
  <div class="line+content"> 
    <div class="line-dec"></div>
    <p>
      <h1>Motor Empire </h1>
      <h2>Where Your Automotive Dreams Begin </h2>\
      <div>
        <a href="https://www.bmwusa.com/special-offers.html" class="red-button">Explore Vehicles</a>
      </div>
    </p>
    
  </div>
    </div>
  
</section>




    <!--ICONS CONTAINER START (kishim mujt me bo edhe me bootstrap amo mir osht qishtu)-->
    <section class="iconsContainer">
      <div class="icons">
        <i class="fas fa-home"></i>
        <div class="content">
          <h3>200+</h3>
          <p>Branches</p>
        </div>
      </div>
      <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
          <h3>4370+</h3>
          <p>Cars Sold</p>
        </div>
      </div>
      <div class="icons">
        <i class="fas fa-users"></i>
        <div class="content">
          <h3>3200+</h3>
          <p>Happy Customers</p>
        </div>
      </div>
      <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
          <h3>1000+</h3>
          <p>New Launches</p>
        </div>
      </div>
    </section>


    <!--VEHICLE SECTION START-->
    <!-- MA POSHT OSHT KODI PER KIT PJES
<section id="Vehicle" class="vehicle">
    <h1 class="heading">Popular Vehicles</h1>
    <div class="swiper VehiclesSlider">
        <div class="swiper-wrapper">
            <div class="swiper-slide box">
                <img src="images/bmwzez.jpg" alt="">
                <div class="content">
                    <h3>NewModels</h3>
                    <div class="price"><span>Price: </span>
                    $100,000</div>
                    <p>
                        <span class="fas fa-circle"></span>2022
                        <span class="fas fa-circle"></span>Automatic
                        <span class="fas fa-circle"></span>Electric
                        <span class="fas fa-circle"></span>200mph
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
-->


    <!--SLIDESHW I FOTOVE -->
    <div class="slideshow-container">
      <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="images/bmwzez.jpg" style="width: 100%" />
        <div class="text">BMW M4 CSL</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="images/bmwred.jpg" style="width: 100%" />
        <div class="text">M4 Coupe 50 Jahre</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="images/bmwgrey.jpg" style="width: 100%" />
        <div class="text">BMW M4 Edition 50 Jahre</div>
      </div>

      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br />
    <div style="text-align: center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
    </div>


    <!--VEHICLE SECTION START-->
    <section id="Vehicle" class="vehicle">
      <h1 class="heading">Popular Vehicles</h1>
      <div class="swiper VehiclesSlider">
        <div class="swiper-wrapper">
          <div class="swiper-slide box">
            <img src="images/vehiclesbmw3.webp" alt="Fotoja1" />
            <div class="content">
              <h3>New Models</h3>
              <div class="price"><span>Price:</span> $100,000</div>
              <p>
                <span class="fas fa-circle"></span>2023
                <span class="fas fa-circle"></span>Automatic
                <span class="fas fa-circle"></span>Electric
                <span class="fas fa-circle"></span>180mph
              </p>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/vehiclessbmw.webp" alt="Fotoja2" />
            <div class="content">
              <h3>New Models</h3>
              <div class="price"><span>Price:</span> $120,000</div>
              <p>
                <span class="fas fa-circle"></span>2022
                <span class="fas fa-circle"></span>Automatic
                <span class="fas fa-circle"></span>Electric
                <span class="fas fa-circle"></span>250mph
              </p>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/vehiclesbmw1.avif" alt="fotoja3" />
            <div class="content">
              <h3>New Models</h3>
              <div class="price"><span>Price:</span> $90,000</div>
              <p>
                <span class="fas fa-circle"></span>2021
                <span class="fas fa-circle"></span>Automatic
                <span class="fas fa-circle"></span>Petrol
                <span class="fas fa-circle"></span>150mph
              </p>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/vehiclesbmw2.webp" alt="fotoja4" />
            <div class="content">
              <h3>New Models</h3>
              <div class="price"><span>Price:</span> $140,000</div>
              <p>
                <span class="fas fa-circle"></span>2023
                <span class="fas fa-circle"></span>Automatic
                <span class="fas fa-circle"></span>Electric
                <span class="fas fa-circle"></span>170mph
              </p>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/vehiclesbmw.png" alt="Fotoja5" />
            <div class="content">
              <h3>New Models</h3>
              <div class="price"><span>Price:</span> $150,000</div>
              <p>
                <span class="fas fa-circle"></span>2022
                <span class="fas fa-circle"></span>Automatic
                <span class="fas fa-circle"></span>Electric
                <span class="fas fa-circle"></span>200mph
              </p>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/vehiclesbmw4.jpg" alt="fotoja6" />
            <div class="content">
              <h3>New Models</h3>
              <div class="price"><span>Price:</span>$160,000</div>
              <p>
                <span class="fas fa-circle"></span>2023
                <span class="fas fa-circle"></span>Automatic
                <span class="fas fa-circle"></span>Electric
                <span class="fas fa-circle"></span>240mph
              </p>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
        <!--per do circles posht kerreve PER ME I KALLXU SPECIFIKAT -->
      </div>
    </section>

    
    <!--Featured Section Start-->
    <section id="Feature" class="feature">
      <h1 class="heading">Featured Cars</h1>
      <div class="swiper FeatureSlider">
        <div class="swiper-wrapper">
          <div class="swiper-slide box">
            <img src="images/featured1bmw.png" alt="" />
            <div class="content">
              <h3>BMW M4 Coupe</h3>
              <div class="starts">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">$85,000</div>
              <a href="https://www.bmwusa.com/vehicles/m-models/m4-coupe/overview.html" target="_blank" class="btn">Buy Now</a>
            </div>
          </div>
          <div class="swiper-slide box">
            <img src="images/featuredbmwreplace.avif" alt="" />
            <div class="content">
              <h3>BMW i8</h3>
              <div class="starts">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">$140,000</div>
              <a href="https://www.bmw.co.uk/en/topics/discover/bmw-i8.html" target="_blank" class="btn">Buy Now</a>
            </div>
          </div>
          <div class="swiper-slide box">
            <img src="images/featured6.png" alt="" />
            <div class="content">
              <h3>BMW 3 Series Sedan M Automobiles</h3>
              <div class="starts">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">$60,900</div>
              <a href="https://www.bmw.co.th/en/all-models/m-series/m3-sedan/2023/bmw-3-series-sedan-m-automobiles-overview.html" target="_blank" class="btn">Buy Now</a>
            </div>
          </div>
          <div class="swiper-slide box">
            <img src="images/featuredx6comp.png" alt="" />
            <div class="content">
              <h3>BMW X6 M Competition</h3>
              <div class="starts">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">$128,000</div>
              <a href="https://www.bmwusa.com/vehicles/m-models/x6-m/sports-activity-coupe/overview.html" target="_blank" class="btn">Buy Now</a>
            </div>
          </div>
          <div class="swiper-slide box">
            <img src="images/featuredbmwww.png" alt="" />
            <div class="content">
              <h3>BMW X2 M35i xDrive</h3>
              <div class="starts">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">$60,000</div>
              <a href="https://www.bmw-m.com/en/all-models/overview-m-and-m-performance/bmw-x2-m35i-xdrive/2023/bmw-x2-m35i-xdrive.html" target="_blank" class="btn">Buy Now</a>
            </div>
          </div>
          <div class="swiper-slide box">
            <img src="images/featured4.png" alt="" />
            <div class="content">
              <h3>BMW 5 Series Sedan</h3>
              <div class="starts">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">$85,000</div>
              <a href="https://www.bmwusa.com/vehicles/5-series/sedan/overview.html" target="_blank" class="btn">Buy Now</a>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/featured5.png" alt="" />
            <div class="content">
              <h3>BMW i7 M70</h3>
              <div class="starts">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">$169,495</div>
              <a href="https://www.bmwusa.com/vehicles/all-electric/i7/sedan/electric-bmw-m.html" target="_blank" class="btn">Buy Now</a>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/featuredm3.webp" alt="" />
            <div class="content">
              <h3>BMW M3 Competition</h3>
              <div class="starts">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="price">$76,995</div>
              <a href="https://www.bmwusa.com/vehicles/m-models/m3-sedan/overview.html" target="_blank" class="btn">Buy Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--Services Section Start-->
    <section id="Services" class="services">
      <h1 class="heading">Our Services</h1>
      <div class="boxContainer">
        <div class="box">
          <i class="fas fa-car"></i>
          <h3>Car Selling</h3>
          <p>
            Discover a world of automotive sophistication as you peruse our
            extensive inventory, featuring an array of makes and models that
            epitomize cutting-edge engineering, design, and performance. From
            sleek sedans to robust SUVs and luxurious sports cars, our diverse
            range caters to every taste and preference.
          </p>
          <button class="btn">Read More</button>
        </div>
        <div class="box">
          <i class="fas fa-tools"></i>
          <h3>Parts Repair</h3>
          <p>Whether your car requires routine maintenance, diagnostic services, or complex repairs, we offer a comprehensive range of solutions tailored to address each issue with precision. From engine diagnostics and brake repairs to suspension tuning and electrical system troubleshooting, our technicians are adept at handling a diverse array of automotive challenges.</p>
          <button class="btn">Read More</button>
      </div>
      <div class="box">
          <i class="fas fa-car-crash"></i>
          <h3>Car Insurance</h3>
          <p>As part of our commitment to enhancing your insurance experience, we offer a range of additional benefits and discounts. These may include features such as roadside assistance, rental car coverage, and discounts for safe driving habits. Our goal is to add value to your policy while ensuring it remains tailored to your specific needs.</p>
          <button class="btn">Read More</button>
      </div>

        <div class="box">
          <i class="fas fa-car-battery"></i>
          <h3>Battery Replacement</h3>
          <p>
            Recognizing the importance of quality and reliability, we
            exclusively offer premium replacement batteries from trusted
            manufacturers. Our selection ensures that your new battery meets or
            exceeds the specifications of your vehicle, providing consistent and
            dependable power for your daily journeys.
          </p>
          <button class="btn">Read More</button>
        </div>

        <div class="box">
          <i class="fas fa-gas-pump"></i>
          <h3>Oil Change</h3>
          <p>
            Adhering to manufacturer-recommended service intervals is a
            cornerstone of our oil change services. Our technicians are
            well-versed in the specifications of various vehicle makes and
            models, ensuring that your oil change is performed in accordance
            with the guidelines set forth by your vehicle's manufacturer.
          </p>
          <button class="btn">Read More</button>
        </div>
        <div class="box">
          <i class="fas fa-headset"></i>
          <h3>24/7 Support</h3>
          <p>
            Our 24/7 support is not limited to problem resolution. We are also
            here to provide guidance and information about our products and
            services. Whether you need assistance navigating features,
            understanding policies, or exploring additional offerings, our team
            is dedicated to ensuring you have the information you need.
          </p>
          <button class="btn">Read More</button>
        </div>
      </div>
    </section>

    <!--News Letter Section Start-->
    <section class="newsletter">
      <h3>Subscribe to Our NewsLetter</h3>
      <p>
        Don't miss out on the exciting updates and offers we have in store for
        you. Subscribe to our newsletter today and embark on a journey of
        discovery and connection with MotorEmpire
      </p>
      <form action="" method ="POST" enctype="multipart/form-data"> 
        <input type="email"  name = "email" required placeholder="Enter Your Email..."/>
        <input type="submit" name="subscribe" value="Subscribe" />
      </form>
      <?php 
          require("script.php");
          if(isset($_POST['subscribe'])) {
            if (empty($_POST['email'])) {
              $response = "The email field is required";
            }else{
              $response = sendMail($_POST['email'],$subject ,$message);
            }
          }

      ?>
    </section>

    <!--REVIEW SECTION START-->
    <section id="Review" class="review">
      <h1 class="heading">Client's Review</h1>
      <div class="swiper ReviewSlider">
        <div class="swiper-wrapper">
          <div class="swiper-slide box">
            <img src="images/user1.jpg" alt="" />
            <div class="content">
              <p>
                Exemplifies a strong commitment to teamwork, fostering a
                collaborative environment that enhances overall productivity.
              </p>
              <h3>MotorEmpire</h3>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/user2.jpg" alt="" />
            <div class="content">
              <p>
                Highly organized and detail-oriented, ensuring accuracy and
                precision in all tasks undertaken
              </p>
              <h3>MotorEmpire</h3>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/user3.webp" alt="" />
            <div class="content">
              <p>
                A highly motivated team who consistently deliver high-quality
                results on time.
              </p>
              <h3>MotorEmpire</h3>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/user4.webp" alt="" />
            <div class="content">
              <p>
                Demonstrates strong leadership qualities and effectively
                collaborates with colleagues to achieve common goals.
              </p>
              <h3>MotorEmpire</h3>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/user5.jpg" alt="" />
            <div class="content">
              <p>
                Demonstrates a strong sense of initiative and takes ownership of
                tasks, contributing to the overall success of the team
              </p>
              <h3>MotorEmpire</h3>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>

          <div class="swiper-slide box">
            <img src="images/user6.jpg" alt="" />
            <div class="content">
              <p>
                Reliable and trustworthy, with a proven track record of meeting
                and exceeding expectations.
              </p>
              <h3>MotorEmpire</h3>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
        </div>
      </div>
    </section>

  
<!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-veno">
                        <div class="logo">
                            <img src="images/2.png" alt="Venue Logo">
                        </div>
                        <p>MotorEmpire is authorised and regulated by the Financial Conduct Authority.All vehicles are subject to prior sale. By accessing this website, you agree to the MotorEmpire's Terms of Service and Privacy Policy.</p>
                        <ul class="social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="useful-links">
                        <div class="footer-heading">
                            <h4>Useful Links</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="index.html"><i class="fa fa-stop"></i>Home</a></li>
                                    <li><a href="about.html"><i class="fa fa-stop"></i>About</a></li>
                                    <li><a href="team.html"><i class="fa fa-stop"></i>Team</a></li>
                                    <li><a href="contact.html"><i class="fa fa-stop"></i>Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="faq.html"><i class="fa fa-stop"></i>FAQ</a></li>
                                    <li><a href="testimonials.html"><i class="fa fa-stop"></i>Testimonials</a></li>
                                    <li><a href="blog.html"><i class="fa fa-stop"></i>Blog</a></li>
                                    <li><a href="terms.html"><i class="fa fa-stop"></i>Terms</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-info">
                        <div class="footer-heading">
                            <h4>Contact Information</h4>
                        </div>
                        <p><i class="fa fa-map-marker"></i> 212 Barrington Court New York, ABC</p>
                        <ul>
                            <li>Phone:<a href="#">+38344412817</a></li>
                            <li>Email:<a href="#">MotorEmpire@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Copyright © 2024 MotorEmpire </p>
                </div>
            </div>
        </div>
    </div>
  
 <!-- 

     THEME TOGGLE NI BUTTON PER ME ZGJEDH CILEN NGJYRE DON MI PARAQIT BUTONAT TJERE
    //<div class="themeToggle">

      <div class="ToggleBtn">
        <i class="fas fa-cog"></i>
      </div>

      <h3>Choose Color</h3>
      <div class="buttons">

        <div class="themeBtn" style="background: #0011ff"></div>
        <div class="themeBtn" style="background: #d4990d"></div>
        <div class="themeBtn" style="background:rgb(43, 119, 43)"></div>
        <div class="themeBtn" style="background: #590e4fe6"></div>
        <div class="themeBtn" style="background: #c05508"></div>
        <div class="themeBtn" style="background: #ff041d"></div>
        
      </div>
    </div>
     

 VALIDIMI I FORMES LOGIN DUKE PERDORUR REGEX
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          const emailInput = document.getElementById("emailInput");
          const passwordInput = document.getElementById("passwordInput");
          const submitButton = document.getElementById("submitButton");
  
          // Regular expression for a valid email address
          const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
  
          // Event listener to validate the form when the Submit button is clicked
          submitButton.addEventListener("click", function () {
              const email = emailInput.value.trim();
              const password = passwordInput.value;
  
              // Validate email using regex
              if (!emailRegex.test(email)) {
                  alert("Please enter a valid email address.");
                  return;
              }
  
              // You can add more password validation logic here if needed
  
              // If both email and password are valid, you can proceed with form submission
              alert("Login successful!");
              // Replace the alert with your actual form submission logic
          });
      });
  </script>
  -->


    <!--SWIPER JS-->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!--Scripta per JS-->
    <script src="index.js"></script>
  </body>
</html>

