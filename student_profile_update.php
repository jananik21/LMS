<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit-icons.min.js"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./common.css">
    <!-- counter js -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <style>
        /* Basic styling for form container */
        .container {
            margin: 20px auto;
            max-width: 800px;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Center the form on larger screens */
        @media (min-width: 768px) {
            .container {
                margin-top: 50px;
            }
        }

        /* Style form headings */
        .edit_information h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Style form labels */
        .profile_details_text {
            font-weight: bold;
        }

        /* Style form inputs and select */
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style submit button */
        .submit {
            text-align: center;
        }

        .btn-success {
            background-color: var(--blue);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .btn-success:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="js-navbar">
        <nav class="uk-navbar-container">
            <div class="uk-container">
                <div uk-navbar>
                    <div class="uk-navbar-left">
                        <ul class="uk-navbar-nav">
                            <li class="uk-active">
                                <a href="#" class="js-text-white uk-text-bold">
                                    <img src="./assets/brandlogo.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>  
    </div>
    <!-- navbar end -->

    <!-- Main content container -->
    <div class="container">
        <h3 class="edit_information">PROFILE SETTINGS</h3>

        <!-- PHP code to handle profile update -->
        <?php
// Initialize variables
$Student_Name = "";
$PhoneNumber = "";
$CourseLevel = "";
$RegisterNumber = "";
$EmailAddress = "";

// Database connection setup
$conn = new mysqli("localhost", "root", "", "projects");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details based on their session or any other identification method (e.g., email)
// For this example, I'll assume you have a session variable named 'user_email' to identify the user
session_start();
if(isset($_SESSION['EmailAddress'])){
    $EmailAddress = $_SESSION['EmailAddress'];

    $sql = "SELECT * FROM student_login WHERE EmailAddress = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $EmailAddress);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Assign user details to variables
            $Student_Name = $row["Student_Name"];
            $PhoneNumber = $row["PhoneNumber"];
            $CourseLevel = $row["CourseLevel"];
            $RegisterNumber = $row["RegisterNumber"];
            $EmailAddress = $row["EmailAddress"];
            // Note: I'm not populating the password field for security reasons.
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error fetching user details: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Handle the case where the user is not logged in or identified.
    echo "User not logged in.";
}

$conn->close();
?>

<!-- Profile update form with pre-filled values -->
<form method="post" action="student_pu_second.php">
    <label class="profile_details_text" for="Name">Name:</label>
    <input class="form-control" type="text" name="Student_Name" required value="<?php echo $Student_Name; ?>">

    <label class="profile_details_text" for="PhoneNumber">Phone Number:</label>
    <input class="form-control" type="text" name="PhoneNumber" required value="<?php echo $PhoneNumber; ?>">

    <label class="profile_details_text" for="CourseLevel">Course Level:</label>
    <input class="form-control" type="text" name="CourseLevel" required value="<?php echo $CourseLevel; ?>">

    <label class="profile_details_text" for="RegisterNumber">Register Number:</label>
    <input class="form-control" type="text" name="RegisterNumber" required value="<?php echo $RegisterNumber; ?>">

   <!-- <label class="profile_details_text" for="EmailAddress">Email Address:</label>
    <input class="form-control" type="email" name="EmailAddress" required value="<?php echo $EmailAddress; ?>">-->


    <div class="submit">
        <input class="btn-success" type="submit" value="Update Profile">
    </div>

</div>
</form>
    <div id="updateResult"></div>
    <div id="updateSuccessMessage" style="display: none;">Profile updated successfully.</div>

    </div>

    <!-- Add your HTML content and styling here -->
    <!--Footer-->
    <div class="uk-section uk-padding-small uk-padding-remove-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#000836" fill-opacity="1" d="M0,64L40,90.7C80,117,160,171,240,170.7C320,171,400,117,480,128C560,139,640,213,720,208C800,203,880,117,960,74.7C1040,32,1120,32,1200,42.7C1280,53,1360,75,1400,85.3L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
        <footer class="lms-footer">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="./assets/brandlogo.png" alt="LMS Logo">
                </div>
                <div class="footer-links">
                    <h3 class="text-white">Quick Links</h3>
                    <ul class="uk-list uk-list-hyphen">
                        <li><a href="#" class="text-cray">Home</a></li>
                        <li><a href="student_login.html" class="text-cray">Student Login</a></li>
                        <li><a href="staff_login.html" class="text-cray">Staff Login</a></li>
                        <li><a href="#" class="text-cray">Progress tracking</a></li>
                    </ul>
                </div>
                <div class="features">
                    <h3 class="text-white">Features</h3>
                    <ul>
                        <li class="text-cray">Live sessions</li>
                        <li class="text-cray">Expertise solutions</li>
                        <li class="text-cray">Free courses</li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h3 class="text-white">Contact Us</h3>
                    <ul class="uk-list uk-list-hyphen">
                        <li class="text-cray">Email: jananikuppuraj@gmail.com</li>
                        <li class="text-cray">Phone: +91 7538831121</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="footer-copyright uk-text-center">
                Developed by Janani | Rathinam Technical Campus
            </div>
        </footer>
    </div>
</body>
</html>
<script>
       document.addEventListener("DOMContentLoaded", function () {
    var updateForm = document.querySelector("#updateForm");
    var updateResult = document.querySelector("#updateResult");
    var updateSuccessMessage = document.querySelector("#updateSuccessMessage"); // Define the success message element

    updateForm.addEventListener("submit", function (event) {
        event.preventDefault();
        var formData = new FormData(updateForm);

        // Send the data to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "student_pu_second.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    updateSuccessMessage.style.display = "block"; // Display the success message
                } else {
                    updateResult.innerHTML = "Error: " + response.message;
                }
            }
        };
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(new URLSearchParams(formData));
    });
});

    </script>
