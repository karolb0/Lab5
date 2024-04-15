<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "passwordd";
$dbname = "ems_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve student data from form
$student_name = $_POST['student_name'];
$student_department = $_POST['student_department'];
// Add more fields as needed

// SQL query to insert student data into the database
$sql = "INSERT INTO Student_tab (Stu_name, Stu_department) VALUES ('$student_name', '$student_department')";

if ($conn->query($sql) === TRUE) {
    echo "Student added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
