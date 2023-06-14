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
                        <h1 class="display-4">Newest Testimonials</h1>
                    </div>
                    <p class="m-0">One of the newest reviews from our students!</p>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel">
                        <?php
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

                        // Retrieve the newest testimonials from the database
                        $sql = "SELECT * FROM reviews ORDER BY id DESC LIMIT 2";
                        $stmt = $pdo->query($sql);
                        $testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($testimonials as $testimonial) {
                            $quote = $testimonial['review'];
                            $name = $testimonial['name'];
                            $course = $testimonial['course'];

                            echo '
                            <div class="bg-white p-5 text-center">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <p>' . $quote . '</p>
                                <div>
                                    <h5>' . $name . '</h5>
                                    <span>' . $course . '</span>
                                </div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Testimonial Start -->

    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Our Location</h4>
                                <p class="m-0">West Jakarta, Indonesia</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-phone-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Call Us</h4>
                                <p class="m-0">+62 812 8540 7492</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Email Us</h4>
                                <p class="m-0">learnwitheducatio@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Write a Testimonial</h6>
                        <h1 class="display-4">Share Your Experience</h1>
                    </div>
                    <div class="contact-form">
                        <form action="review_process.php" method="POST">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" name="name" placeholder="Your Name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" name="email" placeholder="Your Email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" name="courses_taken" placeholder="Courses / Major" required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" name="review" rows="5" placeholder="Write your review" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Submit Testimonial</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial Start -->
    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="section-title position-relative mb-4">
                <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Testimonial</h6>
                <h1 class="display-4">What Our Students Say</h1>
                </div>
                <p class="m-0">Our Instructors have taught thousands of people from young to old from many parts of the world. Here are some of their testimonies of our platform.</p>
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