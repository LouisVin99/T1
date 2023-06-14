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
            <h1 class="text-white display-1"><?php echo $_SESSION['name']; ?>'s Profile</h1>
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


    <!-- Page Start -->
    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Profile</h6>
                        <h1 class="display-4">Your Profile</h1>
                    </div>
                    <div class="profile-details">
                        <p><strong>Name:</strong> <?php echo $_SESSION['name']; ?></p>
                        <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
                        <p><strong>Phone:</strong> <?php echo $_SESSION['phone']; ?></p>
                        <p><strong>Last Education:</strong> <?php echo $_SESSION['education']; ?></p>
                        <p><strong>Nationality:</strong> <?php echo $_SESSION['nationality']; ?></p>
                        <p><strong>Age:</strong> <?php echo $_SESSION['age']; ?></p>
                    </div>
                    <a href="edit_profile.php" class="btn btn-primary mt-3">Edit Profile</a>
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