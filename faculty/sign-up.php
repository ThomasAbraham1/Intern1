<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />


    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="../assets/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/custom.min.css?v=2.0.0" />

    <!-- Jquery-3 -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <!-- Dark Css -->
    <link rel="stylesheet" href="../assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="../assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="../assets/css/rtl.min.css" />
    
      <!-- Parsley css for form validation -->
   <link href="/intern1/assets/css/parsley.css" rel="stylesheet" />

</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <!-- <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="../assets/images/auth/05.png" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div> -->
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="../assets/images/auth/01.png" class="img-fluid gradient-main animated-scaleX" alt="images">
                </div>
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent auth-card shadow-none d-flex justify-content-center mb-0">
                                <div class="card-body">
                                    <a href="../dashboard/index.html" class="navbar-brand d-flex align-items-center mb-3">
                                        <!--Logo start-->
                                        <!--logo End-->

                                        <!--Logo start-->
                                        <div class="logo-main">
                                            <div class="logo-normal">
                                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                                                </svg>
                                            </div>
                                            <div class="logo-mini">
                                                <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                                                    <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                                                    <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                                                    <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                                                </svg>
                                            </div>
                                        </div>
                                        <!--logo End-->




                                        <h4 class="logo-title ms-3">Hope UI</h4>
                                    </a>
                                    <h2 class="mb-2 text-center">Sign Up</h2>
                                    <p class="text-center">Create your Hope UI account.</p>
                                    <form id='signUpForm'>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="first-name" class="form-label">First Name</label>
                                                    <input type="text" data-parsley-trigger="change" class="form-control" id="first-name" placeholder=" " required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="last-name" class="form-label">Last Name</label>
                                                    <input type="text" data-parsley-trigger="change" class="form-control" id="last-name" placeholder=" " required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" placeholder=" " data-parsley-trigger="change" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="phone" class="form-label">Phone No.</label>
                                                    <input type="number" class="form-control" data-parsley-trigger="change" id="phone" placeholder=" " required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="courses">Department:</label>
                                                <select id="department" name="type" class="selectpicker form-control" data-style="py-0" required data-parsley-trigger="change">
                                                    <option hidden disabled selected value>Choose a department</option>
                                                    <option value="CSE">CSE</option>
                                                    <option value="ECE">ECE</option>
                                                    <option value="EEE">EEE</option>
                                                    <option value="MECH">MECH</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" data-parsley-trigger="change" class="form-control" id="password" placeholder=" " required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="confirm-password" class="form-label">Confirm Password</label>
                                                    <input type="password" data-parsley-trigger="change" class="form-control" id="confirm-password" placeholder=" " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">Sign Up</button>
                                        </div>
                                        <p class="text-center my-3">or sign in with other accounts?</p>
                                        <div class="d-flex justify-content-center">
                                            <ul class="list-group list-group-horizontal list-group-flush">
                                                <li class="list-group-item border-0 pb-0">
                                                    <a href="../Student/sign-up.php">Student Sign Up</a>
                                                </li>
                                                <li class="list-group-item border-0 pb-0">
                                                    <a href="../faculty/sign-up.php">Admin Sign Up</a>
                                                </li>
                                                <!-- <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="../assets/images/brands/im.svg" alt="im"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="../assets/images/brands/li.svg" alt="li"></a>
                                    </li> -->
                                            </ul>
                                        </div>
                                        <p class="mt-3 text-center">
                                            Already have an Account <a href="sign-in.php" class="text-underline">Sign In</a>
                                        </p>
                                    </form>
                                    <div id="Result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sign-bg sign-bg-right">
                        <svg width="280" height="230" viewBox="0 0 421 359" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.05">
                                <rect x="-15.0845" y="154.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -15.0845 154.773)" fill="#3A57E8" />
                                <rect x="149.47" y="319.328" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 149.47 319.328)" fill="#3A57E8" />
                                <rect x="203.936" y="99.543" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 203.936 99.543)" fill="#3A57E8" />
                                <rect x="204.316" y="-229.172" width="543" height="77.5714" rx="38.7857" transform="rotate(45 204.316 -229.172)" fill="#3A57E8" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Library Bundle Script -->
    <script src="../assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="../assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="../assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="../assets/js/charts/vectore-chart.js"></script>
    <script src="../assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="../assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="../assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="../assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="../assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="../assets/js/hope-ui.js" defer></script>

    <!-- Parsley.js for form validation -->
    <script src="/intern1/assets/js/parsley.js"></script>
</body>
<script>
    $(document).ready(function() {
        $(function() {
            $('#signUpForm').parsley().on('field:validated', function() {
                    var ok = $('.parsley-error').length === 0;
                    $('.bs-callout-info').toggleClass('hidden', !ok);
                    $('.bs-callout-warning').toggleClass('hidden', ok);
                })
                .on('form:submit', function() {
                    return false; // Don't submit form for this demo
                });
        });

        $('#signUpForm').submit(function(e) {
            if ($('#signUpForm').parsley().isValid()) {
                e.preventDefault();

                // Gather values from the form
                var fullName = $('#first-name').val();
                var lastName = $('#last-name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var password = $('#password').val();
                var confirmPassword = $('#confirm-password').val();
                var functionName = 'signup';
                var department = $('#department').val();
                // var Pickup_Time = $("#Pickup_Time").val();
                // var Stop_Name = $("#Stop_Name").val();
                // var Drop_Time = $("#Drop_Time").val();
                // console.log(Route_No + 'HI');


                // Create a FormData object
                var formData = new FormData(this);

                // Append form values to FormData
                formData.append('fullName', fullName);
                formData.append('lastName', lastName);
                formData.append('email', email);
                formData.append('phone', phone);
                formData.append('password', password);
                formData.append('confirmPassword', confirmPassword);
                formData.append('department', department);
                formData.append('Function', functionName);
                // formData.append('event_name', event_name);

                // console.log(formData);
                // AJAX CALL FOR INSERTING 
                $.ajax({
                    url: 'functions.php',
                    type: 'POST',
                    // data: formData,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Successfully logged in! </div>`);
                            window.location.href = "home.php";
                        } else {
                            $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        }
                        setTimeout(function() {
                            $("#Result").html('');
                        }, 5000);

                    }
                });
            }
        });
    });
</script>

</html>