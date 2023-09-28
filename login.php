<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $EmailAddress = $_POST["EmailAddress"];
    $password = $_POST["Password"];

    // Establish a database connection
    $conn = new mysqli('localhost', 'root', '', 'projects');

    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        // Use prepared statement to select user data from the database
        $stmt = $conn->prepare("SELECT * FROM student_login WHERE EmailAddress = ?");
        $stmt->bind_param("s", $EmailAddress);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $storedPassword = $row["Password"];

            // Verify the password
            if (password_verify($password, $storedPassword)) {
                // Password is correct, redirect to the student dashboard
                header("Location: student_dashboard.html");
                exit();
            } else {
                echo "Login failed. Incorrect password.";
            }
        } else {
            echo "Login failed. User not found.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
