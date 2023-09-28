<?php
// Initialize variables
$Staff_Name = $_POST['Staff_Name'];
$PhoneNumber = $_POST['PhoneNumber'];
$AreaOfInterest= $_POST['AreaOfInterest'];
$IdNumber = $_POST['IdNumber'];
$Staff_email = $_POST['Staff_email'];

// Database connection setup
$conn = new mysqli("localhost", "root", "", "projects");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update user profile in the student_login table
session_start();
if(isset($_SESSION['Staff_email'])){
    $Staff_email = $_SESSION['Staff_email'];

    $sql = "UPDATE staff_login SET Staff_Name=?, PhoneNumber=?,AreaOfInterest =?, IdNumber=? WHERE Staff_email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $Staff_Name, $PhoneNumber, $AreaOfInterest, $IdNumber, $Staff_email);

    if ($stmt->execute()) {
        header("Location: pu_sucess.html");
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Handle the case where the user is not logged in or identified.
    echo "User not logged in.";
}

$conn->close();
?>
