<?php
if (isset($_POST['EmailAddress'])) {
    $student_id_to_delete = $_POST['EmailAddress'];
    $conn = new mysqli('localhost', 'root', '', 'projects');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    $stmt = $conn->prepare("DELETE FROM student_login WHERE EmailAddress = ?");
    $stmt->bind_param("i", $student_id_to_delete);

    if ($stmt->execute()) {
        echo "Student with EmailAddress $student_id_to_delete has been deleted successfully.";
    } else {
        echo "Error deleting the student: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
</head>
<body>
    <h2>Delete Student</h2>
    <form method="post" action="">
        <label for="delete_student_id">Student EmailAddress to Delete:</label>
        <input type="text" name="delete_student_id" id="delete_student_id" required>
        <input type="submit" value="Delete Student">
    </form>
</body>
</html>
