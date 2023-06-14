<?php
// confirmation.php

// Assuming you have established a database connection

session_start();

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

// Assuming you have established a database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected courses and payment method from the form
    $courses = $_POST['courses'];

    // Assuming you have obtained the user ID or email from the authentication process
    $email = $_SESSION["email"];

    // Check if the user has already taken 3 courses
    $sql = "SELECT course1, course2, course3 FROM members WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $course1 = $row['course1'];
    $course2 = $row['course2'];
    $course3 = $row['course3'];

    if ($course1 !== null && $course2 !== null && $course3 !== null) {
        // User has already taken the maximum number of courses
        echo 'You have already taken the maximum number of courses. Please finish your courses before adding new ones.';
        // You can redirect the user to a different page or provide additional instructions
        exit;
    }

    // Determine the course column to update
    if ($course1 === null) {
        $columnToUpdate = 'course1';
    } elseif ($course2 === null) {
        $columnToUpdate = 'course2';
    } else {
        $columnToUpdate = 'course3';
    }

    // Generate the placeholders for courses
    $coursePlaceholders = implode(',', array_map(function ($course, $index) {
        return ':course' . ($index + 1);
    }, $courses, array_keys($courses)));
    

    // Update the course column with the selected courses
    $sql = "UPDATE members SET $columnToUpdate = $coursePlaceholders WHERE email = :email";
    $stmt = $pdo->prepare($sql);

    // Bind the courses values dynamically
    foreach ($courses as $index => $course) {
        $stmt->bindValue(':course' . ($index + 1), $course);
    }

    $stmt->bindValue(':email', $email);

    if ($stmt->execute()) {
        // Enrollment successful, redirect back to course_u.php
        $_SESSION['course1'] = $course1;
        $_SESSION['course2'] = $course2;
        $_SESSION['course3'] = $course3;
        header('Location: course_u.php');
        exit;
    } else {
        echo 'An error occurred during enrollment. Please try again.';
        // You can redirect the user to a different page or provide additional instructions
    }
}
?>