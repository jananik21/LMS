<?php
session_start();

$Staff_Name = isset($_SESSION['Staff_Name']) ? $_SESSION['Staff_Name'] : "Not available";
$PhoneNumber = isset($_SESSION['PhoneNumber']) ? $_SESSION['PhoneNumber'] : "Not available";
$AreaOfInterest = isset($_SESSION['AreaOfInterest']) ? $_SESSION['AreaOfInterest'] : "Not available";
$IdNumber = isset($_SESSION['IdNumber']) ? $_SESSION['IdNumber'] : "Not available";
$Staff_email = isset($_SESSION['Staff_email']) ? $_SESSION['Staff_email'] : "Not available";
?>

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
                <li><a><span> Dashboard - <?php echo $Staff_Name; ?> </span></a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="./student_details.php">Students details</a></li>
                <li><a href="staff_assignment_assign.html">Assignments</a></li>
                <li><a href="ass_sub.html">Submissions</a></li>
                <li><a href="help_display.php">Queries</a></li>
                <li><a href="./logout.php">Logout</a></li>
                <li><a href="./delete_confirm_staff.html">Delete Account</a></li>
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
                                <h2 class="welcome-message">Welcome <?php echo $Staff_Name; ?>!</h2>
                            </div>
                            <div class="uk-width-auto">
                                <a href="./staff_profile_update.php" class="edit-button" uk-icon="pencil"></a>
                            </div>
                        </div>

                        <div uk-grid class="uk-margin-small-top uk-child-width-1-3@m uk-child-width-1-2@s">
                            <div class="uk-card">

                            </div>  
                            <div class="uk-card-body">
                                <h3 class="uk-text-center">Profile Details</h3>
                                <p><strong>Name:</strong> <?php echo $Staff_Name; ?></p>
                                <p><strong>Phone Number:</strong> <?php echo $PhoneNumber; ?></p>
                                <p><strong>Course Level:</strong> <?php echo $AreaOfInterest; ?></p>
                                <p><strong>Register Number:</strong> <?php echo $IdNumber; ?></p>
                                <p><strong>Email:</strong> <?php echo $Staff_email; ?></p>   
                            </div>            
                        <div>
                </section>
                <!-- End Identity Section -->

                <!-- Button for action -->
                <div class="profile-button-container uk-padding uk-text-center">
                <a href = "./staff_add_course.html" class="">
                    <button class="profile-button">Add courses</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
