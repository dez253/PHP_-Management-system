<?php
// Database connection variables
$servername = "localhost";                                     
$username = "root"; // Default MySQL username
$password = "";     // Leave blank if no password is set
$dbname = "student_data"; // Name of your database

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $code = htmlspecialchars($_POST['code']);
    $year = (int)$_POST['year'];
    $semester = htmlspecialchars($_POST['semester']);

    // Display the data for confirmation
    echo "<h2>Course Information Submitted:</h2>";
    echo "<strong>Course Name:</strong> " . $name . "<br>";
    echo "<strong>Course Code:</strong> " . $code . "<br>";
    echo "<strong>Year:</strong> " . $year . "<br>";
    echo "<strong>Semester:</strong> " . $semester . "<br>";

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "student_data");

    // Check the connection
    if ($conn->connect_error) {
        die("Error connecting to database: " . $conn->connect_error);
    } else {
        echo "Connection established successfully.<br>";
    }

    // Prepare to insert data into the database
    $stmt = $conn->prepare("INSERT INTO courses (name, code, year, semester) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $code, $year, $semester);

    if ($stmt->execute()) {
        echo "Course data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    echo "No data submitted.";
}
?>
