<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Employee_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$department = $_POST['department'];
$age = $_POST['age'];
$salary = $_POST['salary'];


$sql = "INSERT INTO employees (Name, DepartmentID, Age, Salary) VALUES (?, ?, ?, ?)";


$stmt = $conn->prepare($sql);

$stmt->bind_param("siii", $name, $department, $age, $salary);

if ($stmt->execute()) {
    $message = "Data stored successfully.";
    $class = "success";
} else {
    $message = "Error storing data: " . $stmt->error;
    $class = "error";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Entry</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert alert-<?php echo $class; ?>">
            <h2><?php echo $message; ?></h2>
            <p>Redirecting to index.php...</p>
        </div>
    </div>
    <script>
        setTimeout(function () {
            window.location.href = "index.php";
        }, 2000); 
    </script>
</body>
</html>
