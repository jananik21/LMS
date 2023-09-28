<?php
if (isset($_POST['Name'], $_POST['PhoneNumber'], $_POST['CourseLevel'], $_POST['RegisterNumber'], $_POST['EmailAddress'], $_POST['Password'])) {
    $Name = $_POST['Name'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $CourseLevel = $_POST['CourseLevel'];
    $RegisterNumber = $_POST['RegisterNumber'];
    $EmailAddress = $_POST['EmailAddress'];
    $Password = $_POST['Password'];
    $conn = new mysqli('localhost', 'root', '', 'projects');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO student_login (Name, PhoneNumber, CourseLevel, RegisterNumber, EmailAddress, Password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $Name, $PhoneNumber, $CourseLevel, $RegisterNumber, $EmailAddress, $Password);
        $execval = $stmt->execute();

        if ($execval) {
            header("Location: ./student_dashboard.html");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required.";
}
?>
