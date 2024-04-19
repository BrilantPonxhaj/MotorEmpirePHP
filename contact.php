<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotorEmpire | Contact</title>
    <meta name="description" content="">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <link rel="stylesheet" href="bootstrap+fonte/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        
        <link rel="stylesheet" href="bootstrap+fonte/bootstrap-theme.min.css">
        <link rel="stylesheet" href="bootstrap+fonte/fontAwesome.css">
        <link rel="stylesheet" href="bootstrap+fonte/hero-slider.css">
        <link rel="stylesheet" href="bootstrap+fonte/owl-carousel.css">
        <link rel="stylesheet" href="style.css">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <link rel="stylesheet" href="contact.css">
</head>
<body>

<header>
      
      <div id="MenuBtn" class="fas fa-bars"></div>

      <a href="#" class="logo"><span> <img src="images/logo2.png" width="100px " height="50px" > </span></a>
      <nav class="navbar">
  
        <a href="index.php">Home</a>
        <a href="vehicles.php">Vehicles</a>
  
        <a href="contact.php">Contact</a>
        
      </nav>

      <!-- Login Button e kom shly ktu se dalina na ka kritiku heren e kalume-->
    </header>

    <section class="contactus" id="contactus" >
    <div class="contact-background">
        <img src="img/tyler2.png" alt="" class="contactus_banner">
       </div>
        <div class="contactus-content">
            <div class="line+content">
                <div class="line-dec ">
                </div>
                <p>
                    <h2>Contact Us</h2>   
                    </p>
                        </div>
                    
            </div>
        </div>
    </section>

    <main>
  <!--CONTACT FORM START-->
  <section id="Contact" class="contact">
  <h1 class="heading">Contact us</h1>
  <div class="row">
    <iframe title="Anfahrt Konzernzentrale. " width="100%" height="650px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d332.57204895274396!2d11.561623099999997!3d48.17624500000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479e77652a744cd9%3A0x1d187ce191fc1f02!2sBMW%20Group%20Konzernzentrale%20Empfang%20Petuelring!5e0!3m2!1sde!2sde!4v1582273128261!5m2!1sde!2sde">
    </iframe>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
      <h3>Book Appointment</h3>
      <input type="text" name="name" placeholder="Your Name" required class="box" />
      <input type="email" name="email" placeholder="Your Email" required class="box" />
      <input type="date" name="date" placeholder="Appointment Date" required class="box" />
      <input type="time" name="time" placeholder="Appointment Time" required class="box" />
      <textarea class="box" name="message" required placeholder="Your Message" name="" id="" cols="30" rows="10"></textarea>
      <!-- <button class="btn">Send</button> -->
      <input type="submit" name="send" value="Send" class="btn">
      <a href="appointments.php" class="btn">Appoinments made so far</a>
    </form>
  </div>
