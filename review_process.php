<?php
// review_process.php

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $coursesTaken = $_POST['courses_taken'];
    $review = $_POST['review'];

    // Insert the review into the database
    $sql = "INSERT INTO reviews (name, email, course, review) VALUES (:name, :email, :coursesTaken, :review)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':coursesTaken', $coursesTaken);
    $stmt->bindParam(':review', $review);

    if ($stmt->execute()) {
        // Review submitted successfully
        echo 'Thank you for submitting your review!';
        // You can redirect the user to a different page or provide additional instructions
    } else {
        echo 'An error occurred while submitting the review. Please try again.';
        header("Location: review.php");
        // You can redirect the user to a different page or provide additional instructions
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<body>

<?php
    include 'header_u.php';

    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        // Redirect to the login page
        header("Location: login.php");
        exit();
    }
?>

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Review and Testimonials</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Testimonial</p>
            </div>
            <!-- <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Courses</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Courses 1</a>
                            <a class="dropdown-item" href="#">Courses 2</a>
                            <a class="dropdown-item" href="#">Courses 3</a>
                        </div>
                    </div>
                    <input type="text" class="form-control border-light" style="padding: 30px 25px;" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Header End -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Testimonial</h6>
                    <h1 class="display-4">Thank You for Your Review!</h1>
                </div>
                <p class="m-0">Your review has been submitted successfully and will be reviewed before being published. We appreciate your feedback.</p>
                <a href="review.php" class="btn btn-primary mt-4">Go Back to Review Form</a>
            </div>
            <div class="col-lg-7">
                <div class="owl-carousel testimonial-carousel">
                    <div class="bg-white p-5">
                        <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                        <p>Educatio has helped me with applying to various online courses, and their instructors are some of the best teachers that I've ever met.</p>
                        <div class="d-flex flex-shrink-0 align-items-center mt-4">
                            <img class="img-fluid mr-4" src="img/testimonial-2.jpg" alt="">
                            <div>
                                <h5>Hans Jacob Andersen (M)</h5>
                                <span>Visual Communication Design</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-5">
                        <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                        <p>The things that the instructors from Educatio have taught me are practical problems that you will encounter in the real world.</p>
                        <div class="d-flex flex-shrink-0 align-items-center mt-4">
                            <img class="img-fluid mr-4" src="img/testimonial-1.jpg" alt="">
                            <div>
                                <h5>Natalie Williams (F)</h5>
                                <span>Business Management</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Testimonial Start -->

<?php
    include 'footer.php';
?>
</body>

</html>
