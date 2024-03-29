<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotorEmpire</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php

   session_start();

   $users = [
    'user'=>"test", 
   "manager"=>"secret",
    "guest"=>"abc123"];  //Qetu jon emrat e userav qa jon valid me bo login

   if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {   //Tregon a osht bo submit logini edhe qe nuk jon zbrazet field me password edhe username         
       $user = $_POST['username'];       // qekjo e bon assign username ti variabla user
       if (array_key_exists($user, $users)) {//qeky if e bon check nese ekziston qaj user qe osht retrieve prej loginit ekziston te vargu i users ma nelt
           if ($users[$_POST['username']] == $_POST['password']) { //tash qeky e bon check nese qaj username qe osht bo submit edhe gjindet n array osht i njejt me passwordin
         
               $_SESSION['username'] = $_POST['username']; //qetu qaj username qe o marr me post method qitet n varialbe $_session
               echo "<script>alert('You have entered correct username and password');</script>";
               header("Location: index.php"); // Redirect to the main page
               exit(); // Make sure to exit after redirection
           } else {
               echo "<script>alert('You have entered wrong Password');</script>";
           }
       } else {
           echo "<script>alert('You have entered wrong user name');</script>";
       }
   }
?>

<br><br>
<form action="" method="post">
    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>
        <div class="input-box">
            <input type="text" class="input-field" name="username" placeholder="Username" required>
        </div>
        <div class="input-box">
            <input type="password" class="input-field" name="password" placeholder="Password" autocomplete="off" required>
        </div>
        <div class="forgot">
            <section>
                <input type="checkbox" id="check">
                <label for="check">Remember me</label>
            </section>
            <section>
                <a href="#">Forgot password</a>
            </section>
        </div>
        <div class="input-submit">
            <button type="submit" name="login" class="submit-btn" id="submit"></button>
            <label for="submit">Sign in</label>
        </div>
        <div class="sign-up-link">
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
    </div>
</form>
</body>
</html>
