<!DOCTYPE html>
<html>
<head>
  <title>Data Entry</title>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Data Entry Form</h2>
    <form action="store_data.php" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="department">Department:</label>
        <select class="form-control" id="department" name="department" required>
          <option value="">Select Department</option>
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

          // Fetch department data from the database
          $sql = "SELECT DepartmentID, Department FROM departments";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<option value='" . $row['DepartmentID'] . "'>" . $row['Department'] . "</option>";
            }
          }

          $conn->close();
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="age">Age:</label>
        <input type="number" class="form-control" id="age" name="age" required>
      </div>

      <div class="form-group">
        <label for="salary">Salary:</label>
        <input type="text" class="form-control" id="salary" name="salary" required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      <button onclick="window.location.href='data_display.php'" class="btn btn-secondary">View Data</button>
    </form>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
