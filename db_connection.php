<?php
$host = "localhost";
$user = "root";  // Default XAMPP username
$pass = "root";  // Default XAMPP password (empty)
$dbname = "cosmicbeats"; // Your database name

// Enable error reporting for mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Create connection
    $conn = new mysqli($host, $user, $pass, $dbname);
} catch (Exception $e) {
    // Log error instead of showing raw database error to users
    error_log("Database Connection Failed: " . $e->getMessage());
    die("Something went wrong. Please try again later.");
}
?>
