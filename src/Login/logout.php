<?php
session_start();  // Start the session to access session variables

// Unset all of the session variables
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    // Destroy the session cookie by setting its expiration to a past time
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Check if the 'colorSettings' cookie is set and delete it by setting its expiration date to the past.
if (isset($_COOKIE['colorSettings'])) {
    setcookie('colorSettings', '', time() - 3600, '/');  // Set the expiration time to the past to delete the cookie
}

// Redirect to the login page after logout
header("Location: login.php");
exit();
?>

