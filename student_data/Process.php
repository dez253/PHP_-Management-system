<?php

$servername = "localhost";
$username = "root"; 
$password = "";    
$dbname = "student_data"; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = htmlspecialchars($_POST['name']);
    $accessNo = htmlspecialchars($_POST['access_no']);
    $idNumber = htmlspecialchars($_POST['id']); // Updated variable name
    $contact = htmlspecialchars($_POST['contact']);
    $program = htmlspecialchars($_POST['program']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    $sex = htmlspecialchars($_POST['sex']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $age = htmlspecialchars($_POST['age']);

    
    if (empty($accessNo)) {
        die("Access No is empty!");
    }

  
    echo "<h2>User Information Submitted:</h2>";
    echo "<strong>Name:</strong> " . $name . "<br>";
    echo "<strong>Access No:</strong> " . $accessNo . "<br>";
    echo "<strong>ID Number:</strong> " . $idNumber . "<br>"; 
    echo "<strong>Contact:</strong> " . $contact . "<br>";
    echo "<strong>Program:</strong> " . $program . "<br>";
    echo "<strong>Address:</strong> " . $address . "<br>";
    echo "<strong>Email:</strong> " . $email . "<br>";
    echo "<strong>Sex:</strong> " . $sex . "<br>";
    echo "<strong>Username:</strong> " . $username . "<br>";
    echo "<strong>Age:</strong> " . $age . "<br>";

    
    $conn = new mysqli("localhost", "root", "", "student_data");

    
    if ($conn->connect_error) {
        die("Error connecting to database: " . $conn->connect_error);
    } else {
        echo "Connection established successfully.<br>";
    }

    
    $stmt = $conn->prepare("INSERT INTO students (name, access_no, id_number, contact, program, address, email, sex, username, password, age) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssi", $name, $accessNo, $idNumber, $contact, $program, $address, $email, $sex, $username, $password, $age);

    if ($stmt->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    

    $stmt->close();
    $conn->close();
} else {
    echo "No data submitted.";
}
?>
