<!DOCTYPE html>
<html>
<head>
  <title>Data Display</title>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Data Display</h2>
    <table class="table table-bordered">
      <tr>
        <th>EmployeeID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Age</th>
        <th>Salary</th>
      </tr>
      <?php
      // Connect to the database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "Employee_db";

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Fetch data from employees and departments tables using a JOIN
      $sql = "SELECT employees.EmployeeID, employees.Name, departments.Department, employees.Age, employees.Salary
              FROM employees
              INNER JOIN departments ON employees.DepartmentID = departments.DepartmentID";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['EmployeeID'] . "</td>";
          echo "<td>" . $row['Name'] . "</td>";
          echo "<td>" . $row['Department'] . "</td>";
          echo "<td>" . $row['Age'] . "</td>";
          echo "<td>" . $row['Salary'] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No data available</td></tr>";
      }

      $conn->close();
      ?>
    </table>
    
    <button onclick="window.location.href='index.php'" class="btn btn-primary">Go Back</button>
  </div>
</body>
</html>
