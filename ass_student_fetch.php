<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Assignments</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Student Assignments</h1>
    </header>
    <main>
        <?php
        // Database connection details
        $db_host = 'localhost';
        $db_name = 'projects';
        $db_user = 'root';
        $db_pass = '';

        try {
            // Initialize database connection
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQL query to fetch assignments
            $stmt = $pdo->prepare("SELECT * FROM assign_beg");
            $stmt->execute();
            $assignments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>

        <h2>List of Assignments:</h2>
        <ul>
            <?php foreach ($assignments as $assignment) : ?>
                <li>
                    <strong>Assignment Title:</strong> <?php echo $assignment['ass_name']; ?><br>
                    <strong>Question:</strong> <?php echo $assignment['ass_ques']; ?><br>
                    <strong>Assignment Document:</strong> <?php echo $assignment['ass_doc']; ?><br>
                    <strong>Deadline:</strong> <?php echo $assignment['ass_dl']; ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
</body>
</html>
