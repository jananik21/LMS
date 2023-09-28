<?php
// Initialize variables
$Student_Name = $_POST['Student_Name'];
$PhoneNumber = $_POST['PhoneNumber'];
$CourseLevel = $_POST['CourseLevel'];
$RegisterNumber = $_POST['RegisterNumber'];

// Database connection setup
$conn = new mysqli("localhost", "root", "", "projects");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update user profile in the student_login table
session_start();
if(isset($_SESSION['EmailAddress'])){
    $EmailAddress = $_SESSION['EmailAddress'];

    $sql = "UPDATE student_login SET Student_Name=?, PhoneNumber=?, CourseLevel=?, RegisterNumber=? WHERE EmailAddress=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $Student_Name, $PhoneNumber, $CourseLevel, $RegisterNumber, $EmailAddress);

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
