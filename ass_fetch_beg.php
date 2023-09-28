<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
    .assignment {
      border: 1px solid black;
      padding: 10px;
      margin: 10px;
    }
    .input[type="submit"] {
        padding: 20px;
    }
        /* Style the button container */
        .form-actions {
        display: flex;
        justify-content: flex-end; /* Align to the right */
        margin-top: 10px; /* Add some spacing from the input */
    }

    .form-actions input[type="submit"] {
        background-color: #007BFF; 
        color: #fff; 
        padding: 10px 20px; 
        border: none; 
        border-radius: 5px; 
        cursor: pointer; 
        transition: background-color 0.3s ease;
    }

    .form-actions input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .assignment-form {
        background-color: #f7f7f7; 
        border: 1px solid #ddd; 
        padding: 20px; 
        margin: 10px 0;
        border-radius: 5px; 
    }

    
    .assignment-form label {
        font-weight: bold; 
    }

    
    .assignment-form input[type="text"],
    .assignment-form input[type="email"],
    .assignment-form input[type="file"] {
        width: 100%; 
        padding: 10px; 
        margin-bottom: 10px;
        border: 1px solid #ccc; 
        border-radius: 3px; 
    }

    
    .assignment-form input[type="submit"] {
        background-color: #007BFF; 
        color: #fff; 
        padding: 10px 20px; 
        border: none; 
        border-radius: 5px; 
        cursor: pointer; 
        transition: background-color 0.3s ease; 
    }

   
    .assignment-form input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .text-center {
    text-align: center;
     }

</style>
<?php
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

// Fetch assignment details from the 'assign_beg' table
$sql = "SELECT ass_name, ass_doc, ass_ques, ass_dl FROM assign_beg";
$result = $conn->query($sql);

// Handle assignment submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ass_name = $_POST["ass_name"];
    $student_email = $_POST["student_email"]; // Changed variable name
    $ass_date = date("Y-m-d H:i:s"); // Current date and time
    
    // Handle file upload
    $uploadDir = "uploads1/";
    $uploadFile = $uploadDir . basename($_FILES["ass_doc"]["name"]);
    
    if (move_uploaded_file($_FILES["ass_doc"]["tmp_name"], $uploadFile)) {
        // Insert submission into the database
        $insertSql = "INSERT INTO ass_sub (ass_name, EmailAddress, ass_date, ass_doc) VALUES ('$ass_name', '$student_email', '$ass_date', '$uploadFile')";
        if ($conn->query($insertSql) === TRUE) {
            $submissionMessage = "Assignment submitted successfully.";
        } else {
            $submissionMessage = "Error submitting assignment: " . $conn->error;
        }
    } else {
        $submissionMessage = "Error uploading file.";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (Head content here) ... -->
</head>
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
        <main>
        <div class="text-center">
      <b><i>YOUR ASSIGNMENTS</i></b>
     </div>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="assignment">';
            echo '<h3>' . $row['ass_name'] . '</h3>';
            echo '<p><strong>Assignment Documents:</strong> ' . $row['ass_doc'] . '</p>';
            echo '<p><strong>Assignment Questions:</strong> ' . $row['ass_ques'] . '</p>';
            echo '<p><strong>Deadline:</strong> ' . $row['ass_dl'] . '</p>';
           
            
            echo '<form class="assignment-form" action="ass_fetch_beg.php" method="post" enctype="multipart/form-data">';
            echo '<input type="hidden" name="ass_name" value="' . $row['ass_name'] . '">';
            echo '<label for="ass_sub_' . $row['ass_name'] . '">Upload Assignment:</label>';
            echo '<input type="file" id="ass_sub_' . $row['ass_name'] . '" name="ass_doc" required>';
            echo '<label for="student_email">Your Email Address:</label>';
            echo '<input type="email" id="student_email" name="student_email" required>';
            
            echo '<div class="form-actions">';
            echo '<input type="submit" value="Submit Assignment">';
            echo '</div>';
            echo '</div>';
            
            echo '</form>';

            if (isset($submissionMessage) && $_POST["ass_name"] == $row['ass_name']) {
                echo '<p class="message">' . $submissionMessage . '</p>';
            }
        }
    } else {
        echo '<p>No assignments found.</p>';
    }
    ?>
</main>
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
</body>
</html>
