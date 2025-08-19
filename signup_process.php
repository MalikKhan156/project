<?php
// Include database connection
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.'); window.location.href = 'signup.html';</script>";
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists
    $check_username_query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_username_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username already exists. Please choose a different username.'); window.location.href = 'signup.html';</script>";
        exit();
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists. Please use a different email.'); window.location.href = 'signup.html';</script>";
        exit();
    }

    // Insert user into database
    $insert_query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        // Show popup and redirect to login page
        echo "<script>
                alert('Successfully Registered!');
                window.location.href = 'login.html';
              </script>";
        exit();
    } else {
        echo "<script>alert('Registration failed. Please try again.'); window.location.href = 'signup.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
