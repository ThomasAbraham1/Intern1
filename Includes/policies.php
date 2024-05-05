
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/intern1/assets/images/favicon.ico" />


    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="/intern1/assets/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="/intern1/assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="/intern1/assets/css/custom.min.css?v=2.0.0" />

    <!-- Jquery-3 -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <!-- Dark Css -->
    <link rel="stylesheet" href="/intern1/assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="/intern1/assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="/intern1/assets/css/rtl.min.css" />


</head>

<body class="light theme-color-red" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <div class="wrapper">
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/indexHeader.php'); ?>
        <style>
            .policy-text {
                overflow-y: scroll;
                /* width:500px; */
                height: 400px;
            }

            .policy-block {
                display: flex;
                justify-content: center;
            }
        </style>
        <section class="policy-content">
            <div class="row m-0 align-items-center bg-white">
                <div class="col-md-6">
                    <div class="card-body">
                        <h2 class="mb-2 text-center">CMS Policies</h2>
                        <p class="text-center">
                            Read them for understanding proper usage.</p>
                        <div class="policy-text">
                            <ul>
                                <li>
                                    User Accounts: Upon registration on Tom CMS, users are responsible for maintaining the confidentiality of their account and password. Users agree to accept responsibility for all activities that occur under their account or password.<br>
                                </li>
                                <li>
                                    Content Usage: Users may not reproduce, duplicate, copy, sell, resell, or exploit any portion of the service without explicit permission from Tom CMS. This includes but is not limited to course materials, academic resources, and user-generated content.<br>
                                </li>

                                <li>
                                    Data Privacy: Tom CMS respects the privacy of its users. However, by using our services, users consent to the collection and use of their personal information as outlined in our Privacy Policy.<br>
                                </li>

                                <li>
                                    Prohibited Activities: Users agree not to engage in any activity that disrupts or interferes with the functioning of Tom CMS, including but not limited to hacking, phishing, spamming, or uploading malicious software.<br>
                                </li>

                                <li>
                                    Intellectual Property: All content provided by Tom CMS, including but not limited to text, graphics, logos, and software, is the property of Tom CMS and is protected by intellectual property laws.<br>
                                </li>
                                <li>

                                    Disclaimer of Warranties: Tom CMS provides its services on an "as is" and "as available" basis without any warranty or condition, express, implied, or statutory.<br>
                                </li>

                                <li>
                                    Limitation of Liability: In no event shall Tom CMS be liable for any direct, indirect, incidental, special, consequential, or punitive damages, including but not limited to loss of profits, data, or goodwill.<br>
                                </li>

                                <li>
                                    Governing Law: These Terms and Conditions shall be governed by and construed in accordance with the laws of [Jurisdiction], and any disputes relating to these Terms and Conditions will be subject to the exclusive jurisdiction of the courts of [Jurisdiction].<br>
                                </li>
                            </ul>

                        </div>

                        <div id="Result"></div>
                    </div>
                </div>
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <style>
                        #coverImage {
                            aspect-ratio: 16/9;
                            object-position: center;
                            object-fit: cover;
                            /* width: 100%; */
                        }
                    </style>
                           <img id="coverImage" src="/Intern1/assets/images/auth/agreement.jpg" class="img-fluid gradient-main animated-scaleX" alt="images">
                </div>
            </div>
        </section>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/indexFooter.php'); ?>
    </div>


    <!-- Library Bundle Script -->
    <script src="/intern1/assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="/intern1/assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="/intern1/assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="/intern1/assets/js/charts/vectore-chart.js"></script>
    <script src="/intern1/assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="/intern1/assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="/intern1/assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="/intern1/assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="/intern1/assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="/intern1/assets/js/hope-ui.js" defer></script>

</body>