<?php
// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$phoneNumber = $_POST['phone_number'];
$lastEducation = $_POST['last_education'];
$nationality = $_POST['nationality'];
$age = $_POST['age'];
$password = $_POST['password'];

// Validate the form data (add your own validation logic here)

// Create a connection to the MySQL database
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "educatio";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the latest ID from the members table
$result = $conn->query("SELECT MAX(id) AS max_id FROM members");
$row = $result->fetch_assoc();
$latestId = $row['max_id'];

// Check if the result set is empty
if ($latestId === null) {
    $latestId = 0;
}

// Generate a new ID for the newly registered user
$newId = $latestId + 1;

// Prepare and execute the SQL statement to insert the data into the database
$stmt = $conn->prepare("INSERT INTO members (id, name, email, phone, education, nationality, age, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Error in preparing statement: " . $conn->error);
}

$stmt->bind_param("isssssis", $newId, $name, $email, $phoneNumber, $lastEducation, $nationality, $age, $password);

if (!$stmt->execute()) {
    die("Error in executing statement: " . $stmt->error);
}

// Check if the insertion was successful
if ($stmt->affected_rows > 0) {
    // Redirect to the thank you page
    header("Location: thank_you.php");
    exit();
} else {
    // Redirect back to the registration page with an error message
    header("Location: register.php?error=1");
    exit();
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>