<?php
// Database connection variables
$servername = "localhost";
$username = "root"; // Default MySQL username
$password = "";     // Leave blank if no password is set
$dbname = "student_data"; // Name of your database

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $course_id = htmlspecialchars($_POST['course_id']);
    $mark = htmlspecialchars($_POST['mark']);
    $grade = htmlspecialchars($_POST['grade']);
    $comment = htmlspecialchars($_POST['comment']);

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO marks (course_id, mark, grade, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $course_id, $mark, $grade, $comment); // 's' for string, 'd' for double

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No data submitted.";
}
?>
