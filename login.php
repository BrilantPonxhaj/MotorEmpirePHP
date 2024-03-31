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

<br><br>

    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>
        <?php
            if(isset($_POST["login"])){
                $email = $_POST["email"];
                $password = $_POST["password"];
                require_once "database/configDatabase.php";
                $sql = "SELECT * FROM register WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $useri = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($useri) {
                    if (password_verify($password,$useri["passwordi"])) {
                        header("Location: index.php");
                        die();
                    }else{
                        echo "<div class='alert alert-danger'>Incorrect Password<br></div>";                        
                    }
                }else{
                    echo "<div class='alert alert-danger'>Email doesn't match<br></div>";
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
        </div>
        </form>
    </div>
</body>
</html>
