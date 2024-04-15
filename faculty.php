<?php
$servername = "localhost";
$username = "username";
$password = "passwordd";
$dbname = "ems_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_courses = "SELECT Course_name FROM Courses_tab WHERE Fac_id = 'faculty_id'";
$result_courses = mysqli_query($conn, $sql_courses);

$sql_students = "SELECT Stu_id, Stu_name, Stu_major FROM Student_tab WHERE course_id IN (SELECT Course_id FROM Courses_tab WHERE Fac_id = 'faculty_id')";
$result_students = mysqli_query($conn, $sql_students);

$sql_faculty = "SELECT Fac_name, department FROM Faculty_tab WHERE Fac_id = 'faculty_id'";
$result_faculty = mysqli_query($conn, $sql_faculty);

mysqli_close($conn);
?>
