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
            <h1 class="text-white display-1"><?php echo $_SESSION['name']; ?>'s Courses and Degrees</h1>
            <div class="d-inline-flex text-white mb-5">
                <!-- <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i> -->
                <p class="m-0 text-uppercase"></p>
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


    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Dashboard</h6>
                        <h1 class="display-4">Welcome to Your Courses / Online Degrees!</h1>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="dashboard-options">
                        <?php
                        // Assuming you have fetched the course data from the members table
                        $course1 = $_SESSION["course1"];
                        $course2 = $_SESSION["course2"];
                        $course3 = $_SESSION["course3"];

                        $takenCourses = 0;  // Variable to keep track of the number of taken courses

                        // Create an array to store the taken courses
                        $takenCoursesArray = [];

                        // Count the number of taken courses and populate the takenCoursesArray
                        if ($course1 !== null) {
                            $takenCourses++;
                            $takenCoursesArray[] = $course1;
                        }
                        if ($course2 !== null) {
                            $takenCourses++;
                            $takenCoursesArray[] = $course2;
                        }
                        if ($course3 !== null) {
                            $takenCourses++;
                            $takenCoursesArray[] = $course3;
                        }

                        if ($takenCourses > 0) {
                            echo '<h4>You have taken ' . $takenCourses . ' course(s) / degree(s):</h4>';
                            echo '<ul>';
                            foreach ($takenCoursesArray as $takenCourse) {
                                echo '<li><a href="https://www.myqlearn.net" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill">Visit</a> ' . $takenCourse . '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<h4>You have not taken any courses / degrees yet.</h4>';
                        }

                        if ($takenCourses < 3) {
                            echo '<a href="courses_u.php" class="btn btn-primary">Add New Courses</a>';
                        } else {
                            echo '<h4>You have already taken the maximum number of courses and degrees. Please finish your courses and degrees before adding new ones.</h4>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Page Start -->

    

<?php
    include 'footer_u.php';
?>
</body>

</html>