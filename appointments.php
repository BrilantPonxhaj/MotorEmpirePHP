<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotorEmpire | Appointments</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap+fonte/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap+fonte/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap+fonte/fontAwesome.css">
    <link rel="stylesheet" href="bootstrap+fonte/hero-slider.css">
    <link rel="stylesheet" href="bootstrap+fonte/owl-carousel.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
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

      <!-- Login Button e kom shly ktu se dalina na ka kritiku heren e kalume-->
    </header>
    <br><br><br><br>
    <h1><b>Appointments</b></h1>

    <?php 
    // Qikjo pjes veq i merr vargjet qe jon n sessions prej sessionit n contact edhe i thirr me echo
    // qekjo foreach bohet definohet kshtu puna qe te contacti vargu u deklaru si $appointment
        if(isset($_SESSION['appointments']) && !empty($_SESSION['appointments'])) {
            foreach($_SESSION['appointments'] as $appointment) {
                echo "<h2>Name: " . $appointment['name'] . "</h2>";
                echo "<h2>Email: " . $appointment['email'] . "</h2>";
                echo "<h2>Date: " . $appointment['date'] . "</h2>";
                echo "<h2>Time: " . $appointment['time'] . "</h2>";
                echo "<h2>Message: " . $appointment['message'] . "</h2><br>";
                echo "<hr>";
            }
        } else {
            //Kur t qelet per her t par appointments.php qekjo del puna qe sessioni i ri ska asni data t rujtun
            echo "<p>No appointments yet.</p>";
        }
    ?>


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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>

</body>
</html>
