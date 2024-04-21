<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotorEmpire</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <link rel="stylesheet" href="login.css">

    <style>
    
    </style>
</head>
<body>

<br><br>

    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>
        <?php
       
            class User {
                protected $email;
                private $password;
            
                public function __construct($email, $password) {
                    $this->email = $email;
                    $this->password = $password;
                }
            
                public function getEmail() {
                    return $this->email;
                }
            
                protected function getPassword() {
                    return $this->password;
                }
            
                public function __destruct() {
                    // Example: Cleaning up logs or closing connections
                }
            }
        

class AuthUser extends User {
    public function login($conn) {
        $email = mysqli_real_escape_string($conn, $this->getEmail());
        $password = mysqli_real_escape_string($conn, $this->getPassword());

        $sql = "SELECT fullname FROM register WHERE email = '$email' AND passwordi = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['login_user'] = $row['fullname'];
            header("location: ../../Home/index.php");
            exit();
        } else {
            throw new Exception("Invalid login credentials.");
        }
    }


}
 
include("../../database/configDatabase.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Assume AuthUser is defined in another included file or the same file above this script
        $authUser = new AuthUser($_POST['email'], $_POST['password'], $conn); // Make sure to pass $conn if required as shown previously
        $authUser->login($conn);
    } catch (Exception $e) {
        $error = $e->getMessage();
        echo $error;  // Consider redirecting or displaying a user-friendly error message
    }
}


        ?>



        <br>
        <form action="login.php" method="post">
        <div class="input-box">
            <input type="email" class="input-field" name="email" placeholder="Email">
        </div>
        <div class="input-box">
            <input type="password" class="input-field" name="password" placeholder="Password" autocomplete="off">
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
            <input type="submit" name="login" value="Sign in" class="submit-btn" id="submit1" style="color: #fff;">
        </div>
        <div class="sign-up-link">
            <p>Don't have an account? <a href="register.php">Register</a></p>
            <a href="../../Home/index.php"><u>Return To Homepage</u></a>
        </div>
       
    
    <?php
    include("../../src/Login/cookies.php");
   
     ?>
</body>
</html>
