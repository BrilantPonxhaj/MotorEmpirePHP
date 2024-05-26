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

// Function to get user by email, returning by reference
function &getUserByEmail(&$conn, $email) {
    $sql = "SELECT * FROM register WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        throw new Exception("Failed to prepare the statement: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    }
    $null = null;
    return $null;
}

// Class for user authentication, inherits from User class
class AuthUser extends User {
    // Method for user login
    public function login(&$conn, $isAdminLogin = false) {
        $email = $this->getEmail();
        $password = $this->getPassword();

        // Use getUserByEmail function to get user data
        $user = &getUserByEmail($conn, $email);

        // Check if user exists and password matches
        if ($user) {
            if ($password === $user['passwordi']) {
                $_SESSION['login_user'] = $user['fullname'];
                $_SESSION['isAdmin'] = $user['isAdmin'];
                $_SESSION['last_login'] = $user['last_login'];

                // Update last login time
                $lastLogin = date("Y-m-d H:i:s");
                $sqlUpdate = "UPDATE register SET last_login='$lastLogin' WHERE email=?";
                $updateStmt = mysqli_prepare($conn, $sqlUpdate);
                mysqli_stmt_bind_param($updateStmt, "s", $email);
                mysqli_stmt_execute($updateStmt);

                if (mysqli_stmt_affected_rows($updateStmt) > 0) {
                    $_SESSION['last_login'] = $lastLogin; // Update session with the new login time
                } else {
                    // Debugging statement
                    error_log("Failed to update last login time: " . mysqli_error($conn));
                    throw new Exception("Failed to update last login time: " . mysqli_error($conn));
                }
                mysqli_stmt_close($updateStmt);

                $colorSettings = "#222831|white";
                setcookie('colorSettings', $colorSettings, time() + (86400 * 30), '/');

                if ($isAdminLogin && $user['isAdmin'] == 1) {
                    $adminPath = '../../testingadmin/admin.php';

                    if (file_exists($adminPath)) {
                        $handle = fopen($adminPath, 'r');
                        if ($handle) {
                            $fileSize = filesize($adminPath);
                            $fileContent = fread($handle, $fileSize);
                            fclose($handle);
                            // Optional: Write to the file if needed
                            $handle = fopen($adminPath, 'a');
                            fwrite($handle, "\n<!-- User accessed admin panel on: " . date("Y-m-d H:i:s") . " -->");
                            fclose($handle);
                            header("location: $adminPath");
                            exit();
                        } else {
                            throw new Exception("Unable to access the admin page.");
                        }
                    } else {
                        throw new Exception("Admin page does not exist.");
                    }
                } elseif (!$isAdminLogin) {
                    header("location: ../../Home/index.php");
                } else {
                    throw new Exception("You do not have admin privileges.");
                }
                exit();
            } else {
                throw new Exception("Invalid login credentials.");
            }
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
$last_login_message = '';
if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];
    unset($_SESSION['error']); // Remove the error message after displaying it
} elseif (isset($_SESSION['last_login'])) {
    $last_login_message = "Your last login was on: " . $_SESSION['last_login'];
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
    <?php elseif ($last_login_message): ?>
        <div class="alert alert-info">
            <?php echo $last_login_message; ?>
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
            <input type="submit" name="admin_login" value="Login as Admin" class="btn btn-link" style="font-size: 20px;">
        </div>
    </form>
    <div class="sign-up-link">
        <p>Don't have an account? <a href="register.php">Register</a></p>
        <a href="../../Home/index.php"><u>Return To Homepage</u></a>
    </div>
</div>

<?php include("../../src/Login/cookies.php"); ?>

</body>
</html>
