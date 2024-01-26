<?php
include('/xampp/htdocs/Intern1/Includes/Header.php');
include('includes/Menu.php');


?>

<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Welcome to Tom CMS</h1>
                        <p>This is your dashboard. You can find the necessary utilities for a student here.</p>
                    </div>
                    <!-- Button on the header -->
                    <!-- <div>
                        <a href="" class="btn btn-link btn-soft-light">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                            </svg>
                            Announcements
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="iq-header-img">
        <img src="/intern1/assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
        <img src="/intern1/assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
        <img src="/intern1/assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
        <img src="/intern1/assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
        <img src="/intern1/assets/images/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
        <img src="/intern1/assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
    </div>
</div>

<!-- Create a course form -->
<div class="d-flex justify-content-center mb-4">
    <div class="card m-3 w-50 text ">
        <?php if(!$active){ ?>
        <div class="card-header">
            <?php if (mysqli_num_rows($admissionForm) > 0) {
                echo "<p><span style='color:red'>*</span>Please wait whilst your current admission form is being processed.</p>";
            } else {
            ?>
            <p>You're not yet registered!</p>
            <?php } ?>
            <h4>Register</h4>
        </div>
        <div class="card-body">
            <form id="studentRegistrationForm" <?php if ($admissionForm && mysqli_num_rows($admissionForm) > 0) { echo 'inert' ; } ?>>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="fname">First Name:</label>
                        <input type="text" value="<?php echo $f_fname ?>" class="form-control" id="fname" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="lname">Last Name:</label>
                        <input type="text" value="<?php echo $f_lname ?>" class="form-control" id="lname" placeholder="Last Name">
                    </div>
                    <!-- <div class="form-group col-md-6">
                                        <label class="form-label" for="add1">Address:</label>
                                        <input type="text" class="form-control" id="add1" placeholder="Address">
                                    </div> -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="email">Email:</label>
                        <input type="email" value="<?php echo $userName ?>" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="DOB">Date of Birth:</label>
                        <input type="date" value="<?php echo $userName ?>" class="form-control required" id="DOB" placeholder="Date of birth" required>
                    </div>
                    <!-- <div class="form-group col-sm-12">
                        <label class="form-label">Course:</label>
                        <select name="type" class="selectpicker form-control" data-style="py-0" id="course">
                            <option hidden disabled selected value>Choose a course</option>
                            <?php // foreach ($courses as $course) { ?>
                                <option value="<?php //echo $course['courseName'] ?>"><?php //echo $course['courseName'] ?></option>php
                            <?php // } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="form-label">Department:</label>
                        <select name="type" class="selectpicker form-control" data-style="py-0" id="department" required>
                            <option>Select Department</option>
                            <option value="CSE">CSE</option>
                            <option value="ECE">ECE</option>
                            <option value="EEE">EEE</option>
                            <option value="MECH">MECH</option>
                        </select>
                    </div> -->
                    <div class="form-group col-md-6">
                        <label class="form-label" for="mobno">Mobile Number:</label>
                        <input type="text" value="<?php echo $mobileNumber ?>" class="form-control" id="mobno" placeholder="Mobile Number">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="address">Address:</label>
                        <input type="text" class="form-control" id="address" placeholder="Address">
                    </div>
                    <!-- <div class="form-group col-md-6">
                                        <label class="form-label" for="altconno">Alternate Contact:</label>
                                        <input type="text" class="form-control" id="altconno" placeholder="Alternate Contact">
                                    </div> -->
                </div>
                <!-- <div class="checkbox">
                    <label class="form-label"><input class="form-check-input me-2" type="checkbox" value="" id="flexCheckChecked">Enable
                        Two-Factor-Authentication</label>
                </div> -->
                <button type="submit" id="studentRegistrationSubmitBtn" class="btn btn-primary">Submit</button>
                <div id="Result"></div>
            </form>
        </div>
        <?php } else{
            
        } ?>

    </div>
</div>

<script>
    $(document).ready(function() {
        $("#studentRegistrationSubmitBtn").click(function(e) {
            e.preventDefault();
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var email = $('#email').val();
            var DOB = $('#DOB').val();
            var mobno = $('#mobno').val();
            var address = $('#address').val();
            var userId = <?php echo $user_id ?>;
            $.ajax({
                url: 'functions.php',
                type: 'POST',
                data: {
                    fname: fname,
                    lname: lname,
                    email: email,
                    DOB: DOB,
                    mobno: mobno,
                    address: address,
                    userId: userId,
                    Function: "createAdmissionForm",
                },
                success: function(response) {
                    console.log(response);
                    if (response == "OK") {
                        $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Successfully Created! </div>`);
                        // window.location.href = "home.php";
                    } else {
                        $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                    }
                    setTimeout(function() {
                        $("#Result").html('');
                        window.location.reload();
                    }, 1000);
                }
            });
        });
    });
</script>
<?php
include('/xampp/htdocs/Intern1/Includes/Footer.php');
?>