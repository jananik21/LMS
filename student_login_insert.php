<?php
if (isset($_POST['Student_Name'], $_POST['PhoneNumber'], $_POST['CourseLevel'], $_POST['RegisterNumber'], $_POST['EmailAddress'], $_POST['Student_Password'])) {
    $Student_Name = $_POST['Student_Name'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $CourseLevel = $_POST['CourseLevel'];
    $RegisterNumber = $_POST['RegisterNumber'];
    $EmailAddress = $_POST['EmailAddress'];
    $Student_Password = $_POST['Student_Password'];
    $conn = new mysqli('localhost', 'root', '', 'projects');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO student_login (Student_Name, PhoneNumber, CourseLevel, RegisterNumber, EmailAddress, Student_Password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $Student_Name, $PhoneNumber, $CourseLevel, $RegisterNumber, $EmailAddress, $Student_Password);

        if ($stmt->execute()) {
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
