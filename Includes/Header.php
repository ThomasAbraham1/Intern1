<?php
session_start();
if (isset($_SESSION['user_id'])) {
  include('conn.php');
  $user_id = $_SESSION['user_id'];

  // Query for user name and role
  $query = "SELECT * FROM erp_login WHERE user_id = '$user_id'";
  $result = mysqli_query($conn, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $f_fname = $row['f_name'];
    $f_lname = $row['l_name'];
    $userName = $row['userName'];
    $f_role = $row['role'];
    $mobileNumber = $row['phone'];
    $course = $row['course'];
    $department = $row['department'];
    $yearOfAdmission = $row['yearOfAdmission'];
    $active = $row['active'];
    $classId = $row['classId'];
    $isPaid = $row['paymentStatus'];
  }

  // Check for admission form existence for a student
  $sql = "SELECT * FROM erp_admission WHERE userId = $user_id";
  $admissionForm = mysqli_query($conn, $sql);

  // Courses
  $sql = "SELECT * FROM erp_course";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $courses = array();
    while ($row = $result->fetch_assoc()) {
      $courses[] = $row;
    }
  }

  // Get users
  $sql = "SELECT * FROM erp_login";
  $result=mysqli_query($conn,$sql);
  $users = array();
  while($row = $result->fetch_assoc()){
    $users[] = $row;
  }
  
?>
  <!doctype html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Grace College Leave App</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/intern1/assets/images/favicon.ico" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="/intern1/assets/css/core/libs.min.css" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="/intern1/assets/vendor/aos/dist/aos.css" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="/intern1/assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="/intern1/assets/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="/intern1/assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="/intern1/assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="/intern1/assets/css/rtl.min.css" />
    <!-- Jquery-3 -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="jquery.redirect.js"></script>

   <!-- Parsley css for form validation -->
   <link href="/intern1/assets/css/parsley.css" rel="stylesheet" />

   



  </head>

  <body class="  ">
    <!-- loader Start -->
    <!-- <div id="loading">
      <div class="loader simple-loader">
        <div class="loader-body"></div>
      </div>
    </div> -->
    <!-- loader END -->

  <?php } else {
  header("Location: /intern1/index.php");
}
  ?>