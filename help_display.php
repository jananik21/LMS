<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Data</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.26/dist/js/uikit-icons.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./common.css">
    <!-- Counter JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <style>
        /* Add custom styles here */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 0px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .question, .course-level, .answer {
            margin: 10px;
        }

        .answer input[type="text"] {
            width: 100%;
            padding: 5px;
        }

        button[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Updated navbar structure -->
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
    <h1><b>HELP RESPONSES</b></h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projects";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM help";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<form method="POST">';
        echo '<table>';
        echo '<tr><th>Question</th><th>Course Level</th><th>Answer</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td class="question">' . $row['Queries'] . '</td>';
            echo '<td class="course-level">' . $row['CourseLevel'] . '</td>';
            echo '<td class="answer"><input type="text" name="response[' . $row['help_id'] . ']" value="' . $row['response'] . '"></td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<button type="submit" name="save_responses">Save Responses</button>';
        echo '</form>';
    } else {
        echo "No data found in the 'help' table.";
    }

    if (isset($_POST["save_responses"])) {
        $responses = $_POST["response"];
        
        foreach ($responses as $help_id => $response) {
            // Insert or update the response in the help_responses table
            $stmt = $conn->prepare("UPDATE help SET response = ? WHERE help_id = ?");
            $stmt->bind_param("si", $response, $help_id);
            
            if ($stmt->execute()) {
                echo "Response for ID " . $help_id . " updated successfully.<br>";
            } else {
                echo "Error updating response for ID " . $help_id . ": " . $stmt->error . "<br>";
            }
        }
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
