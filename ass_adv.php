<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit-icons.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="common.css">
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
      body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

         .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            margin: 0 auto; /* Add this to horizontally center the card */
            margin-top: 20px; /* Optional margin for spacing from the top */
        }
        .card h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .card form {
            display: flex;
            flex-direction: column;
        }

        .card label {
            margin-bottom: 8px;
            font-weight: bold;
        }

        .card input[type="text"],
        .card textarea,
        .card input[type="file"],
        .card input[type="datetime-local"],
        .card input[type="submit"] {
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .card input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .card input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
        <body>
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
                    <div class="uk-navbar-right">
                        <div>
                            <a href="https://www.linkedin.com/mwlite/in/jananik21" class="uk-icon-link uk-margin-small-right" uk-icon="icon: linkedin;  ratio: 2"></a>
                            <a href="https://github.com/jananik21" class="uk-icon-link uk-margin-small-right" uk-icon="icon: github;ratio:2"></a>
                        </div> 
                    </div>
                </div>
            </div>
        </nav>  
    </div>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ass_name = $_POST["ass_name"];
    $ass_ques = $_POST["ass_ques"];
    $ass_dl = $_POST["ass_dl"]; // Renamed from 'deadline'
    
    // Process the uploaded assignment documents
    if (isset($_FILES["ass_doc"])) {
        $file_name = $_FILES["ass_doc"]["name"];
        $file_tmp = $_FILES["ass_doc"]["tmp_name"];
        $file_type = $_FILES["ass_doc"]["type"];
        $file_size = $_FILES["ass_doc"]["size"];
        
        // Move the uploaded file to a desired location
        move_uploaded_file($file_tmp, "uploads1/" . $file_name);
    }
    
    // Database configuration (update with your database details)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projects";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Save the assignment details to a database
    if ($conn) {
        $sql = "INSERT INTO assign_adv (ass_name, ass_ques, ass_doc, ass_dl)
                VALUES ('$ass_name', '$ass_ques', '$file_name', '$ass_dl')";

        if ($conn->query($sql) === TRUE) {
            echo "Assignment uploaded successfully.";
        } else {
            echo "Error uploading assignment: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "Database connection is not available.";
    }
}
?>

<div class="card">
        <h2>Assignment Questions</h2>
        <form action="ass_adv.php" method="POST" enctype="multipart/form-data">
            <label for="ass_name">Assignment Name:</label>
            <input type="text" id="ass_name" name="ass_name" required>

            <label for="ass_ques">Assignment Questions:</label>
            <textarea id="ass_ques" name="ass_ques" required></textarea>

            <label for="ass_doc">Assignment Documents:</label>
            <input type="file" id="ass_doc" name="ass_doc" >

            <label for="ass_dl">Deadline:</label>
            <input type="datetime-local" id="ass_dl" name="ass_dl" required>

            <input type="submit" value="Upload Assignment">
        </form>
</div>
<div class="uk-section  uk-padding-small uk-padding-remove-bottom">
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
<hr><div class="footer-copyright uk-text-center">
    Developed by Janani| Rathinam Technical Campus
</div>
</div>
</footer>
</html>
