<?php
// Database connection
$servername = "localhost";  // or your DB host
$username = "root";  // MySQL username
$password = "";  // MySQL password
$dbname = "SmartBusSchedulerDB";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$employeeId = $_POST['employeeId'];
$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];  // Assuming YYYY format
$department = $_POST['department'];
$designation = $_POST['designation'];
$route_id = $_POST['busRoute'];  // Assuming busRoute corresponds to route_id
$bus_time = $_POST['busTimings'];  // Assuming busTimings is in HH:MM:SS format
$totalHours = $_POST['totalHours'];

// SQL query to insert data into Employee table
$sql = "INSERT INTO Employee (employee_id, employee_name, email, dob, department, designation, route_id, bus_time, total_hours)
VALUES ('$employeeId', '$name', '$email', '$dob', '$department', '$designation', '$route_id', '$bus_time', '$totalHours')";

if ($conn->query($sql) === TRUE) {
    echo "Employee registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
