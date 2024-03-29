<?php  
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   

   header('Refresh: 1; URL = login.php');

   //qetu o esenca me bo clear session veq munem me shtu ni button atje n login form edhe munem me bo
?>  