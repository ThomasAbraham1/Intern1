<?php
if (isset($_GET["Menu"])) {
  $Menu = $_GET["Menu"];
} else {
  $Menu = "";
}
?>
<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
  <div class="sidebar-header d-flex align-items-center justify-content-start">
    <a href="/intern1/student/home.php" class="navbar-brand">
      <!--Logo start-->
      <!--logo End-->

      <!--Logo start-->
      <div class="logo-main">
        <div class="logo-normal">
          <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
            <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
          </svg>
        </div>
        <div class="logo-mini">
          <svg class=" icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
            <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
            <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
            <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
          </svg>
        </div>
      </div>
      <!--logo End-->




      <h4 class="logo-title">Grace College</h4>
    </a>
    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
      <i class="icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </i>
    </div>
  </div>
  <div class="sidebar-body pt-0 data-scrollbar">
    <div class="sidebar-list">
      <!-- Sidebar Menu Start -->
      <?php if($active){ ?>
      <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
        <li class="nav-item static-item">
          <a class="nav-link static-item disabled" href="../Gallery" tabindex="-1">
            <span class="default-icon">Home</span>
            <span class="mini-icon">-</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../Gallery">
            <i class="icon">
              <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
              </svg>
            </i>
            <span class="item-name">Dashboard</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
            <i class="icon">

              <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                <path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
                <path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
                <path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
                <path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
              </svg>
            </i>
            <span class="item-name">Gallery</span>
            <i class="right-icon">
              <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </i>
          </a>
          <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
            <li class="nav-item">
              <a class="nav-link <?php echo $Menu == "ManageEvents" ? "active" : "" ?>" href="../Gallery/Images_Events.php?Menu=ManageEvents">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> </i>
                <span class="item-name"> Manage Events </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php echo $Menu == "ManageImages" ? "active" : "" ?>" href="../Gallery/Images_All.php?Menu=ManageImages">
                <i class="icon">
                  <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                    <g>
                      <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                    </g>
                  </svg>
                </i>
                <i class="sidenav-mini-icon"> </i>
                <span class="item-name"> Manage Images </span>
              </a>
            </li>
          </ul>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/Intern1/student/pages/roles.php">
            <i class="icon">
              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="currentColor"></path>
                <path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="currentColor"></path>
                <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>
              </svg>

            </i>
            <span class="item-name">Roles
              <!-- <span class="badge rounded-pill bg-success item-name">UI</span> -->
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/Intern1/student/pages/register.php">
            <i class="icon">
              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="currentColor"></path>
                <path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="currentColor"></path>
                <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>
              </svg>

            </i>
            <span class="item-name">Course Registration
              <!-- <span class="badge rounded-pill bg-success item-name">UI</span> -->
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/Intern1/student/pages/fees.php">
            <i class="icon">
              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="currentColor"></path>
                <path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="currentColor"></path>
                <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>
              </svg>

            </i>
            <span class="item-name">Fees
              <!-- <span class="badge rounded-pill bg-success item-name">UI</span> -->
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/Intern1/student/pages/attendance.php">
            <i class="icon">
              <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="currentColor"></path>
                <path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="currentColor"></path>
                <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>
              </svg>

            </i>
            <span class="item-name">Attendance Tracker
              <!-- <span class="badge rounded-pill bg-success item-name">UI</span> -->
            </span>
          </a>
        </li>
        <li>
          <hr class="hr-horizontal">
        </li>
        </ul>
      <?php } else{ ?>
        <ul>
        <li class="nav-item static-item">
          <a class="nav-link static-item disabled" href="../Gallery" tabindex="-1">
            <span class="default-icon">Register for features</span>
            <span class="mini-icon">-</span>
          </a>
        </li>
        </ul>
        <?php } ?>
      <!-- Sidebar Menu End -->
    </div>
  </div>
  <div class="sidebar-footer"></div>
</aside>

