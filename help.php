<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
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

    // Get data from the form
    $Queries = $_POST["Queries"];
    $CourseLevel = $_POST["CourseLevel"];

    // Prepare and execute the SQL query to insert data into the "help" table
    $sql = "INSERT INTO help (Queries,CourseLevel) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $Queries, $CourseLevel);

    if ($stmt->execute()) {
        // Data insertion successful
        echo "Query posted successfully!";
    } else {
        // Error in data insertion
        echo "Error inserting data: " . $stmt->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit-icons.min.js"></script>
    
   
    <!-- Bootstrap CSS (added for layout alignment) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            margin-top: 0px;
        }

        h1 {
            font-weight: 800 !important;
            font-size: 50px;
        }

        h6 {
            color: #716f6f;
        }

        .img-wrapper {
            width: 500px;
        }

        img {
            height: 100%;
            width: 100%;
        }

        input, textarea, select {
            background: #f7f9f8 !important;
        }

        .email-us {
            text-decoration: underline;
        }

        label {
            font-weight: 600;
            color: #716f6f;
        }

        button {
            float: right;
        }

        button span {
            margin-left: 8px;
        }

        button i {
            margin: 0px 8px;
        }

        /* Custom CSS for additional styling */
        .container {
            padding-top: 20px;
        }

        .img-wrapper {
            margin-top: 20px;
        }

        form {
            margin-top: 20px;
        }

        .btn-primary {
            margin-top: 20px;
        }
        .uk-navbar-container:not(.uk-navbar-transparent)
        {
            color:#000836;
        }
    </style>
</head>
<body>
    <!-- Updated navbar structure -->
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

    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Let's get you some help!</h1>
                <div class="img-wrapper">
                    <img src="https://i.ibb.co/bWfN3Qy/undraw-onboarding-o8mv-1.png" alt="undraw-onboarding-o8mv-1" border="0">
                </div>
            </div>

            <div class="col-md-6">
                <form action="help.php" method="POST">
        <!-- Your form fields here -->
        <div class="form-group">
            <label for="list">Any Queries ?</label>
            <input type="text" class="form-control" id="list" aria-describedby="emailHelp" name="Queries">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category</label>
            <select class="form-control" id="CourseLevel" name="CourseLevel">
                <option>Select</option>
                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Advanced</option>
            </select>
        </div>

    <button type="submit" class="btn btn-primary"><span>Submit</span> <i class="fas fa-long-arrow-alt-right"></i></button>
</form>

            </div>
        </div>
    </div>
</body>
</html>
