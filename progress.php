<!DOCTYPE html>
<html>
<head>
    <title>Student Progress Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    
    <div style="width: 80%; margin: 0 auto;">
        <canvas id="progressChart"></canvas>
    </div>

    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "projects";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_GET['EmailAddress']; 

    $sql = "SELECT score FROM score WHERE EmailAddress = '$email'";
    $result = $conn->query($sql);

    $scores = array();
    while ($row = $result->fetch_assoc()) {
        $scores[] = $row['score'];
    }
    ?>

    <script>
        var ctx = document.getElementById('progressChart').getContext('2d');

        var data = {
            labels: <?php echo json_encode(range(1, count($scores))); ?>,
            datasets: [{
                label: 'Progress',
                data: <?php echo json_encode($scores); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10
                }
            }
        };

        var progressChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>
</html>
