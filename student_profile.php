<?php
session_start();

$Student_Name = isset($_SESSION['Student_Name']) ? $_SESSION['Student_Name'] : "Not available";
$PhoneNumber = isset($_SESSION['PhoneNumber']) ? $_SESSION['PhoneNumber'] : "Not available";
$CourseLevel = isset($_SESSION['CourseLevel']) ? $_SESSION['CourseLevel'] : "Not available";
$RegisterNumber = isset($_SESSION['RegisterNumber']) ? $_SESSION['RegisterNumber'] : "Not available";
$EmailAddress = isset($_SESSION['EmailAddress']) ? $_SESSION['EmailAddress'] : "Not available";
?>

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
         .uk-navbar-container:not(.uk-navbar-transparent) {
      background: var(--blue);
        }

        .nav {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100%;
            background: #00204A;
            color: white;
            padding: 20px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
            color:white;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .nav-logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .nav-logo span {
            font-weight: bold;
            font-size: 20px;
        }

        .nav ul {
            list-style: none;
            padding: 0;
        }

        .nav li {
            margin-bottom: 10px;
        }

        .nav a {
            color: white;
            text-decoration: none;
        }


        .welcome-message {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .profile-details {
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        
        .profile-details p {
            font-size: 16px;
            margin-bottom: 5px;
        }
        .profile-button {
            background: #00204A;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .profile-button:hover {
            background: #001631; 
        }
        .uk-open>.uk-offcanvas-bar {
            background: var(--blue);
            color: white;
        }
        
       .uk-button:not(:disabled) {
        color: white;
       }
    </style>
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
                            <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-nav-primary">Dashboard</button>
                        </div> 
                    </div>
                </div>
            </div>
        </nav>  
    </div>
    <div id="offcanvas-nav-primary" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column">
        <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
            <img src="./assets/brandlogo.png" alt="Logo">
            <li><a><span> Dashboard - <?php echo $Student_Name; ?> </span></a></li>
            <li><a href="#">Profile</a></li>
            <?php
            // Check the course type selected by the student (you should have this information stored in your database)
            $courseType = $CourseLevel; // Replace with the actual variable containing the course type

            // Assignments link with conditional logic based on course type
            if ($courseType === 'Beginner') {
                echo '<li><a href="ass_fetch_beg.php">Assignments</a></li>';
            } elseif ($courseType === 'Intermediate') {
                echo '<li><a href="ass_fetch_int.php">Assignments</a></li>';
            } elseif ($courseType === 'Advanced') {
                echo '<li><a href="ass_fetch_adv.php">Assignments</a></li>';
            } else {
                echo '<li><a href="">Assignments</a></li>';
            }
            ?>
            <li><a href="./quiz_intro.html">Quiz</a></li>
            <li><a href="progress.php?EmailAddress=<?php echo $EmailAddress; ?>">Progress</a></li>
            <li><a href="./course_enrolled.php">Courses</a></li>
            <li><a href="./help.php">Help</a></li>
            <li><a href="./display_response.php">Query replies</a></li>
            <li><a href="./logout.php">Logout</a></li>
        </ul>
    </div>
</div>

    <div class="uk-section">
        <div class="uk-container">
            <div class="dashboard">
                <!-- Identity Section -->
                <section class="main">
                    <div class="profile-details">
                        <div class="uk-grid-small" uk-grid>
                            <div class="uk-width-expand">
                                <h2 class="welcome-message">Welcome <?php echo $Student_Name; ?>!</h2>
                            </div>
                            <div class="uk-width-auto">
                                <a href="./student_profile_update.php" class="edit-button" uk-icon="pencil"></a>
                            </div>
                        </div>

                        <div uk-grid class="uk-margin-small-top uk-child-width-1-3@m uk-child-width-1-2@s">
                            <div class="uk-card">

                            </div>  
                            <div class="uk-card-body">
                                <h3 class="uk-text-center">Profile Details</h3>
                                <p><strong>Name:</strong> <?php echo $Student_Name; ?></p>
                                <p><strong>Phone Number:</strong> <?php echo $PhoneNumber; ?></p>
                                <p><strong>Course Level:</strong> <?php echo $CourseLevel; ?></p>
                                <p><strong>Register Number:</strong> <?php echo $RegisterNumber; ?></p>
                                <p><strong>Email:</strong> <?php echo $EmailAddress; ?></p>   
                            </div>            
                        <div>
                </section>
                <!-- End Identity Section -->

                <!-- Button for action -->
                <div class="profile-button-container uk-padding uk-text-center">
                <a href = "./student_notes.php" class="">
                    <button class="profile-button">Start Learning</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
