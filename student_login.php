<?php
// Start the session at the beginning of your script
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values submitted via the login form
    $EmailAddress = $_POST["EmailAddress"];
    $Student_Password = $_POST["Student_Password"];

    // Your database connection code here (use mysqli or PDO)

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "projects";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $EmailAddress = mysqli_real_escape_string($conn, $EmailAddress);
    $Student_Password = mysqli_real_escape_string($conn, $Student_Password);

    $query = "SELECT * FROM student_login WHERE EmailAddress = '$EmailAddress' AND Student_Password = '$Student_Password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['Student_Name'] = $row['Student_Name'];
        $_SESSION['PhoneNumber'] = $row['PhoneNumber'];
        $_SESSION['CourseLevel'] = $row['CourseLevel'];
        $_SESSION['RegisterNumber'] = $row['RegisterNumber'];
        $_SESSION['EmailAddress'] = $row['EmailAddress'];

        // Redirect to the student profile page
        header("Location: student_profile.php");
        exit;
    } else {
        $login_error = "Invalid email or password. Please try again.";
    }
    echo $login_error = "Invalid email or password. Please try again.";
    $conn->close();
}
?>


