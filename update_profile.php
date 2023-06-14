<?php
// update_profile.php

// Assuming you have established a database connection

$dsn = 'mysql:host=localhost;dbname=educatio';
$username = 'root';
$dbpassword = '';

try {
    $pdo = new PDO($dsn, $username, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Failed to connect to the database: ' . $e->getMessage();
    exit;
}

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $education = $_POST['education'];
    $nationality = $_POST['nationality'];
    $age = $_POST['age'];

    // Update the user profile in the database
    $sql = "UPDATE members SET name = :name, email = :email, phone = :phone, education = :education, nationality = :nationality, age = :age WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':education', $education);
    $stmt->bindParam(':nationality', $nationality);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':id', $_SESSION['user_id']);

    if ($stmt->execute()) {
        // Profile updated successfully
        header("Location: profile.php");
        exit;
    } else {
        echo 'An error occurred while updating the profile. Please try again.';
        // You can handle the error case or redirect the user to a different page
    }
}
?>