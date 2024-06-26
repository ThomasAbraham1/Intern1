<?php
session_start();

include('includes/conn.php');
mysqli_close($conn);
?>

<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />


    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="assets/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/custom.min.css?v=2.0.0" />

    <!-- Jquery-3 -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <!-- Dark Css -->
    <link rel="stylesheet" href="assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="assets/css/rtl.min.css" />


</head>

<body class="light theme-color-red" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>

    <!-- loader END -->
    <div class="wrapper">
    <?php include( $_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/indexHeader.php');?>

        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    <h2 class="mb-2 text-center">College Management System</h2>
                                    <p class="text-center">Login to stay connected.</p>
                                    <div class="d-flex justify-content-center">
                                        <ul class="list-group list-group-horizontal list-group-flush">
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="./Student/sign-in.php">Student Login</a>
                                            </li>
                                            <!-- <li class="list-group-item border-0 pb-0">
                                                <a href="./admin/sign-in.php">Admin Login</a>
                                            </li> -->
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="./Faculty/sign-in.php">Faculty Login</a>
                                            </li>
                                            <!-- <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="assets/images/brands/im.svg" alt="im"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="assets/images/brands/li.svg" alt="li"></a>
                                    </li> -->
                                        </ul>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <!-- <ul class="list-group list-group-horizontal list-group-flush">
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="./Student/sign-up.php">Student Sign Up</a>
                                            </li>
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="./admin/sign-up.php">Admin Sign Up</a>
                                            </li>
                                            <li class="list-group-item border-0 pb-0">
                                                <a href="./Faculty/sign-up.php">Faculty Sign Up</a>
                                            </li> -->
                                        <!-- <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="assets/images/brands/im.svg" alt="im"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="assets/images/brands/li.svg" alt="li"></a>
                                    </li> -->
                                        </ul>
                                    </div>
                                    <div id="Result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="sign-bg">
                  <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g opacity="0.05">
                     <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
                     <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
                     <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
                     <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
                     </g>
                  </svg>
               </div> -->
                </div>
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <style>
                        #coverImage {
                            aspect-ratio: 16/9;
                            object-position: center;
                            object-fit: cover;
                            width: 100%;

                        }
                    </style>
                    <img id="coverImage" src="assets/images/auth/pink.jpg" class="img-fluid gradient-main animated-scaleX" alt="images">
                </div>
            </div>
        </section>

        <?php include( $_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/indexFooter.php');?>
    </div>

    <script>
        $(document).ready(function() {

            $('#loginForm').submit(function(e) {
                e.preventDefault();

                var username = $("#username").val();
                var password = $("#password").val();
                // var Pickup_Time = $("#Pickup_Time").val();
                // var Stop_Name = $("#Stop_Name").val();
                // var Drop_Time = $("#Drop_Time").val();
                // console.log(Route_No + 'HI');


                // var formData = new FormData(this); 

                // // add selected value to formData
                // formData.append('event_name', event_name);

                // console.log(formData);
                // AJAX CALL FOR INSERTING 
                $.ajax({
                    url: './faculty/functions.php',
                    type: 'POST',
                    // data: formData,
                    // processData: false,
                    // contentType: false,
                    data: {
                        username: username,
                        password: password,
                        // Route_No: Route_No,
                        // Route_Name: Route_Name,
                        // Pickup_Time: Pickup_Time,
                        // Stop_Name: Stop_Name,
                        // Drop_Time: Drop_Time,
                        Function: "Login"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Successfully logged in! </div>`);
                            window.location.href = "./faculty/home.php";
                        } else {
                            $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        }
                        setTimeout(function() {
                            $("#Result").html('');
                        }, 5000);

                    }
                });
            });
        });
    </script>

    <!-- Library Bundle Script -->
    <script src="assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="assets/js/charts/vectore-chart.js"></script>
    <script src="assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="assets/js/hope-ui.js" defer></script>

</body>

</html>