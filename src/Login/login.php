<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotorEmpire</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
session_start();
include("../../database/configDatabase.php"); // Include the database configuration file

// Base class for user
class User {
    protected $email; // Declare variable for email
    private $password; // Declare variable for password

    // Constructor to initialize email and password when an object is created
    public function __construct($email, $password) {
        $this->email = $email; // Store email in protected variable
        $this->password = $password; // Store password in private variable
    }

    // Public method to get email
    public function getEmail() {
        return $this->email;
    }

    // Protected method to get password, accessible only within class and subclasses
    protected function getPassword() {
        return $this->password;
    }

    // Destructor, called automatically when the object is destroyed
    public function __destruct() {
        // Cleanup logs or close connections
    }
}

// Class for user authentication, inherits from User class
class AuthUser extends User {
    // Method for user login
    public function login($conn, $isAdminLogin = false) {
        // Sanitize email and password before sending to database to prevent SQL injection
        $email = mysqli_real_escape_string($conn, $this->getEmail());
        $password = mysqli_real_escape_string($conn, $this->getPassword());

        // Query to check user in database
        $sql = "SELECT fullname, isAdmin FROM register WHERE email = '$email' AND passwordi = '$password'";
        $result = mysqli_query($conn, $sql);
        // Check if there is a result, meaning the user is valid
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['login_user'] = $row['fullname'];
            $_SESSION['isAdmin'] = $row['isAdmin'];

            $colorSettings = "#222831|white";
            setcookie('colorSettings', $colorSettings, time() + (86400 * 30), '/');

            if ($isAdminLogin && $row['isAdmin'] == 1) {
                header("location: ../../testingadmin/admin.php");
            } elseif (!$isAdminLogin) {
                header("location: ../../Home/index.php");
            } else {
                throw new Exception("You do not have admin privileges.");
            }
            exit();
        } else {
            throw new Exception("Invalid login credentials.");
        }
    }
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (isset($_POST['login']) || isset($_POST['admin_login'])) {
            $isAdminLogin = isset($_POST['admin_login']);
            $authUser = new AuthUser($_POST['email'], $_POST['password']);
            $authUser->login($conn, $isAdminLogin);
        }
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: login.php");
        exit();
    }
}

$error_message = '';
if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<div class="login-box">
    <div class="login-header">
        <header>Login</header>
    </div>

    <?php if ($error_message): ?>
        <div class="alert alert-danger">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="post">
        <div class="input-box">
            <input type="email" class="input-field" name="email" placeholder="Email" required>
        </div>
        <div class="input-box">
            <input type="password" class="input-field" name="password" placeholder="Password" autocomplete="off" required>
        </div>
        <div class="input-submit">
            <input type="submit" name="login" value="Sign in" class="submit-btn" style="color: #fff; font-size: 20px;">
            <input type="submit" name="admin_login" value="Login as Admin" class="btn btn-link" style="color: #fff; font-size: 20px;">
        </div>
    </form>
    <div class="sign-up-link">
        <p>Don't have an account? <a href="register.php">Register</a></p>
        <a href="../../Home/index.php"><u>Return To Homepage</u></a>
    </div>
</div>

<?php
include("../../src/Login/cookies.php");
?>

</body>
</html>
