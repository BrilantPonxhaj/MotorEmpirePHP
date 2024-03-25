<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Image Change</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--External Css-->
    <link rel="stylesheet" href="stylecards.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
     <!--FONT AWESOME LINK edhe ma posht osht si link i downlodum-->
     <link rel="stylesheet" href="bootstrap+fonte/fontAwesome.css">
    <style>
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
    background: #fff;
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

    font-size: 1.6rem;
    color: #000;
    margin: 0.6rem;
    justify-content: space-between;
}
header .navbar a:hover{
    color: var(--main);
    text-decoration: none;
}
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap');

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

html, body{
    font-family: 'Roboto', sans-serif;
}

img{
    width: 100%;
    display: block;
}
.main-wrapper{
    min-height: 100vh;
    background-color: #f1f1f1;
    display: flex;
    align-items: center;
    justify-content: center;
}
.container{
    max-width: 1500px;
   /* height:200px;*/
    padding: 0 1rem;
    margin: 0 auto;
    margin-top:90px;
}
.product-div{
    margin: 1rem 0;
    padding: 2rem 0;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    background-color: #fff;
    border-radius: 3px;
    column-gap: 10px;
}
.product-div-left{
    padding: 20px;
    
}
.product-div-right{
    padding: 20px;
}
.img-container img{
    width: 700px;
    margin: 0 auto;
    color:red;
}
.hover-container{
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    margin-top: 32px;
    color:red;
}
.hover-container div{
    border: 1.5px solid red;
    padding: 1rem;
    border-radius: 3px;
    margin: 0 4px 8px 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    color:red;
}
.active{
    border-color: red!important;
}
.hover-container div:hover{
    border-color: red;
}
.hover-container div img{
    width: 80px;
    cursor: pointer;
}
.product-div-right span{
    display: block;
}
.product-name{
    font-size: 26px;
    margin-bottom: 22px;
    font-weight: 700;
    letter-spacing: 1px;
    opacity: 0.9;
    font-family: serif;
    color:black;
}
.product-price{
    font-weight: bold;
    font-size: 24px;
    opacity: 0.9;
    font-weight: 500;
    color:black;
}
.product-rating{
    display: flex;
    align-items: center;
    margin-top: 12px;
    color:red;
}
.product-rating span{
    margin-right: 6px;
}
.product-description{
    font-weight: 22px;
    line-height: 1.8;
    font-weight: 300;
    opacity: 0.9;
    margin-top: 22px;
    font-size:12px;
}
.btn-groups{
    margin-top: 22px;
}
.btn-groups button{
    display: inline-block;
    font-size: 16px;
    font-family: inherit;
    text-transform: uppercase;
    padding: 15px 16px;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
}
.btn-groups button .fas{
    margin-right: 8px;
}
.add-cart-btn{
    background-color: red;
    border: 2px solid red;
    margin-right: 8px;
}
.add-cart-btn:hover{
    background-color: red;
    color: black;
}
.buy-now-btn{
    background-color: #000;
    border: 2px solid #000;
}
.buy-now-btn:hover{
    background-color: #fff;
    color: #000;
}

@media screen and (max-width: 992px){
    .product-div{
        grid-template-columns: 100%;
    }
    .product-div-right{
        text-align: center;
    }
    .product-rating{
        justify-content: center;
    }
    .product-description{
        max-width: 400px;
        margin-right: auto;
        margin-left: auto;
    }
}

@media screen and (max-width: 400px){
    .btn-groups button{
        width: 100%;
        margin-bottom: 10px;
    }
}

    </style>
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
  
  
   </header>

<!-- kodi per produktin -->
    <div class = "main-wrapper">
        <div class = "container">
            <div class = "product-div">
                <div class = "product-div-left">
                    <div class = "img-container">
                        <img src = "images/w1.png" alt = "watch">
                    </div>
                    <div class = "hover-container">
                        <div><img src = "./images/bmw cards/1-BMW-3-Series.jpg"></div>
                        <div><img src = "./images/bmw cards/bmw3.1.webp"></div>
                        <div><img src = "./images/bmw cards/bmw3.2.webp"></div>
                        <div><img src = "./images/bmw cards/bmw3.3.webp"></div>
                        <div><img src = "./images/bmw cards/bmw3.4.webp"></div>
                        <div><img src = "./images/bmw cards/bmw3.5.webp"></div>
                    </div>
                </div>
                <div class = "product-div-right">
                    <span class = "product-name">BMW 3 SERIES</span>
                    <span class = "product-price">$62,500€</span>
                    <div class = "product-rating">
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star-half-alt"></i></span>
                        <span>(350 ratings)</span>
                    </div>
                    <p class = "product-description">                    Experience unmatched elegance and precision with the iconic BMW 3 Series, where dynamic performance meets timeless sophistication on every journey.
                    Elevate your drive with cutting-edge technology and unrivaled comfort, defining the essence of luxury driving.
</p>
                    <div class = "btn-groups">
                        <button type = "button" class = "add-cart-btn"><i class = "fas fa-shopping-cart"></i>add to cart</button>
                        <button type = "button" class = "buy-now-btn"><i class = "fas fa-wallet"></i>buy now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select the "Add to Cart" button
            const addToCartButton = document.querySelector('.add-cart-btn');

            // Add event listener to the "Add to Cart" button
            addToCartButton.addEventListener('click', function() {
                // Get product details
                const productName = document.querySelector('.product-name').textContent;
                const productPrice = document.querySelector('.product-price').textContent;

                // Create an object representing the item to be added to the cart
                const item = {
                    name: productName,
                    price: productPrice,
                    quantity: 1 // Assuming quantity is 1 for now
                };

                // Add the item to the cart (You can implement your own cart functionality)
                addToCart(item);
            });

            function addToCart(item) {
                // Implement your logic to add the item to the cart
                // For demonstration purposes, let's just log the item details
                console.log('Item added to cart:', item);
            }
        });
    </script>
    -->
    <script src = "script.js"></script>
</body>
</html>




