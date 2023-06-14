<?php
// Start the session
session_start();

    // Get the submitted email and password
    $email = $_POST["email"];
    $password = $_POST["password"];

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

    // Prepare and execute the SQL statement to retrieve user data
    $stmt = $conn->prepare("SELECT * FROM members WHERE LOWER(email) = LOWER(?)");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user with the given email exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if ($password === $user['password']) {
            // Login successful
            // Store user data in session variables
            $_SESSION["email"] = $user['email'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['education'] = $user['education'];
            $_SESSION['nationality'] = $user['nationality'];
            $_SESSION['age'] = $user['age'];
            $_SESSION["course1"] = $user['course1'];
            $_SESSION["course2"] = $user['course2'];
            $_SESSION["course3"] = $user['course3'];
            // Add other user data to session variables if needed

            // Set the session validation flag
            $_SESSION['logged_in'] = true;

            // Redirect to the dashboard page
            header("Location: dashboard.php");
            exit();
        }
    }

    // Invalid email or password
    // Redirect back to the login page with an error message
    header("Location: login.php?error=invalid");
    exit();
?>