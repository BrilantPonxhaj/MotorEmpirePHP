<?php 
// MainDB database for cars data
$servername = "localhost:3308";
$username = "root";
$password = ""; 
$dbname = "maindb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!-- CREATE TABLE `cars` (
  `carID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `price` varchar(25) NOT NULL,
  `kilometers` varchar(50) NOT NULL,
  `engineType` varchar(100) NOT NULL,
  `gearbox` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` text NOT NULL
)

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carID`, `name`, `category`, `model`, `price`, `kilometers`, `engineType`, `gearbox`, `image`, `link`, `description`) VALUES
(1, 'BMW 3 Series', 'new vehicles', 'BMW 3 series', '62,500', '65,000', 'disel', 'Automatic', 'images/bmw cards/1-BMW-3-Series.jpg', 'src/CarDemos/cardemo1.php', 'Experience unmatched elegance and precision with the iconic BMW 3 Series, where dynamic performance meets timeless sophistication on every journey. Elevate your drive with cutting-edge technology and unrivaled comfort, defining the essence of luxury driving.'),
(2, 'BMW 545e xDrive', 'new vehicles', 'BMW 5 series', '84,500', '130,000', 'disel', 'Automatic', 'images/bmw cards/bmw 5.jpg', 'src/CarDemos/cardemo2.php', 'Indulge in refined luxury and exhilarating performance with the BMW 5 Series, where every detail is crafted for a seamless fusion of power. Experience the epitome of driving pleasure, where innovation meets elegance, setting new standards in automotive excellence.'),
(3, 'BMW M3 CS', 'new vehicles', 'BMW M3 CS', '118,700', '45,000', 'petrol', 'Manual', 'images/bmw cards/bmw m3cs.jpg', 'src/CarDemos/cardemo3.php', 'Unleash the adrenaline with the BMW M3 CS series, designed to dominate both the road and the track. Experience the ultimate driving experience, where every curve becomes a conquest and every moment an exhilarating symphony of performance and precision.'),
(4, 'BMW 7 Series', 'new vehicles', 'BMW 7 series', '97,000', '130,000', 'hybrid', 'Automatic', 'images/bmw cards/bmw 7 hybrid.jpg', 'src/CarDemos/cardemo4.php', 'Embark on a journey of sustainable luxury with the BMW 7 Series Plug-in Hybrid, seamlessly combining eco-consciousness with unparalleled comfort. Redefining opulence, it offers a silent glide through city streets, empowered by cutting-edge technology and a commitment to a greener future.'),
(5, 'BMW M4 Competition', 'new vehicles', 'BMW M4 Competition', '113,000', '90,000', 'petrol', 'Automatic', 'images/bmw cards/m4cardimg.jpg', 'src/CarDemos/cardemo5.php', 'Unleash the beast within with the BMW M4 Competition, where raw power meets refined precision, sculpted for the ultimate driving experience on both road and track. Pushing boundaries with its adrenaline-pumping performance and iconic design, it\'s the epitome of automotive excellence, redefining the art of exhilaration behind the wheel.'),
(6, 'BMW M5 CS', 'new vehicles', 'BMW M5 CS', '142,000', '25,000', 'petrol', 'Automatic', 'images/bmw cards/bmw m5CS.jpg', 'src/CarDemos/cardemo6.php', 'Experience the pinnacle of performance luxury with the BMW M5 CS, where relentless power meets refined elegance, delivering an unparalleled driving thrill. Precision-engineered to dominate both road and track, it embodies the epitome of automotive excellence, setting new standards in exhilaration and sophistication.'),
(7, 'BMW iX2', 'new vehicles', 'BMW iX2', '61,660', '15,000', 'electric', 'Automatic', 'images/bmw cards/ix2.jpg', 'src/CarDemos/cardemo7.php', 'Experience the future of sustainable luxury with the BMW iX2, where innovative technology meets eco-conscious design, delivering an unmatched driving experience. Crafted with precision to redefine electric mobility, it embodies the essence of automotive advancement, setting a new benchmark in sustainability and sophistication.'),
(8, 'BMW M3 Competition', 'used vehicles', 'BMW M3 Competition', '50,500', '120,000', 'petrol', 'Manual', 'images/bmw cards/m3.7.jpg', 'src/CarDemos/cardemo8.php', 'Experience the ultimate fusion of power and precision with the BMW M3 Competition. Crafted to reign supreme on every road and circuit, it epitomizes automotive perfection, pushing the boundaries of performance and luxury to new heights.'),
(9, 'BMW X7', 'new vehicles', 'BMW X7', '116,050', '15,000', 'petrol', 'Automatic', 'images/bmw cards/x7.7.jpg', 'src/CarDemos/cardemo9.php', 'Embark on a journey of unparalleled luxury and commanding power with the BMW X7. Designed to traverse any terrain with effortless grace and precision, the X7 stands as a testament to automotive excellence, setting new standards in performance and opulence.'); -->
