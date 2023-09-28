<?php
if (isset($_POST['Staff_Name'], $_POST['PhoneNumber'], $_POST['AreaOfInterest'], $_POST['IdNumber'], $_POST['Staff_email'], $_POST['Staff_Password'])) {
    $Staff_Name = $_POST['Staff_Name'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $AreaOfInterest = $_POST['AreaOfInterest'];
    $IdNumber = $_POST['IdNumber'];
    $Staff_email = $_POST['Staff_email'];
    $Staff_Password = $_POST['Staff_Password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'projects');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO staff_login (Staff_Name, PhoneNumber, AreaOfInterest, IdNumber, Staff_email, Staff_Password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $Staff_Name, $PhoneNumber, $AreaOfInterest, $IdNumber, $Staff_email, $Staff_Password);
        
        // Execute the statement
        $execval = $stmt->execute();

        if ($execval) {
            header("Location: register_success.php");
            exit; // Exit to prevent further script execution
        } else {
            echo "Error inserting data: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required.";
}
?>
