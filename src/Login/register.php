<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotorEmpire</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-box">
        <div class="login-header">
            <header>Sign Up</header>
        </div>
        <?php 
            if (isset($_POST["submit"])) {
                $fullname = $_POST["fullname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $confirmpassword = $_POST["confirmpassword"];
                
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $errors = array();
                
                if(empty($fullname) OR empty($email) OR empty($password) OR empty($confirmpassword) ) {
                    array_push($errors, "All fields are required");
                }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Email is not valid");
                }
                if (strlen($password) < 8) {
                    array_push($errors, "Password must be at least 8 characters long");
                }
                if($password !== $confirmpassword) {
                    array_push($errors, "Passwords do not match");
                }
                require_once "database/configDatabase.php";
                $sql = "SELECT * FROM register WHERE email = '$email'";
                $result = mysqli_query($conn,$sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount>0) {
                    array_push($errors, "Email already exists!");
                }

                if (count($errors) > 0) {
                    foreach($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                }else{
                    
                    $sql = "INSERT INTO register (fullname,email,passwordi) VALUES (?, ? , ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql); 
                    if($prepareStmt){
                        mysqli_stmt_bind_param($stmt,"sss",$fullname,$email,$passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>You are registered succesfully</div>";
                    }else{
                        die("Something went wrong");
                    }
                }
            }
        ?>
        <form action="register.php" method="post">
        <div class="input-box">
            <input type="text" class="input-field" name="fullname" placeholder="Full Name" required>
        </div>
        <div class="input-box">
            <input type="email" class="input-field" name="email" placeholder="Email" required>
        </div>
        <div class="input-box">
            <input type="password" class="input-field" name="password" placeholder="Password" required>
        </div>
        <div class="input-box">
            <input type="password" class="input-field" name="confirmpassword" placeholder="Confirm your password" required>
        </div>
        

        
        <!-- <div class="forgot">
            <section>
                <input type="checkbox" id="check">
                <label for="check">Remember me</label>
            </section>
            <section>
                <a href="#">Forgot password</a>
            </section>
        </div> -->
        <div class="input-submit">
        <input type="submit" name="submit" value="Register" class="submit-btn" style="color: #fff;" id="submit1"> 
        </div>
        </form>
        <div class="sign-up-link">
            <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
    </div>
</body>
</html>