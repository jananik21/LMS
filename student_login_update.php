<?php
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST['Name'];
$phoneNumber = $_POST['PhoneNumber'];
$courseLevel = $_POST['CourseLevel'];
$registerNumber = $_POST['RegisterNumber'];
$emailAddress = $_POST['EmailAddress'];
$password = $_POST['Password'];

$sql = "UPDATE your_table_name SET 
        PhoneNumber = '$phoneNumber',
        CourseLevel = '$courseLevel',
        RegisterNumber = '$registerNumber',
        EmailAddress = '$emailAddress',
        Password = '$password'
        WHERE Name = '$name'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>
