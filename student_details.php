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
</head>
<style>

    .uk-table th {
        font-weight: bold; 
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

    <div class="uk-container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "projects";
        $conn = new mysqli('localhost', 'root', '', 'projects');

        if ($conn->connect_error) {
            echo "$conn->connect_error";
            die("Connection Failed: " . $conn->connect_error);
        } else {
            $sql = "SELECT * FROM student_login";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h3>Student Data</h3>";
                echo "<table class='uk-table'>";
                echo "<b><thead><tr><th>S.No</th><th>Name</th><th>Phone Number</th><th>Course Level</th><th>Register Number</th><th>Email Address</th></tr></thead></b>";
                echo "<tbody>";
                 
                $serialNumber = 1; 
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $serialNumber . "</td>";
                    echo "<td>" . $row['Student_Name'] . "</td>";
                    echo "<td>" . $row['PhoneNumber'] . "</td>";
                    echo "<td>" . $row['CourseLevel'] . "</td>";
                    echo "<td>" . $row['RegisterNumber'] . "</td>";
                    echo "<td>" . $row['EmailAddress'] . "</td>";
                    echo "</tr>";
                    $serialNumber++;
                }

                echo "</tbody></table>";
            } else {
                echo "No student data found.";
            }

            $conn->close();
        }
        ?>
    </div>

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
