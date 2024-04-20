<?php  
   session_start();
   unset($_SESSION['user_logged_in']);

   header('Refresh: 1;url=index.php');

?>  