</section>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //qeky if $_SERVER osht tu e kqyr formen n contact a e ka metoden POST edhe nese osht tani i merr qato t dhana
    // edhe i run n qito variabla per perdorim tani ma posht nuk ish kan keq edhe nese psh te qaj kushti me filter
    // t emailit me shkru $_POST["email"] amo mu dok ma paqt
    $name = $_POST["name"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $message = $_POST["message"];

    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
      echo '<script>alert("Please enter a valid email address.")</script>';
  }
    
    elseif (strtotime($date) < strtotime('today')) {
        // sikur n javascript me getDate edhe ktu veq sintaksa ndryshon 
        echo '<script>alert("Please select a date that is not in the past.")</script>';
    } 
    elseif (!isWorkingHours($time)) {
        //qet funksion e kom definu posht me kohen n cilen mun me bo book
        echo '<script>alert("Please select a time during working hours (8 AM to 4 PM).")</script>';
    } else {
        //tashti nese krejt qato kushte plotsohen vjen reni ku krejt qato ruhen n qit vargun $appointment
        //qiky osht associative array tasht duhet me shtu edhe numeric edhe multidimensional amo jon shum palidhje ni zot e din ku ishtina   
        $appointment = array(
            'name' => $name,
            'email' => $email,
            'date' => $date,
            'time' => $time,
            'message' => $message
        );
        $_SESSION['appointments'][] = $appointment;
        //Tash qetu t dhanat qe ndodhen n vargun $appointment ruhen n qet vargun tjeter 'appointments'
        
        $message2 = "<b>Dear " . $_POST["name"] . ". <br>We are delighted to tell you that the time : <i>" . $_POST["time"] . " </i>on date : <i>" . $_POST["date"] . "</i> is availiable.";
        require("scriptContact.php");
          if(isset($_POST['send'])) {
            if (empty($_POST['email'])) {
              $response = "The email field is required";
            }else{
              $response = sendMail1($_POST['email'],$subject1 ,$message2);
            }
          }
          exit();
      }
}
function isWorkingHours($time) {
    $start = strtotime('08:00:00');
    $end = strtotime('16:00:00');
    $selectedTime = strtotime($time);

    return ($selectedTime >= $start && $selectedTime <= $end);
}
?>
<section id="Feature" class="team">
            <h1 class="heading"><b>Our Team</b></h1>
            <div class="swiper TeamSlider">
              <div class="swiper-wrapper">
                <div class="swiper-slide box">
                  <img src="img/team-image-1-646x680.jpg" alt="" />
                  <div class="content">
                    
                    <h3>John Doe-<b>CEO</b></h3>
                  
                   
                  </div>
                </div>


                <div class="swiper-slide box">
                  <img src="img/team-image-2-646x680.jpg" alt="" />
                  <div class="content">
                    <h3>Jane Doe-<b>Administrative Assistant</b></h3>
                 
                  </div>
                </div>



                <div class="swiper-slide box">
                  <img src="img/team-image-3-646x680.jpg" alt="" />
                  <div class="content">
                    <h3>Paula George-<b>Marketing Manager</b></h3>
                    
                  </div>
                </div>



                <div class="swiper-slide box">
                  <img src="img/team-image-4-646x680.jpg" alt="" />
                  <div class="content">
                    <h3>Dan Blatan-<b>Office Assistant</b></h3>
                   
                  </div>
                </div>



                <div class="swiper-slide box">
                  <img src="img/albertdera2.png" alt="" />
                  <div class="content">
                    <h3>Albert Deda-<b>Sales Manager</b></h3>
                   
                  </div>
                </div>



                <div class="swiper-slide box">
                  <img src="img/teamimage5.png" alt="" />
                  <div class="content">
                    <h3>Jake Peralta-<b>Customer Service Representative</b></h3>
                    
                  </div>
                </div>

                <div class="swiper-slide box">
                  <img src="img/teamimage6.png" alt="" />
                  <div class="content">
                    <h3>Robin Williams-<b>Customer Service Representative</b></h3>
                    
                  </div>
                </div>

                <div class="swiper-slide box">
                  <img src="img/teamimage7.png" alt="" />
                  <div class="content">
                    <h3>Mary Jane-<b>Customer Service Representative</b></h3>
                    
                  </div>
                </div>
      


      


            
              </div>
            </div>
          </section>

          


<br><br><br>
<!-- Footeri -->
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
    
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>


  
   




<!--SWIPER JS-->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>

//Swiper JS per slider t ekipes 
var swiper = new Swiper(".TeamSlider",
 {
    grabCursor:true,
    spaceBetween:50,
    centeredSlides:true,
    loop: true,
    autoplay:{
        delay:2000,
        disableOnInteraction:false,
    },
    pagination: 
    { 
        el: ".swiper-pagination",
        clickable: true,
    },
    //Qikjo per Responsive -- mi bo boxes te Featured Cars qe kur ti bojsh slide me t dal tjetra
    breakpoints: {
        0: {
            slidesPerView:1,
        },
        768: {
            slidesPerView:2,
        },
        1024: {
            slidesPerView:3,
        },
    }
});
</script>
    
</body>
</html>
 
 
 










 
