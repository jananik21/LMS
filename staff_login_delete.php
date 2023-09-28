<?php

$conn = new mysqli("localhost", "root", "", "projects");

// Check if the user is logged in and authorized to delete the account
session_start();

if (!isset($_SESSION['Staff_email'])) {
    die("You must be logged in to delete your account.");
}

$Staff_email = $_SESSION['Staff_email'];

$query = "SELECT * FROM staff_login WHERE Staff_email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $Staff_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("User not found.");
}


$query = "DELETE FROM staff_login WHERE Staff_email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $Staff_email);

if ($stmt->execute()) {
    
    session_destroy(); 
    echo "Account deleted successfully.";
} else {
    echo "Error deleting the account: " . $conn->error;
}

$conn->close();
?>
