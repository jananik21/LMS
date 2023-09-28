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
$Staff_Name= "";
$PhoneNumber = "";
$AreaOfInterest = "";
$IdNumber = "";
$Staff_email = "";

// Database connection setup
$conn = new mysqli("localhost", "root", "", "projects");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details based on their session or any other identification method (e.g., email)
// For this example, I'll assume you have a session variable named 'user_email' to identify the user
session_start();
if(isset($_SESSION['Staff_email'])){
    $Staff_email = $_SESSION['Staff_email'];

    $sql = "SELECT * FROM staff_login WHERE Staff_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Staff_email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Assign user details to variables
            $Staff_Name= $row["Staff_Name"];
            $PhoneNumber = $row["PhoneNumber"];
            $AreaOfInterest = $row["AreaOfInterest"];
            $IdNumber = $row["IdNumber"];
            $Staff_email = $row["Staff_email"];
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
<form id="updateForm" method="post" action="staff_pu_second.php">
    <label class="profile_details_text" for="Name">Name:</label>
    <input class="form-control" type="text" name="Staff_Name" required value="<?php echo $Staff_Name; ?>">

    <label class="profile_details_text" for="PhoneNumber">Phone Number:</label>
    <input class="form-control" type="text" name="PhoneNumber" required value="<?php echo $PhoneNumber; ?>">

    <label class="profile_details_text" for="AreaOfInterest">Course Level:</label>
    <input class="form-control" type="text" name="AreaOfInterest" required value="<?php echo $AreaOfInterest; ?>">

    <label class="profile_details_text" for="IdNumber">Id Number:</label>
    <input class="form-control" type="text" name="IdNumber" required value="<?php echo $IdNumber; ?>">
    
    <input class="profile_details_text" type="hidden" name="Staff_email" value="<?php echo $Staff_email; ?>">

   <!-- <label class="profile_details_text" for="Staff_email">Email Address:</label>
    <input class="form-control" type="email" name="Staff_email" required value="<?php echo $Staff_email; ?>">-->



    <div class="submit">
        <input class="btn-success" type="submit" value="Update Profile">
    </div>

</form>
    <div id="updateResult"></div>
    <div id="updateSuccessMessage" style="display: none;">Profile updated successfully.</div>

    </div>

    <!-- Add your HTML content and styling here -->
    <!--Footer-->
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
        xhr.open("POST", "staff_pu_second.php", true);
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