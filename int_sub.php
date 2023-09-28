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
    
    .content-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 50vh;
        flex-direction: column;
    }

    .card {
        background-color: #f8f8f8;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 400px;
        text-align: center;
    }

    .card h3 {
        color: #007bff;
    }

    .assignment {
        border: 1px solid #ddd;
        padding: 10px;
        margin: 10px 0;
        border-radius: 4px;
    }

    .assignment p {
        margin: 5px 0;
    }

    .assignment a {
        color: #007bff;
        text-decoration: none;
    }

    .assignment a:hover {
        text-decoration: underline;
    }
    </style>
<?php
// Database configuration (same as before)
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
$sql = "SELECT ass_name, EmailAddress, ass_doc, ass_date FROM ass_sub_int"; // Modify the SQL query to include assignment names and student emails
$result = $conn->query($sql);

// Close the database connection (we will reconnect later for assignment submission)
$conn->close();
?>

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
        <div class="content-container">
       <i><h2><b>SUBMISSIONS</b></h2></i>
            <div class="card">
                <?php
                 if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="assignment">';
                        echo '<h3>Assignment Name: ' . $row['ass_name'] . '</h3>';
                        echo '<p>Submitted by: ' . $row['EmailAddress'] . '</p>';
                        echo '<p>Date of submission: ' . $row['ass_date'] . '</p>';
                
                        $originalFileName = pathinfo($row['ass_doc'], PATHINFO_FILENAME);
                        echo '<p>To view: <a href="' . $row['ass_doc'] . '">' . $originalFileName . '</a></p>';
                
                         echo '<form action="submit_score.php" method="post">';
                         echo '<input type="hidden" name="ass_name" value="' . $row['ass_name'] . '">';
                         echo '<input type="hidden" name="EmailAddress" value="' . $row['EmailAddress'] . '">';
                         echo '<input type="hidden" name="ass_doc" value="' . $row['ass_doc'] . '">';
                         echo '<input type="hidden" name="ass_date" value="' . $row['ass_date'] . '">';
 
                         echo '<label for="score">Score:</label>';
                         echo '<input type="number" name="score" id="score" min="0" max="10" required>';
 
                         // Submit button
                         echo '<input type="submit" value="Submit Score">';
                         echo '</form>';
                        
                        echo '</div>';
                    }
                } else {
                    echo '<p>No assignments found.</p>';
                }
                ?>
            </div>
        </div>
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
