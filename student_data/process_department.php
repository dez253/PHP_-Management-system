<?php
// Database connection variables
$servername = "localhost";
$username = "root"; // Default MySQL username
$password = "";     // Leave blank if no password is set
$dbname = "student_data"; // Name of your database

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $departmentName = htmlspecialchars($_POST['name']);
    $departmentHead = htmlspecialchars($_POST['head']);
    $departmentContact = htmlspecialchars($_POST['contact']);
    $departmentEmail = htmlspecialchars($_POST['email']);

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO departments (name, head, contact, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $departmentName, $departmentHead, $departmentContact, $departmentEmail);

    if ($stmt->execute()) {
        echo "Department added successfully!";
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