<main class="main-content">
  <div class="position-relative iq-banner">
    <!--Nav Start-->
    <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
      <div class="container-fluid navbar-inner">
        <a href="dashboard/index.html" class="navbar-brand">
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




          <h4 class="logo-title">Hope UI <?php echo "$user_id" ?></h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
          <i class="icon">
            <svg width="20px" class="icon-20" viewBox="0 0 24 24">
              <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
            </svg>
          </i>
        </div>
        <div class="input-group search-input">
          <span class="input-group-text" id="search-input">
            <svg class="icon-18" width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
              <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
          <input type="search" class="form-control" placeholder="">
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <span class="mt-2 navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
            <li class="me-0 me-xl-2">
              <a class="btn btn-primary btn-sm d-flex gap-2 align-items-center" aria-current="page" href="http://hopeui.iqonic.design/pro?utm_source=hopeui-free-demo&utm_medium=hopeui-free-demo&utm_campaign=hopeui-pro-launch" target="_blank">
                <svg class="icon-16" width="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M21.4274 2.5783C20.9274 2.0673 20.1874 1.8783 19.4974 2.0783L3.40742 6.7273C2.67942 6.9293 2.16342 7.5063 2.02442 8.2383C1.88242 8.9843 2.37842 9.9323 3.02642 10.3283L8.05742 13.4003C8.57342 13.7163 9.23942 13.6373 9.66642 13.2093L15.4274 7.4483C15.7174 7.1473 16.1974 7.1473 16.4874 7.4483C16.7774 7.7373 16.7774 8.2083 16.4874 8.5083L10.7164 14.2693C10.2884 14.6973 10.2084 15.3613 10.5234 15.8783L13.5974 20.9283C13.9574 21.5273 14.5774 21.8683 15.2574 21.8683C15.3374 21.8683 15.4274 21.8683 15.5074 21.8573C16.2874 21.7583 16.9074 21.2273 17.1374 20.4773L21.9074 4.5083C22.1174 3.8283 21.9274 3.0883 21.4274 2.5783Z" fill="currentColor"></path>
                  <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M3.01049 16.8079C2.81849 16.8079 2.62649 16.7349 2.48049 16.5879C2.18749 16.2949 2.18749 15.8209 2.48049 15.5279L3.84549 14.1619C4.13849 13.8699 4.61349 13.8699 4.90649 14.1619C5.19849 14.4549 5.19849 14.9299 4.90649 15.2229L3.54049 16.5879C3.39449 16.7349 3.20249 16.8079 3.01049 16.8079ZM6.77169 18.0003C6.57969 18.0003 6.38769 17.9273 6.24169 17.7803C5.94869 17.4873 5.94869 17.0133 6.24169 16.7203L7.60669 15.3543C7.89969 15.0623 8.37469 15.0623 8.66769 15.3543C8.95969 15.6473 8.95969 16.1223 8.66769 16.4153L7.30169 17.7803C7.15569 17.9273 6.96369 18.0003 6.77169 18.0003ZM7.02539 21.5683C7.17139 21.7153 7.36339 21.7883 7.55539 21.7883C7.74739 21.7883 7.93939 21.7153 8.08539 21.5683L9.45139 20.2033C9.74339 19.9103 9.74339 19.4353 9.45139 19.1423C9.15839 18.8503 8.68339 18.8503 8.39039 19.1423L7.02539 20.5083C6.73239 20.8013 6.73239 21.2753 7.02539 21.5683Z" fill="currentColor"></path>
                </svg>
                Go Pro
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="search-toggle nav-link" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="/intern1/assets/images/Flag/flag001.png" class="img-fluid rounded-circle" alt="user" style="height: 30px; min-width: 30px; width: 30px;">
                <span class="bg-primary"></span>
              </a>
              <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                <div class="m-0 border-0 shadow-none card">
                  <div class="p-0 ">
                    <ul class="p-0 list-group list-group-flush">
                      <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img src="/intern1/assets/images/Flag/flag-03.png" alt="img-flaf" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;" />Spanish</a>
                      </li>
                      <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img src="/intern1/assets/images/Flag/flag-04.png" alt="img-flaf" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;" />Italian</a>
                      </li>
                      <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img src="/intern1/assets/images/Flag/flag-02.png" alt="img-flaf" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;" />French</a>
                      </li>
                      <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img src="/intern1/assets/images/Flag/flag-05.png" alt="img-flaf" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;" />German</a>
                      </li>
                      <li class="iq-sub-card list-group-item"><a class="p-0" href="#"><img src="/intern1/assets/images/Flag/flag-06.png" alt="img-flaf" class="img-fluid me-2" style="width: 15px;height: 15px;min-width: 15px;" />Japanese</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" id="notification-drop" data-bs-toggle="dropdown">
                <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z" fill="currentColor"></path>
                  <path opacity="0.4" d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z" fill="currentColor"></path>
                </svg>
                <span class="bg-danger dots"></span>
              </a>
              <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="notification-drop">
                <div class="m-0 shadow-none card">
                  <div class="py-3 card-header d-flex justify-content-between bg-primary">
                    <div class="header-title">
                      <h5 class="mb-0 text-white">All Notifications</h5>
                    </div>
                  </div>
                  <div class="p-0 card-body">
                    <a href="#" class="iq-sub-card">
                      <div class="d-flex align-items-center">
                        <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="/intern1/assets/images/shapes/01.png" alt="">
                        <div class="ms-3 w-100">
                          <h6 class="mb-0 ">Emma Watson Bni</h6>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">95 MB</p>
                            <small class="float-end font-size-12">Just Now</small>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="iq-sub-card">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="/intern1/assets/images/shapes/02.png" alt="">
                        </div>
                        <div class="ms-3 w-100">
                          <h6 class="mb-0 ">New customer is join</h6>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Cyst Bni</p>
                            <small class="float-end font-size-12">5 days ago</small>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="iq-sub-card">
                      <div class="d-flex align-items-center">
                        <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="/intern1/assets/images/shapes/03.png" alt="">
                        <div class="ms-3 w-100">
                          <h6 class="mb-0 ">Two customer is left</h6>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Cyst Bni</p>
                            <small class="float-end font-size-12">2 days ago</small>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="iq-sub-card">
                      <div class="d-flex align-items-center">
                        <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="/intern1/assets/images/shapes/04.png" alt="">
                        <div class="w-100 ms-3">
                          <h6 class="mb-0 ">New Mail from Fenny</h6>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Cyst Bni</p>
                            <small class="float-end font-size-12">3 days ago</small>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" id="mail-drop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.4" d="M22 15.94C22 18.73 19.76 20.99 16.97 21H16.96H7.05C4.27 21 2 18.75 2 15.96V15.95C2 15.95 2.006 11.524 2.014 9.298C2.015 8.88 2.495 8.646 2.822 8.906C5.198 10.791 9.447 14.228 9.5 14.273C10.21 14.842 11.11 15.163 12.03 15.163C12.95 15.163 13.85 14.842 14.56 14.262C14.613 14.227 18.767 10.893 21.179 8.977C21.507 8.716 21.989 8.95 21.99 9.367C22 11.576 22 15.94 22 15.94Z" fill="currentColor"></path>
                  <path d="M21.4759 5.67351C20.6099 4.04151 18.9059 2.99951 17.0299 2.99951H7.04988C5.17388 2.99951 3.46988 4.04151 2.60388 5.67351C2.40988 6.03851 2.50188 6.49351 2.82488 6.75151L10.2499 12.6905C10.7699 13.1105 11.3999 13.3195 12.0299 13.3195C12.0339 13.3195 12.0369 13.3195 12.0399 13.3195C12.0429 13.3195 12.0469 13.3195 12.0499 13.3195C12.6799 13.3195 13.3099 13.1105 13.8299 12.6905L21.2549 6.75151C21.5779 6.49351 21.6699 6.03851 21.4759 5.67351Z" fill="currentColor"></path>
                </svg>
                <span class="bg-primary count-mail"></span>
              </a>
              <div class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="mail-drop">
                <div class="m-0 shadow-none card">
                  <div class="py-3 card-header d-flex justify-content-between bg-primary">
                    <div class="header-title">
                      <h5 class="mb-0 text-white">All Message</h5>
                    </div>
                  </div>
                  <div class="p-0 card-body ">
                    <a href="#" class="iq-sub-card">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="/intern1/assets/images/shapes/01.png" alt="">
                        </div>
                        <div class="ms-3">
                          <h6 class="mb-0 ">Bni Emma Watson</h6>
                          <small class="float-start font-size-12">13 Jun</small>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="iq-sub-card">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="/intern1/assets/images/shapes/02.png" alt="">
                        </div>
                        <div class="ms-3">
                          <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                          <small class="float-start font-size-12">20 Apr</small>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="iq-sub-card">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="/intern1/assets/images/shapes/03.png" alt="">
                        </div>
                        <div class="ms-3">
                          <h6 class="mb-0 ">Why do we use it?</h6>
                          <small class="float-start font-size-12">30 Jun</small>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="iq-sub-card">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="/intern1/assets/images/shapes/04.png" alt="">
                        </div>
                        <div class="ms-3">
                          <h6 class="mb-0 ">Variations Passages</h6>
                          <small class="float-start font-size-12">12 Sep</small>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="iq-sub-card">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="/intern1/assets/images/shapes/05.png" alt="">
                        </div>
                        <div class="ms-3">
                          <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                          <small class="float-start font-size-12">5 Dec</small>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/intern1/assets/images/avatars/01.png" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                <img src="/intern1/assets/images/avatars/avtar_1.png" alt="User-Profile" class="theme-color-purple-img img-fluid avatar avatar-50 avatar-rounded">
                <img src="/intern1/assets/images/avatars/avtar_2.png" alt="User-Profile" class="theme-color-blue-img img-fluid avatar avatar-50 avatar-rounded">
                <img src="/intern1/assets/images/avatars/avtar_4.png" alt="User-Profile" class="theme-color-green-img img-fluid avatar avatar-50 avatar-rounded">
                <img src="/intern1/assets/images/avatars/avtar_5.png" alt="User-Profile" class="theme-color-yellow-img img-fluid avatar avatar-50 avatar-rounded">
                <img src="/intern1/assets/images/avatars/avtar_3.png" alt="User-Profile" class="theme-color-pink-img img-fluid avatar avatar-50 avatar-rounded">
                <div class="caption ms-3 d-none d-md-block ">

                  <h6 class="mb-0 caption-title"><?php echo ucfirst($f_fname . " " . $f_lname) ?></h6>
                  <p class="mb-0 caption-sub-title"><?php echo ucfirst($f_role) ?></p>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/Intern1/student/pages/profile.php">Profile</a>
                </li>
                <li><a class="dropdown-item" href="/dashboard/app/user-privacy-setting.html">Privacy Setting</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/intern1/includes/logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav> <!-- Nav Header Component Start -->
    <!-- <div class="iq-navbar-header" style="height: 215px;">
          <div class="container-fluid iq-container">
            <div class="row">
              <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                  <div>
                    <h1>Welcome to Tom CMS!</h1>
                    <p>This a college management system for simplifying the process.</p>
                  </div>
                  <div>
                    <a href="" class="btn btn-link btn-soft-light">
                      <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                        <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                      </svg>
                      Announcements
                    </a>
                  </div>
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
        </div> Nav Header Component End -->
    <!--Nav End-->
  </div>
  <!-- <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="row row-cols-1">
              <div class="overflow-hidden d-slider1 ">
                <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                    <div class="card-body">
                      <div class="progress-widget">
                        <div id="circle-progress-01" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                          <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                          </svg>
                        </div>
                        <div class="progress-detail">
                          <p class="mb-2">Total Sales</p>
                          <h4 class="counter">$560K</h4>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                    <div class="card-body">
                      <div class="progress-widget">
                        <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                          <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                          </svg>
                        </div>
                        <div class="progress-detail">
                          <p class="mb-2">Total Profit</p>
                          <h4 class="counter">$185K</h4>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                    <div class="card-body">
                      <div class="progress-widget">
                        <div id="circle-progress-03" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                          <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                          </svg>
                        </div>
                        <div class="progress-detail">
                          <p class="mb-2">Total Cost</p>
                          <h4 class="counter">$375K</h4>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                    <div class="card-body">
                      <div class="progress-widget">
                        <div id="circle-progress-04" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="60" data-type="percent">
                          <svg class="card-slie-arrow icon-24" width="24px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                          </svg>
                        </div>
                        <div class="progress-detail">
                          <p class="mb-2">Revenue</p>
                          <h4 class="counter">$742K</h4>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                    <div class="card-body">
                      <div class="progress-widget">
                        <div id="circle-progress-05" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="50" data-type="percent">
                          <svg class="card-slie-arrow icon-24" width="24px" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                          </svg>
                        </div>
                        <div class="progress-detail">
                          <p class="mb-2">Net Income</p>
                          <h4 class="counter">$150K</h4>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                    <div class="card-body">
                      <div class="progress-widget">
                        <div id="circle-progress-06" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="40" data-type="percent">
                          <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                          </svg>
                        </div>
                        <div class="progress-detail">
                          <p class="mb-2">Today</p>
                          <h4 class="counter">$4600</h4>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1300">
                    <div class="card-body">
                      <div class="progress-widget">
                        <div id="circle-progress-07" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="30" data-type="percent">
                          <svg class="card-slie-arrow icon-24 " width="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                          </svg>
                        </div>
                        <div class="progress-detail">
                          <p class="mb-2">Members</p>
                          <h4 class="counter">11.2M</h4>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="swiper-button swiper-button-next"></div>
                <div class="swiper-button swiper-button-prev"></div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-8">
            <div class="row">
              <div class="col-md-12">
                <div class="card" data-aos="fade-up" data-aos-delay="800">
                  <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                      <h4 class="card-title">$855.8K</h4>
                      <p class="mb-0">Gross Sales</p>
                    </div>
                    <div class="d-flex align-items-center align-self-center">
                      <div class="d-flex align-items-center text-primary">
                        <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                          <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                          </g>
                        </svg>
                        <div class="ms-2">
                          <span class="text-gray">Sales</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center ms-3 text-info">
                        <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                          <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                          </g>
                        </svg>
                        <div class="ms-2">
                          <span class="text-gray">Cost</span>
                        </div>
                      </div>
                    </div>
                    <div class="dropdown">
                      <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton22" data-bs-toggle="dropdown" aria-expanded="false">
                        This Week
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton22">
                        <li><a class="dropdown-item" href="#">This Week</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="d-main" class="d-main"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-6">
                <div class="card" data-aos="fade-up" data-aos-delay="900">
                  <div class="flex-wrap card-header d-flex justify-content-between">
                    <div class="header-title">
                      <h4 class="card-title">Earnings</h4>
                    </div>
                    <div class="dropdown">
                      <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        This Week
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">This Week</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="flex-wrap d-flex align-items-center justify-content-between">
                      <div id="myChart" class="col-md-8 col-lg-8 myChart"></div>
                      <div class="d-grid gap col-md-4 col-lg-4">
                        <div class="d-flex align-items-start">
                          <svg class="mt-2 icon-14" xmlns="http://www.w3.org/2000/svg" width="14" viewBox="0 0 24 24" fill="#3a57e8">
                            <g>
                              <circle cx="12" cy="12" r="8" fill="#3a57e8"></circle>
                            </g>
                          </svg>
                          <div class="ms-3">
                            <span class="text-gray">Fashion</span>
                            <h6>251K</h6>
                          </div>
                        </div>
                        <div class="d-flex align-items-start">
                          <svg class="mt-2 icon-14" xmlns="http://www.w3.org/2000/svg" width="14" viewBox="0 0 24 24" fill="#4bc7d2">
                            <g>
                              <circle cx="12" cy="12" r="8" fill="#4bc7d2"></circle>
                            </g>
                          </svg>
                          <div class="ms-3">
                            <span class="text-gray">Accessories</span>
                            <h6>176K</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-6">
                <div class="card" data-aos="fade-up" data-aos-delay="1000">
                  <div class="flex-wrap card-header d-flex justify-content-between">
                    <div class="header-title">
                      <h4 class="card-title">Conversions</h4>
                    </div>
                    <div class="dropdown">
                      <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                        This Week
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                        <li><a class="dropdown-item" href="#">This Week</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="d-activity" class="d-activity"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
                  <div class="flex-wrap card-header d-flex justify-content-between">
                    <div class="header-title">
                      <h4 class="mb-2 card-title">Enterprise Clients</h4>
                      <p class="mb-0">
                        <svg class="me-2 text-primary icon-24" width="24" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                        </svg>
                        15 new acquired this month
                      </p>
                    </div>
                  </div>
                  <div class="p-0 card-body">
                    <div class="mt-4 table-responsive">
                      <table id="basic-table" class="table mb-0 table-striped" role="grid">
                        <thead>
                          <tr>
                            <th>COMPANIES</th>
                            <th>CONTACTS</th>
                            <th>ORDER</th>
                            <th>COMPLETION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img class="rounded bg-soft-primary img-fluid avatar-40 me-3" src="/intern1/assets/images/shapes/01.png" alt="profile">
                                <h6>Addidis Sportwear</h6>
                              </div>
                            </td>
                            <td>
                              <div class="iq-media-group iq-media-group-1">
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                </a>
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                </a>
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                </a>
                              </div>
                            </td>
                            <td>$14,000</td>
                            <td>
                              <div class="mb-2 d-flex align-items-center">
                                <h6>60%</h6>
                              </div>
                              <div class="shadow-none progress bg-soft-primary w-100" style="height: 4px">
                                <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img class="rounded bg-soft-primary img-fluid avatar-40 me-3" src="/intern1/assets/images/shapes/05.png" alt="profile">
                                <h6>Netflixer Platforms</h6>
                              </div>
                            </td>
                            <td>
                              <div class="iq-media-group iq-media-group-1">
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                </a>
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                </a>
                              </div>
                            </td>
                            <td>$30,000</td>
                            <td>
                              <div class="mb-2 d-flex align-items-center">
                                <h6>25%</h6>
                              </div>
                              <div class="shadow-none progress bg-soft-primary w-100" style="height: 4px">
                                <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img class="rounded bg-soft-primary img-fluid avatar-40 me-3" src="/intern1/assets/images/shapes/02.png" alt="profile">
                                <h6>Shopifi Stores</h6>
                              </div>
                            </td>
                            <td>
                              <div class="iq-media-group iq-media-group-1">
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                </a>
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">TP</div>
                                </a>
                              </div>
                            </td>
                            <td>$8,500</td>
                            <td>
                              <div class="mb-2 d-flex align-items-center">
                                <h6>100%</h6>
                              </div>
                              <div class="shadow-none progress bg-soft-success w-100" style="height: 4px">
                                <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img class="rounded bg-soft-primary img-fluid avatar-40 me-3" src="/intern1/assets/images/shapes/03.png" alt="profile">
                                <h6>Bootstrap Technologies</h6>
                              </div>
                            </td>
                            <td>
                              <div class="iq-media-group iq-media-group-1">
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                </a>
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                </a>
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                </a>
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">TP</div>
                                </a>
                              </div>
                            </td>
                            <td>$20,500</td>
                            <td>
                              <div class="mb-2 d-flex align-items-center">
                                <h6>100%</h6>
                              </div>
                              <div class="shadow-none progress bg-soft-success w-100" style="height: 4px">
                                <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <img class="rounded bg-soft-primary img-fluid avatar-40 me-3" src="/intern1/assets/images/shapes/04.png" alt="profile">
                                <h6>Community First</h6>
                              </div>
                            </td>
                            <td>
                              <div class="iq-media-group iq-media-group-1">
                                <a href="#" class="iq-media-1">
                                  <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                </a>
                              </div>
                            </td>
                            <td>$9,800</td>
                            <td>
                              <div class="mb-2 d-flex align-items-center">
                                <h6>75%</h6>
                              </div>
                              <div class="shadow-none progress bg-soft-primary w-100" style="height: 4px">
                                <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <div class="row">
              <div class="col-md-12 col-lg-12">
                <div class="card credit-card-widget" data-aos="fade-up" data-aos-delay="900">
                  <div class="pb-4 border-0 card-header">
                    <div class="p-4 border border-white rounded primary-gradient-card">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h5 class="font-weight-bold">VISA </h5>
                          <P class="mb-0">PREMIUM ACCOUNT</P>
                        </div>
                        <div class="master-card-content">
                          <svg class="master-card-1 icon-60" width="60" viewBox="0 0 24 24">
                            <path fill="#ffffff" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                          </svg>
                          <svg class="master-card-2 icon-60" width="60" viewBox="0 0 24 24">
                            <path fill="#ffffff" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                          </svg>
                        </div>
                      </div>
                      <div class="my-4">
                        <div class="card-number">
                          <span class="fs-5 me-2">5789</span>
                          <span class="fs-5 me-2">****</span>
                          <span class="fs-5 me-2">****</span>
                          <span class="fs-5">2847</span>
                        </div>
                      </div>
                      <div class="mb-2 d-flex align-items-center justify-content-between">
                        <p class="mb-0">Card holder</p>
                        <p class="mb-0">Expire Date</p>
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <h6>Mike Smith</h6>
                        <h6 class="ms-5">06/11</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="flex-wrap mb-4 d-flex align-itmes-center justify-content-between">
                      <div class="d-flex align-itmes-center me-0 me-md-4">
                        <div>
                          <div class="p-3 mb-2 rounded bg-soft-primary">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9303 7C16.9621 6.92913 16.977 6.85189 16.9739 6.77432H17C16.8882 4.10591 14.6849 2 12.0049 2C9.325 2 7.12172 4.10591 7.00989 6.77432C6.9967 6.84898 6.9967 6.92535 7.00989 7H6.93171C5.65022 7 4.28034 7.84597 3.88264 10.1201L3.1049 16.3147C2.46858 20.8629 4.81062 22 7.86853 22H16.1585C19.2075 22 21.4789 20.3535 20.9133 16.3147L20.1444 10.1201C19.676 7.90964 18.3503 7 17.0865 7H16.9303ZM15.4932 7C15.4654 6.92794 15.4506 6.85153 15.4497 6.77432C15.4497 4.85682 13.8899 3.30238 11.9657 3.30238C10.0416 3.30238 8.48184 4.85682 8.48184 6.77432C8.49502 6.84898 8.49502 6.92535 8.48184 7H15.4932ZM9.097 12.1486C8.60889 12.1486 8.21321 11.7413 8.21321 11.2389C8.21321 10.7366 8.60889 10.3293 9.097 10.3293C9.5851 10.3293 9.98079 10.7366 9.98079 11.2389C9.98079 11.7413 9.5851 12.1486 9.097 12.1486ZM14.002 11.2389C14.002 11.7413 14.3977 12.1486 14.8858 12.1486C15.3739 12.1486 15.7696 11.7413 15.7696 11.2389C15.7696 10.7366 15.3739 10.3293 14.8858 10.3293C14.3977 10.3293 14.002 10.7366 14.002 11.2389Z" fill="currentColor"></path>
                            </svg>
                          </div>
                        </div>
                        <div class="ms-3">
                          <h5>1153</h5>
                          <small class="mb-0">Products</small>
                        </div>
                      </div>
                      <div class="d-flex align-itmes-center">
                        <div>
                          <div class="p-3 mb-2 rounded bg-soft-info">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1213 11.2331H16.8891C17.3088 11.2331 17.6386 10.8861 17.6386 10.4677C17.6386 10.0391 17.3088 9.70236 16.8891 9.70236H14.1213C13.7016 9.70236 13.3719 10.0391 13.3719 10.4677C13.3719 10.8861 13.7016 11.2331 14.1213 11.2331ZM20.1766 5.92749C20.7861 5.92749 21.1858 6.1418 21.5855 6.61123C21.9852 7.08067 22.0551 7.7542 21.9652 8.36549L21.0159 15.06C20.8361 16.3469 19.7569 17.2949 18.4879 17.2949H7.58639C6.25742 17.2949 5.15828 16.255 5.04837 14.908L4.12908 3.7834L2.62026 3.51807C2.22057 3.44664 1.94079 3.04864 2.01073 2.64043C2.08068 2.22305 2.47038 1.94649 2.88006 2.00874L5.2632 2.3751C5.60293 2.43735 5.85274 2.72207 5.88272 3.06905L6.07257 5.35499C6.10254 5.68257 6.36234 5.92749 6.68209 5.92749H20.1766ZM7.42631 18.9079C6.58697 18.9079 5.9075 19.6018 5.9075 20.459C5.9075 21.3061 6.58697 22 7.42631 22C8.25567 22 8.93514 21.3061 8.93514 20.459C8.93514 19.6018 8.25567 18.9079 7.42631 18.9079ZM18.6676 18.9079C17.8282 18.9079 17.1487 19.6018 17.1487 20.459C17.1487 21.3061 17.8282 22 18.6676 22C19.4969 22 20.1764 21.3061 20.1764 20.459C20.1764 19.6018 19.4969 18.9079 18.6676 18.9079Z" fill="currentColor"></path>
                            </svg>
                          </div>
                        </div>
                        <div class="ms-3">
                          <h5>81K</h5>
                          <small class="mb-0">Order Served</small>
                        </div>
                      </div>
                    </div>
                    <div class="mb-4">
                      <div class="flex-wrap d-flex justify-content-between">
                        <h2 class="mb-2">$405,012,300</h2>
                        <div>
                          <span class="badge bg-success rounded-pill">YoY 24%</span>
                        </div>
                      </div>
                      <p class="text-info">Life time sales</p>
                    </div>
                    <div class="grid-cols-2 d-grid gap-card">
                      <button class="p-2 btn btn-primary text-uppercase">SUMMARY</button>
                      <button class="p-2 btn btn-info text-uppercase">ANALYTICS</button>
                    </div>
                  </div>
                </div>
                <div class="card" data-aos="fade-up" data-aos-delay="500">
                  <div class="text-center card-body d-flex justify-content-around">
                    <div>
                      <h2 class="mb-2">750<small>K</small></h2>
                      <p class="mb-0 text-gray">Website Visitors</p>
                    </div>
                    <hr class="hr-vertial">
                    <div>
                      <h2 class="mb-2">7,500</h2>
                      <p class="mb-0 text-gray">New Customers</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="card" data-aos="fade-up" data-aos-delay="600">
                  <div class="flex-wrap card-header d-flex justify-content-between">
                    <div class="header-title">
                      <h4 class="mb-2 card-title">Activity overview</h4>
                      <p class="mb-0">
                        <svg class="me-2 icon-24" width="24" height="24" viewBox="0 0 24 24">
                          <path fill="#17904b" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />
                        </svg>
                        16% this month
                      </p>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="mb-2  d-flex profile-media align-items-top">
                      <div class="mt-1 profile-dots-pills border-primary"></div>
                      <div class="ms-4">
                        <h6 class="mb-1 ">$2400, Purchase</h6>
                        <span class="mb-0">11 JUL 8:10 PM</span>
                      </div>
                    </div>
                    <div class="mb-2  d-flex profile-media align-items-top">
                      <div class="mt-1 profile-dots-pills border-primary"></div>
                      <div class="ms-4">
                        <h6 class="mb-1 ">New order #8744152</h6>
                        <span class="mb-0">11 JUL 11 PM</span>
                      </div>
                    </div>
                    <div class="mb-2  d-flex profile-media align-items-top">
                      <div class="mt-1 profile-dots-pills border-primary"></div>
                      <div class="ms-4">
                        <h6 class="mb-1 ">Affiliate Payout</h6>
                        <span class="mb-0">11 JUL 7:64 PM</span>
                      </div>
                    </div>
                    <div class="mb-2  d-flex profile-media align-items-top">
                      <div class="mt-1 profile-dots-pills border-primary"></div>
                      <div class="ms-4">
                        <h6 class="mb-1 ">New user added</h6>
                        <span class="mb-0">11 JUL 1:21 AM</span>
                      </div>
                    </div>
                    <div class="mb-1  d-flex profile-media align-items-top">
                      <div class="mt-1 profile-dots-pills border-primary"></div>
                      <div class="ms-4">
                        <h6 class="mb-1 ">Product added</h6>
                        <span class="mb-0">11 JUL 4:50 AM</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->