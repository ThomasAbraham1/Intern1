<style>
            .footr {
                width: 100%;
                height: 300px;
                background-color: var(--background-color);
            }

            .footr-basic {
                padding: 50px 0 0 0;
                box-sizing: border-box;
                height: 220px;
                display: flex;
                justify-content: space-around;
                align-items: flex-start;
                color: black;
            }

            .footr-basic a {
                color: black;
            }

            .footr-basic ul {
                margin: 0;
            }

            .footr-basic li {
                list-style: none;
                font-size: 1.2rem;
                /* margin: 0.60rem 0; */
            }

            .footr-basic .heading {
                font-size: 1.5rem;
            }

            .footr .brand-info {
                font-family: 'Lato', sans-serif;
                font-weight: 400;
            }

            .link-items {
                position: relative;
            }

            .link-items {
                display: block;
                width: max-content;
                padding: 0;
            }

            .useful-link-item {
                position: relative;
                /* text-align: center; */
                margin: 0;
                padding: 5px;
                /* transition: transform, 150ms ease-in-out; */
            }

            .useful-link-item:hover {
                transform: scale(1.1);
            }

            .contact-item {
                position: relative;
                /* text-align: center; */
                margin: 0;
                padding: 5px;
            }


            .useful-link-item::after,
            .contact-item::after {
                content: '';
                position: absolute;
                background-color: black;
                /* top:0; */
                left: 0;
                right: 0;
                bottom: 0;
                height: 4px;
                transform: scaleX(0);
                transition: transform 200ms ease-in-out;
            }

            .useful-link-item:hover::after,
            .contact-item:hover::after {
                transform: scaleX(1);
            }

            .brand-info {
                display: flex;
                flex-direction: column;
                text-align: center;
                /* font-family: 'Times New Roman', serif; */
            }

            .follow-item {
                display: flex;
                align-items: center;
            }

            .follow-item img {
                /* aspect-ratio: 16/9; */
                margin: 5px 0;
                width: 30px;
                height: 35px;
                object-position: center;
                object-fit: cover;
            }
            .copyright-info{
                color:black;
                text-align: center;
                position: relative;
                top:20px;
            }
        </style>
        <div class="footr">
            <div class="footr-basic">
                <!-- <div class="brand-info" style="flex-grow:1.3">

                        <h4 class="logo-title ms-3">With CMS</h4>
                        <h3 class="logo-title ms-2">Forget about <br> typing!</h3>

                </div> -->
                <div class="useful-links">
                    <div class="heading">Useful Links</div>
                    <ul class="link-items useful-link-items">
                        <li class="link-item useful-link-item"><a href="/Intern1/includes/policies.php?Menu=policies">Home</a></li>
                        <li class="link-item useful-link-item"><a href="https://www.gracecoe.org/aboutus" target="_blank">About Us</a></li>
                        <li class="link-item useful-link-item">  <a class="nav-link" href="/Intern1/includes/policies.php" target="_black">Policies</a></li>
                    </ul>
                </div>
                <div class="contact-info">
                    <div class="heading">Contact Us</div>
                    <ul class="link-items contact-items">
                        <li class="link-item contact-item"><a href="mailto:cta102938@gmail.com">cta102938@gmail.com</a></li>
                        <li class="link-item contact-item"><a href="">+91 9385341273</a></li>
                        <!-- <li class="link-item contact-item"><a href="">Home</a></li> -->
                    </ul>
                </div>
                <div class="follow-info">
                    <div class="heading">Follow Us</div>
                    <ul class="link-items follow-items">
                        <li class="link-item follow-item">
                            <a href="https://www.facebook.com" target="_blank"><img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="/Intern1/assets/images/brands/08.png" alt="profile">Facebook</a>
                        </li>
                        <li class="link-item follow-item">
                            
                            <a href="https://www.Instagram.com" target="_blank"><img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="/Intern1/assets/images/brands/10.png" alt="profile">Instagram</a>
                        </li>
                        <li class="link-item follow-item">
                   
                            <a href="https://www.Twitter.com" target="_blank">         <img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="/Intern1/assets/images/brands/09.png" alt="profile">Twitter</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="copyright-info">
                Copyright @ 2024 - TOM INC - All right reserved
            </div>
        </div>