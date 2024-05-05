<?php
if (isset($_GET["Menu"])) {
  $Menu = $_GET["Menu"];
} else {
  $Menu = "home";
}
?>
<style>
        :root {
            --shadow-color: 0, 0%, 0%;
            --background-color: #DB5363;
            --secondary-background-color: white;
        }

        .navlogo {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            width: 100%;
            z-index: 100;
            background-color: white;
            box-shadow: 10px 5px 10px hsl(var(--shadow-color), 0.4);
            border-radius: 12px;
        }

        .navbr {
            flex-grow: 2;
            list-style: none;
            display: flex;
            justify-content: space-around;
            align-items: center;
            font-size: 1.3rem;
            position: relative;
            left: -3%;
        }

        .navbr li {
            /* margin: 0 2rem; */
            padding: 0.5rem 2rem;
            color: black;
            position: relative;
        }

        .navbr .nav-item {
            transition: color, 30ms ease-in-out;
        }

        .navbr .nav-item:hover {
            color: var(--background-color);
        }

        .navbr .nav-item.active::before {
            content: '';
            position: absolute;
            background-color: var(--background-color);
            /* top:0; */
            left: 0;
            right: 0;
            bottom: 0;
            height: 10%;
        }

        .navbr .nav-item::after {
            content: '';
            position: absolute;
            background-color: var(--background-color);
            /* top:0; */
            left: 0;
            right: 0;
            bottom: 0;
            height: 10%;
            transform: scaleX(0);
            transition: transform 200ms ease-in-out;
        }

        .navbr .nav-item:hover::after {
            transform: scaleX(1);
        }
    </style>

<div class="headr">
            <!-- Image and text -->
            <nav class="navlogo">
                <a href="dashboard/index.html" style="margin: 0 2%;" class="navbar-brand d-flex align-items-center">
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
                    <h4 class="logo-title ms-3">CMS</h4>
                </a>
                <ul class="navbr" class="navbar-nav" style="margin:0">
                    <li class="nav-item <?php echo $Menu == "home" ? "active" : "" ?>">
                        <a class="nav-link" href="/Intern1/index.php">Home</a>
                    </li>
                    <li class="nav-item  <?php echo $Menu == "policies" ? "active" : "" ?>">
                        <a class="nav-link" href="/Intern1/includes/policies.php?Menu=policies" target="_black">Policies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.gracecoe.org/aboutus" target="_blank">About Us</a>
                    </li>
                </ul>
            </nav>
        </div>