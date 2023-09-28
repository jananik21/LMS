<?php
$conn = new mysqli('localhost', 'root', '', 'projects');

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM course_details";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error: " . $conn->error;
}
if ($result->num_rows > 0) {
    $courses = array();

    while ($row = $result->fetch_assoc()) {
        $course = array(
            'course_name' => $row['course_name'],
            'course_type' => $row['course_type'],
            'course_link' => $row['course_link']
        );

        $courses[] = $course;
    }
} else {
    echo "No courses found.";
}



$conn->close();
?>
