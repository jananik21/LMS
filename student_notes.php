<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
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
                            <a href="https://www.linkedin.com/mwlite/in/jananik21"
                                class="uk-icon-link uk-margin-small-right" uk-icon="icon: linkedin;  ratio: 2"></a>
                            <a href="https://github.com/jananik21" class="uk-icon-link uk-margin-small-right"
                                uk-icon="icon: github;ratio:2"></a>
                        </div>
                        </li>
                        </ul>

                    </div>

                </div>
            </div>
        </nav>
    </div>
    <style>
    .table
    {
        text-align: left;
    }
    </style>
</head>
<?php

session_start(); 
$userCourseLevel = $_SESSION['CourseLevel']; 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projects";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Modify the SQL query to filter notes based on the student's courseLevel
$sql = "SELECT n.*, c.course_name,c.course_type, c.course_link, c.course_document FROM course_details n
        JOIN course_details c ON n.course_type = c.course_type 
        WHERE c.course_type = '$userCourseLevel'";


$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Notes</title>
</head>
<body>
<div class="uk-container uk-text-center">
    <div class="uk-container uk-margin-top">
        <h3>ENROLLED COURSES AND NOTES</h3>

        <?php
        if ($result->num_rows > 0) {
            
            echo '<table class="uk-table uk-table-striped uk-table-hover">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Course Name</th>';
            echo '<th>Course Type</th>';
            echo '<th>Course Link</th>';
            echo '<th>Download Notes</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Output data of each row

                while ($row = $result->fetch_assoc()) {
           
                echo "<a href='course_enrolled.php?course_name=" . urlencode($row["course_name"]) . "'>ENROLLED COURSES</a>";
                echo '<tr>';
                echo '<td>' . $row["course_name"] .'</td>';
                echo '<td>' . $row["course_type"] .'</td>';
                echo '<td><a href="' . $row["course_link"] . '">' . $row["course_link"] . '</a></td>';
                echo '<td><a href="uploads/' . $row["course_document"] . '" target="uploads">Download Notes</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
        } else {
            echo "No notes available.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</div>
<!-- Add your dashboard content here -->
<!--Footer-->
<div class="uk-section  uk-padding-samll uk-padding-remove-bottom">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#000836" fill-opacity="1"
            d="M0,64L40,90.7C80,117,160,171,240,170.7C320,171,400,117,480,128C560,139,640,213,720,208C800,203,880,117,960,74.7C1040,32,1120,32,1200,42.7C1280,53,1360,75,1400,85.3L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
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
            Developed by Janani| Rathinam Technical Campus
        </div>
    </footer>
    <!--Footer end-->
</body>
</html>
