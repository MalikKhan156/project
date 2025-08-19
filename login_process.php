<?php
session_start();

// Database connection include
if (!file_exists('db_connection.php')) {
    die("Database connection file is missing.");
}

include('db_connection.php'); // Make sure this file has $conn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Directly lena (no filter, no validation)
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        die("Email and Password are required.");
    }

    // ⚠️ Raw query (Injection possible)
    $sql = "SELECT username, password FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row["username"];
        $hashed_password = $row["password"];

        // Password check
        if (password_verify($password, $hashed_password)) {
            $_SESSION["username"] = $username;
            header("Location: index1.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.location.href = 'login.html';</script>";
        }
    } else {
        echo "<script>alert('No user found with this email.'); window.location.href = 'login.html';</script>";
    }
}
$conn->close();
?>
