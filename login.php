<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotorEmpire</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="login.css">

    <style>
        
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #dfdfdf;
}
.login-box{
    display:flex;
    /*position: absolute;*/
    justify-content: center;
    flex-direction: column;
    width: 440px;
    height: 480px;
    padding: 30px;

}
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-bottom: 50px;
}
.container-banner {
    background-color: #f0f0f0;
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #f0f0f0;
    padding: 10px;
    text-align: center;
    left:0;
}
.login-header{
    text-align: center;
    margin: 20px 0 40px 0;
    font-size: 40px;
}
.login-header header{
    color: #333;
    font-weight: 600;
}
.input-box .input-field{
    width: 100%;
    height: 60px;
    font-size: 17px;
    padding: 0 25px;
    margin-bottom: 15px;
    border-radius: 30px;
    border: none;
    box-shadow: 0px 5px 10px 1px rgba(0, 0, 0, 0.05);
    outline: none;
    transition: .3s ease;
}

::placeholder{
    font-weight: 500;
    color: #222;
}
.input-field:focus{
    width: 105%;
}
.forgot{
    display: flex;
    justify-content: space-between;
    margin-bottom: 40px;
}
section{
    display: flex;
    align-items: center;
    font-size: 14px;
    columns: #555;
}
#check  {
    margin-right: 10px;
}
a {
    text-decoration: none;
}
a:hover{
    text-decoration: underline;
}
section a{
    color: #555;
}
.input-submit{
    position: relative;
}
.submit-btn{
    width: 100%;
    height: 60px;
    background: #222;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: 3s;
} 
.input-submit label{
    position:absolute;
    top: 45%;
    left: 50%;
    color:#fff;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    cursor: pointer;
}
.submit-btn:hover{
    background: #000;
    transform: scale(1.10,1);
}
.sign-up-link{
    text-align: center;
    font-size: 15px;
    margin-top: 20px;
}
.sign-up-link a{
    color:#000;
    font-weight: 600;
}
    </style>
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
       
    
    <?php
    include("cookies.php");
   
     ?>
</body>
</html>
