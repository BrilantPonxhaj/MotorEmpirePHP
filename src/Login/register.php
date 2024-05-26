<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotorEmpire</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="login-box">
        <div class="login-header">
            <header>Sign Up</header>
        </div>
        <?php 
            include("../../database/configDatabase.php");
            if(isset($_POST["submit"])){
                $fullname = $_POST["fullname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $confirmpassword = $_POST["confirmpassword"];
                $errors = array();

                // Check for empty fields
                if(empty($fullname) || empty($email) || empty($password) || empty($confirmpassword)) {
                    array_push($errors, "All fields are required");
                }
                // Validate email
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Email is not valid");
                }
                // Check password length
                if(strlen($password) < 8) {
                    array_push($errors, "Password must be at least 8 characters long");
                }
                // Check if passwords match
                if($password !== $confirmpassword) {
                    array_push($errors, "Passwords do not match");
                }

                // Check if email already exists using prepared statements
                $verify_query = mysqli_prepare($conn, "SELECT email FROM register WHERE email = ?");
                mysqli_stmt_bind_param($verify_query, "s", $email);
                mysqli_stmt_execute($verify_query);
                mysqli_stmt_store_result($verify_query);
                
                if(mysqli_stmt_num_rows($verify_query) != 0) {
                    array_push($errors, "Email already exists");
                }
                mysqli_stmt_close($verify_query);

                if(count($errors) > 0) {
                    foreach($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                } else {
                    // Insert into database using prepared statements
                    $sql = "INSERT INTO register (fullname, email, passwordi, isAdmin) VALUES (?, ?, ?, 0)";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql); 
                    if($prepareStmt){
                        mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $password);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>You are registered successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Something went wrong: " . mysqli_error($conn) . "</div>";
                    }
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($conn);
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
