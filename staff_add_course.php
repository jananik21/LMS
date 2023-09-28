<?php
if (isset($_POST['course_name'], $_POST['course_type'], $_FILES['course_document'],$_POST['course_link'])) {
    $course_name = $_POST['course_name'];
    $course_type = $_POST['course_type'];
    $course_document = $_FILES['course_document'];
    $course_link = $_POST['course_link'];

    $fileName = $_FILES['course_document']['name'];
    $fileTmpName = $_FILES['course_document']['tmp_name'];
    $fileSize  = $_FILES['course_document']['size'];
    $fileError = $_FILES['course_document']['error'];
    $fileType = $_FILES['course_document']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'mp4');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError == 0) {
            if ($fileSize < 100000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                // Database insertion code
                $conn = new mysqli('localhost', 'root', '', 'projects');
                if ($conn->connect_error) {
                    echo "$conn->connect_error";
                    die("Connection Failed: " . $conn->connect_error);
                } else {
                    $stmt = $conn->prepare("INSERT INTO course_details (course_name, course_type, course_document,course_link) VALUES (?, ?,?, ?)");
                    $stmt->bind_param("ssss", $course_name, $course_type, $fileNameNew,$course_link);
                    $execval = $stmt->execute();
                    if ($execval) {
                        echo "Course added successfully...";
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();
                    $conn->close();
                }
            } else {
                echo "Your file is too big";
            }
        } else {
            echo "There was an error in uploading your file!";
        }
    } else {
        echo "You cannot upload this type of file!";
    }
} else {
    echo "All fields are required.";
}
?>
