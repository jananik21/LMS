<?php
// Start the session at the beginning of your script
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values submitted via the login form
    $Staff_email = $_POST["Staff_email"];
    $Staff_Password = $_POST["Staff_Password"];

    // Your database connection code here (use mysqli or PDO)

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "projects";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $Staff_email = mysqli_real_escape_string($conn, $Staff_email);
    $Staff_Password = mysqli_real_escape_string($conn, $Staff_Password);

    $query = "SELECT * FROM staff_login WHERE Staff_email = '$Staff_email' AND Staff_Password = '$Staff_Password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['Staff_Name'] = $row['Staff_Name'];
        $_SESSION['PhoneNumber'] = $row['PhoneNumber'];
        $_SESSION['AreaOfInterest'] = $row['AreaOfInterest'];
        $_SESSION['IdNumber'] = $row['IdNumber'];
        $_SESSION['Staff_email'] = $row['Staff_email'];

        // Redirect to the staff profile page
        header("Location: staff_profile.php");
        exit;
    } else {
        $login_error = "Invalid email or password. Please try again.";
    }
    echo "Invalid email or password. Please try again.";
    $conn->close();
}
?>
