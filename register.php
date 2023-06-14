<!DOCTYPE html>
<html lang="en">

<body>

<?php
    include 'header.php';
?>

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Register Now!</h1>
            <div class="d-inline-flex text-white mb-5">
                <!-- <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i> -->
                <p class="m-0 text-uppercase">To Get 30% Off!</p>
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
                    <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Member Registration</h6>
                    <h1 class="display-4">Join Us Today</h1>
                </div>
                <p class="m-0">Register as a member to access exclusive courses and resources. Fill out the form below to get started.</p>
            </div>
            <div class="col-lg-7">
                <form id="registration-form" onsubmit="validateForm(event)" action="process.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        <div id="name-error" class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        <div id="email-error" class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone_number" placeholder="Enter your phone number" required>
                        <div id="phone-error" class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label for="education">Last Education</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="last_education" id="education-highschool" value="High School" required>
                            <label class="form-check-label" for="education-highschool">High School</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="last_education" id="education-college" value="College">
                            <label class="form-check-label" for="education-college">College</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="last_education" id="education-graduate" value="Graduate">
                            <label class="form-check-label" for="education-graduate">Graduate</label>
                        </div>
                        <div id="education-error" class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label for="nationality">Choose Nationality</label>
                        <select class="form-control" id="nationality" name="nationality" required>
                            <option name="nationality" value="">Select your nationality</option>
                            <option name="nationality" value="ID">Indonesia</option>
                            <option name="nationality" value="SG">Singapore</option>
                            <option name="nationality" value="MY">Malaysia</option>
                            <option name="nationality" value="USA">USA</option>
                            <option name="nationality" value="UK">United Kingdom</option>
                            <option name="nationality" value="CD">Canada</option>
                            <!-- Add more nationality options as needed -->
                        </select>
                        <div id="nationality-error" class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" required>
                        <div id="age-error" class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        <div id="password-error" class="text-danger"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm(event) {
        event.preventDefault();

        // Clear previous error messages
        document.querySelectorAll('.text-danger').forEach(element => element.textContent = '');

        // Get form inputs
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');
        const educationInputs = document.querySelectorAll('input[name="last_education"]');
        const nationalityInput = document.getElementById('nationality');
        const ageInput = document.getElementById('age');
        const passwordInput = document.getElementById('password');

        let isValid = true;

        // Validate name field
        if (nameInput.value.trim() === '') {
            document.getElementById('name-error').textContent = 'Please enter your name';
            isValid = false;
        }

        // Validate email field
        if (emailInput.value.trim() === '') {
            document.getElementById('email-error').textContent = 'Please enter your email';
            isValid = false;
        }

        // Validate phone number field
        if (phoneInput.value.trim() === '') {
            document.getElementById('phone-error').textContent = 'Please enter your phone number';
            isValid = false;
        }

        // Validate education field
        let isEducationSelected = false;
        educationInputs.forEach(input => {
            if (input.checked) {
                isEducationSelected = true;
            }
        });

        if (!isEducationSelected) {
            document.getElementById('education-error').textContent = 'Please select your last education';
            isValid = false;
        }

        // Validate nationality field
        if (nationalityInput.value === '') {
            document.getElementById('nationality-error').textContent = 'Please select your nationality';
            isValid = false;
        }

        // Validate age field
        if (ageInput.value.trim() === '' || isNaN(ageInput.value)) {
            document.getElementById('age-error').textContent = 'Please enter a valid age';
            isValid = false;
        }

        // Validate password field
        if (passwordInput.value.trim() === '') {
            document.getElementById('password-error').textContent = 'Please enter your password';
            isValid = false;
        }

        // Submit the form if all fields are valid
        if (isValid) {
            document.getElementById('registration-form').submit();
        }
    }
</script>

    <!-- Register Start -->

<?php
    include 'footer.php';
?>
</body>

</html>