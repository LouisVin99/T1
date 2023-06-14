<!DOCTYPE html>
<html lang="en">

<body>

<?php
    include 'header.php';
?>

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Choose Your Courses</h1>
            <div class="d-inline-flex text-white mb-5">
                <!-- <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i> -->
                <p class="m-0 text-uppercase">Special Price 30% Off!</p>
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


    <!-- Register Start -->
    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="section-title position-relative mb-4">
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Enrollment</h6>
                    <h1 class="display-4">Choose Your Courses</h1>
                </div>
                <p class="m-0">Select the courses you want to enroll in and choose a payment method. Fill out the form below to proceed.</p>
            </div>
            <div class="col-lg-7">
                <form id="enrollment-form" action="confirmation.php" method="POST">
                    <div class="form-group">
                        <label for="courses">Choose Courses</label>
                        <select class="form-control" id="courses" name="courses[]" multiple required>
                            <option value="Web Design & Development">Web Design & Development</option>
                            <option value="Advanced UI / UX">Advanced UI / UX</option>
                            <option value="Fundamentals of Social Media Marketing">Fundamentals of Social Media Marketing</option>
                            <option value="Business Accounting">Business Accounting</option>
                            <option value="Visual Communication Design">Visual Communication Design</option>
                            <option value="Business Management">Business Management</option>
                        </select>
                        <div id="courses-error" class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label for="payment">Choose Payment Method</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment" id="payment-debitcard" value="Debit Card" required>
                            <label class="form-check-label" for="payment-debitcard">Debit Card</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment" id="payment-creditcard" value="Credit Card">
                            <label class="form-check-label" for="payment-creditcard">Credit Card</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment" id="payment-cryptocurrency" value="Cryptocurrency / Bitcoin">
                            <label class="form-check-label" for="payment-cryptocurrency">Cryptocurrency / Bitcoin</label>
                        </div>
                        <div id="payment-error" class="text-danger"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Register Start -->

<?php
    include 'footer.php';
?>
</body>

</html>