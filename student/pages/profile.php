<?php
include( $_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Header.php');
include('../includes/Menu.php');

// Query to get all records from erp_login ( user infomrmation )
$query = "SELECT * FROM `erp_login`";
$result = mysqli_query($conn, $query);
if ($result) {
    $roleRecords = array();
    while ($row = $result->fetch_assoc()) {
        $roleRecords[] = $row;
    }
}

?>

<div class="iq-navbar-header" style="height: 215px;">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center">
                    <div>
                        <h1>User Profile</h1>
                        <p>Use the edit button to start updating your user profile.</p>
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
        <img src="../../assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
        <img src="../../assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
        <img src="../../assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
        <img src="../../assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
        <img src="../../assets/images/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
        <img src="../../assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
    </div>
</div> <!-- Nav Header Component End -->
<!--Nav End-->
</div>
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Profile</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <div class="profile-img-edit position-relative">
                                    <img src="../../assets/images/avatars/01.png" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100">
                                    <img src="../../assets/images/avatars/avtar_1.png" alt="profile-pic" class="theme-color-purple-img profile-pic rounded avatar-100">
                                    <img src="../../assets/images/avatars/avtar_2.png" alt="profile-pic" class="theme-color-blue-img profile-pic rounded avatar-100">
                                    <img src="../../assets/images/avatars/avtar_4.png" alt="profile-pic" class="theme-color-green-img profile-pic rounded avatar-100">
                                    <img src="../../assets/images/avatars/avtar_5.png" alt="profile-pic" class="theme-color-yellow-img profile-pic rounded avatar-100">
                                    <img src="../../assets/images/avatars/avtar_3.png" alt="profile-pic" class="theme-color-pink-img profile-pic rounded avatar-100">
                                    <div class="upload-icone bg-primary">
                                        <svg class="upload-button icon-14" width="14" viewBox="0 0 24 24">
                                            <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                        </svg>
                                        <input class="file-upload" type="file" accept="image/*">
                                    </div>
                                </div>
                                <div class="img-extension mt-3">
                                    <div class="d-inline-block align-items-center">
                                        <span>Only</span>
                                        <a href="javascript:void();">.jpg</a>
                                        <a href="javascript:void();">.png</a>
                                        <a href="javascript:void();">.jpeg</a>
                                        <span>allowed</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">User Role:</label>
                                <select name="type" class="selectpicker form-control" data-style="py-0">
                                    <option>Select</option>
                                    <option>Web Designer</option>
                                    <option>Web Developer</option>
                                    <option>Tester</option>
                                    <option>Php Developer</option>
                                    <option>Ios Developer </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="furl">Facebook Url:</label>
                                <input type="text" class="form-control" id="furl" placeholder="Facebook Url">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="turl">Twitter Url:</label>
                                <input type="text" class="form-control" id="turl" placeholder="Twitter Url">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="instaurl">Instagram Url:</label>
                                <input type="text" class="form-control" id="instaurl" placeholder="Instagram Url">
                            </div>
                            <div class="form-group mb-0">
                                <label class="form-label" for="lurl">Linkedin Url:</label>
                                <input type="text" class="form-control" id="lurl" placeholder="Linkedin Url">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">User Information</h4>
                        </div>
                        <a id="editBtn" href="#" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop-1">
                            <i class="btn-inner">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                            </i>
                            <span>Edit</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <form id="profileForm">
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
                                        <label class="form-label" for="mobno">Mobile Number:</label>
                                        <input type="text" value="<?php echo $mobileNumber ?>" class="form-control" id="mobno" placeholder="Mobile Number">
                                    </div>
                                    <!-- <div class="form-group col-md-6">
                                        <label class="form-label" for="altconno">Alternate Contact:</label>
                                        <input type="text" class="form-control" id="altconno" placeholder="Alternate Contact">
                                    </div> -->
                                </div>
                                <button type="submit" userId ='<?php echo $user_id ?>' id="profileUpdateBtn" class="btn btn-primary">Save</button>
                            </form>
                            <div id="Result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="btn-download">
    <a class="btn btn-success px-3 py-2" href="https://iqonic.design/product/admin-templates/hope-ui-admin-free-open-source-bootstrap-admin-template/" target="_blank">
        <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" d="M17.554 7.29614C20.005 7.29614 22 9.35594 22 11.8876V16.9199C22 19.4453 20.01 21.5 17.564 21.5L6.448 21.5C3.996 21.5 2 19.4412 2 16.9096V11.8773C2 9.35181 3.991 7.29614 6.438 7.29614H7.378L17.554 7.29614Z" fill="currentColor"></path>
            <path d="M12.5464 16.0374L15.4554 13.0695C15.7554 12.7627 15.7554 12.2691 15.4534 11.9634C15.1514 11.6587 14.6644 11.6597 14.3644 11.9654L12.7714 13.5905L12.7714 3.2821C12.7714 2.85042 12.4264 2.5 12.0004 2.5C11.5754 2.5 11.2314 2.85042 11.2314 3.2821L11.2314 13.5905L9.63742 11.9654C9.33742 11.6597 8.85043 11.6587 8.54843 11.9634C8.39743 12.1168 8.32142 12.3168 8.32142 12.518C8.32142 12.717 8.39743 12.9171 8.54643 13.0695L11.4554 16.0374C11.6004 16.1847 11.7964 16.268 12.0004 16.268C12.2054 16.268 12.4014 16.1847 12.5464 16.0374Z" fill="currentColor"></path>
        </svg>
    </a>
</div>
<script>
    $(document).ready(function() {
        $("#profileForm :input").prop("disabled", true);
        var disabled = true;
        $('#editBtn').click(function(e) {
            // console.log('Inside listener');
            if (disabled) {
                // console.log('Inside if');
                $("#profileForm :input").prop("disabled", false);
                disabled = false;
                return
            }
            $("#profileForm :input").prop("disabled", true);
            disabled = true;

        });

        $('#profileUpdateBtn').click(function(e){
            e.preventDefault();
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var email = $('#email').val();
            var mobno = $('#mobno').val();
            var userId = $('#profileUpdateBtn').attr('userId');
            console.log(userId);
            $.ajax({
                url: '../functions.php',
                type: 'POST',
                data: {
                    fname: fname,
                    lname: lname,
                    email: email,
                    mobno: mobno,
                    userId: userId,
                    Function: 'updateProfile',
                },
                success: function(response){
                    if( response == 'OK'){
                        $("#Result").html(`<div class="alert alert-success fade show" role="alert"> Successfully Updated! </div>`);
                    } else{
                        $("#Result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                    }
                    setTimeout(function(){
                        $("#Result").html('');
                        window.location.reload();
                    }, 1000);
                }

            })
        });

    })
</script>


<?php
include($_SERVER['DOCUMENT_ROOT'] .'/Intern1/Includes/Footer.php');
?>