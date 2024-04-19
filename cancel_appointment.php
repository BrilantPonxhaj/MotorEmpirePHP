<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['appointment_index'])) {
    $appointmentIndex = $_POST['appointment_index'];

    // Remove appointment from session
    if (isset($_SESSION['appointments'][$appointmentIndex])) {
        unset($_SESSION['appointments'][$appointmentIndex]);
        echo '<script>alert("Appointment canceled successfully.");</script>';
    } else {
        echo '<script>alert("Error: Appointment not found.");</script>';
    }
}

// Redirect back to the page where appointments are displayed
header("Location: appointments.php");
exit();
?>