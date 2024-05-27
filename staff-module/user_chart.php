<?php
// Your existing PHP code here
// Set timezone
date_default_timezone_set('Africa/Nairobi');
$year = date('Y');
$pyear = $year - 1;

// Initialize arrays
$total = array_fill(0, 12, 0);
$ptotal = array_fill(0, 12, 0);

// Prepare statements to prevent SQL injection
$stmt_current = $conn->prepare("SELECT MONTH(registration_date) as month, COUNT(id) as total 
                                FROM field_users 
                                WHERE YEAR(registration_date) = ? AND staff_id = ? 
                                GROUP BY MONTH(registration_date)");

$stmt_previous = $conn->prepare("SELECT MONTH(registration_date) as month, COUNT(id) as total 
                                FROM field_users 
                                WHERE YEAR(registration_date) = ? 
                                GROUP BY MONTH(registration_date)");

// Execute for current year
$stmt_current->bind_param('ii', $year, $_SESSION['staff_id']);
$stmt_current->execute();
$result_current = $stmt_current->get_result();
while ($row = $result_current->fetch_assoc()) {
    $total[$row['month'] - 1] = $row['total'];
}

// Execute for previous year
$stmt_previous->bind_param('i', $pyear);
$stmt_previous->execute();
$result_previous = $stmt_previous->get_result();
while ($row = $result_previous->fetch_assoc()) {
    $ptotal[$row['month'] - 1] = $row['total'];
}

// Close statements
$stmt_current->close();
$stmt_previous->close();

// Convert PHP arrays to JSON
$total_json = json_encode($total);
$ptotal_json = json_encode($ptotal);
?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<canvas id="registrationChart1" width="400" height="200"></canvas>

<script>
// Retrieve PHP data
var currentYearData = <?php echo $total_json; ?>;
var previousYearData = <?php echo $ptotal_json; ?>;

// Define the labels for the chart
var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// Create the chart
var ctx = document.getElementById('registrationChart1').getContext('2d');
var registrationChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Current Year',
                data: currentYearData,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Previous Year',
                data: previousYearData,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<hr>
<?php
// Your existing PHP code here
// Set timezone
date_default_timezone_set('Africa/Nairobi');
$year = date('Y');
$pyear = $year - 1;

// Initialize arrays
$total = array_fill(0, 12, 0);
$ptotal = array_fill(0, 12, 0);

// Prepare statements to prevent SQL injection
$stmt_current = $conn->prepare("SELECT MONTH(registration_date) as month, COUNT(id) as total 
                                FROM field_users 
                                WHERE YEAR(registration_date) = ? AND staff_id = ? 
                                GROUP BY MONTH(registration_date)");

$stmt_previous = $conn->prepare("SELECT MONTH(registration_date) as month, COUNT(id) as total 
                                FROM field_users 
                                WHERE YEAR(registration_date) = ? 
                                GROUP BY MONTH(registration_date)");

// Execute for current year
$stmt_current->bind_param('ii', $year, $_SESSION['staff_id']);
$stmt_current->execute();
$result_current = $stmt_current->get_result();
while ($row = $result_current->fetch_assoc()) {
    $total[$row['month'] - 1] = $row['total'];
}

// Execute for previous year
$stmt_previous->bind_param('i', $pyear);
$stmt_previous->execute();
$result_previous = $stmt_previous->get_result();
while ($row = $result_previous->fetch_assoc()) {
    $ptotal[$row['month'] - 1] = $row['total'];
}

// Close statements
$stmt_current->close();
$stmt_previous->close();

// Convert PHP arrays to JSON
$total_json = json_encode($total);
$ptotal_json = json_encode($ptotal);
?>


<canvas id="registrationChart2" width="400" height="200"></canvas>

<script>
// Retrieve PHP data
var currentYearData = <?php echo $total_json; ?>;
var previousYearData = <?php echo $ptotal_json; ?>;

// Define the labels for the chart
var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// Create the chart
var ctx = document.getElementById('registrationChart2').getContext('2d');
var registrationChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Current Year',
                data: currentYearData,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: false,
                borderWidth: 2,
                tension: 0.1
            },
            {
                label: 'Previous Year',
                data: previousYearData,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: false,
                borderWidth: 2,
                tension: 0.1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                mode: 'index',
                intersect: false,
            }
        },
        hover: {
            mode: 'nearest',
            intersect: true
        }
    }
});
</script>


<?php
// Your existing PHP code here
// Set timezone
date_default_timezone_set('Africa/Nairobi');
$year = date('Y');
$pyear = $year - 1;

// Initialize arrays
$total = array_fill(0, 12, 0);
$ptotal = array_fill(0, 12, 0);

// Prepare statements to prevent SQL injection
$stmt_current = $conn->prepare("SELECT MONTH(registration_date) as month, COUNT(id) as total 
                                FROM field_users 
                                WHERE YEAR(registration_date) = ? AND staff_id = ? 
                                GROUP BY MONTH(registration_date)");

$stmt_previous = $conn->prepare("SELECT MONTH(registration_date) as month, COUNT(id) as total 
                                FROM field_users 
                                WHERE YEAR(registration_date) = ? 
                                GROUP BY MONTH(registration_date)");

// Execute for current year
$stmt_current->bind_param('ii', $year, $_SESSION['staff_id']);
$stmt_current->execute();
$result_current = $stmt_current->get_result();
while ($row = $result_current->fetch_assoc()) {
    $total[$row['month'] - 1] = $row['total'];
}

// Execute for previous year
$stmt_previous->bind_param('i', $pyear);
$stmt_previous->execute();
$result_previous = $stmt_previous->get_result();
while ($row = $result_previous->fetch_assoc()) {
    $ptotal[$row['month'] - 1] = $row['total'];
}

// Close statements
$stmt_current->close();
$stmt_previous->close();

// Convert PHP arrays to JSON
$total_json = json_encode($total);
$ptotal_json = json_encode($ptotal);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="registrationChart" width="400" height="200"></canvas>

<script>
// Retrieve PHP data
var currentYearData = <?php echo $total_json; ?>;
var previousYearData = <?php echo $ptotal_json; ?>;

// Define the labels for the chart
var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// Create the chart
var ctx = document.getElementById('registrationChart').getContext('2d');
var registrationChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Current Year',
                data: currentYearData,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: true,
                borderWidth: 2,
                tension: 0.1
            },
            {
                label: 'Previous Year',
                data: previousYearData,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: true,
                borderWidth: 2,
                tension: 0.1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                mode: 'index',
                intersect: false,
            }
        },
        hover: {
            mode: 'nearest',
            intersect: true
        }
    }
});
</script>

</body>
</html>

