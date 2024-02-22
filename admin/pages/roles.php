<?php
include( $_SERVER['DOCUMENT_ROOT'] . '/Intern1/Includes/Header.php');
include('../includes/Menu.php');


// Query to get all available roles
$query = "SELECT DISTINCT roleId,roleName,access FROM `erp_role`";
$result = mysqli_query($conn, $query);
if ($result) {
    $roleRecords = array();
    while ($row = $result->fetch_assoc()) {
        $roleRecords[] = $row;
    }
}

// Query to get all available roles
$query = "SELECT DISTINCT permissionId,permissionName FROM `erp_permission`";
$result = mysqli_query($conn, $query);
if ($result) {
    $permissionRecords = array();
    while ($row = $result->fetch_assoc()) {
        $permissionRecords[] = $row;
    }
}
// Query to get checked permissions for roles



?>
<div class="iq-navbar-header" style="height: 215px;">
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
</div>
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between flex-wrap">
                    <div class="header-title">
                        <h4 class="card-title mb-0">Role & Permission <?php $hello = ['h', 'i'];
                                                                        echo (implode(',', $hello)); ?></h4>
                    </div>
                    <div class="">
                        <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="btn-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </i>
                            <span>New Permission</span>
                        </a>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add new permission</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Permission Name</label>
                                            <input type="text" class="form-control" id="newPermissionName" aria-describedby="text" value="" placeholder="Permission Title" required>
                                        </div>
                                        <div class="text-start">
                                            <button id="newPermissionSaveBtn" type="submit" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                    <div id="result"></div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop-1">
                            <i class="btn-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </i>
                            <span>New Role</span>
                        </a>
                        <div class="modal fade" id="staticBackdrop-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add new role</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="text" class="form-label">Role Name</label>
                                            <input type="text" class="form-control" id="newRoleName" aria-describedby="text" placeholder="Role Title">
                                        </div>
                                        <!-- <div>
                                            <span>status</span>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    no
                                                </label>
                                            </div>
                                        </div> -->
                                        <div class="text-start mt-2">
                                            <button type="button" class="btn btn-primary" id="newRoleSaveBtn">Save</button>
                                            <button type="button" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                                        </div>
                                    </div>
                                    <div id="result2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <?php foreach ($roleRecords as $roleRecord) {  ?>
                                        <!-- Roles Header -->
                                        <th class="text-center"><label><?php echo $roleRecord['roleName'] ?></label>
                                            <div style="float:right;">
                                                <a class="btn btn-sm btn-icon text-primary flex-end roleEditBtn" roleId="<?php echo $roleRecord['roleId']  ?>" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit Role" href="#">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon text-danger roleDeleteBtn" roleId="<?php echo $roleRecord['roleId']  ?>" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete User" href="#">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                            <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                            <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </th>
                                    <?php } ?>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr class="">
                                    <td class="">Role
                                        <div style="float:right;">
                                            <a class="btn btn-sm btn-icon text-primary flex-end" data-bs-toggle="tooltip" title="Edit User" href="#">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="btn btn-sm btn-icon text-danger " data-bs-toggle="tooltip" title="Delete User" href="#">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                </tr> -->

                                <!-- Permission Vertical column -->

                                <?php foreach ($permissionRecords as $permissionRecord) {  ?>
                                    <tr class="">
                                        <td class="permissionNameRecord"><label><?php echo $permissionRecord['permissionName'] ?></label>
                                            <div style="float:right;">
                                                <a class="btn btn-sm btn-icon text-primary flex-end editPermissionBtn" permissionId="<?php echo $permissionRecord['permissionId'] ?>" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit Permission" href="#">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <a class="btn btn-sm btn-icon text-danger permissionDeleteBtn" permissionId="<?php echo $permissionRecord['permissionId'] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete User" href="#">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                            <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                            <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                        <?php
                                        foreach ($roleRecords as $roleRecord) {
                                            // Exploding access values into array
                                            $accessArray = explode(',', $roleRecord['access']);
                                        ?>
                                            <td class="text-center">
                                                <input class="form-check-input AssignPermissionBtn" roleId="<?php echo $roleRecord["roleId"] ?>" permissionId="<?php echo $permissionRecord["permissionId"] ?>" type="checkbox" data-bs-toggle='modal' data-bs-target='#exampleModal2' <?php echo array_search($permissionRecord['permissionName'], $accessArray) == '' ? '' : 'checked'; ?>>
                                            </td>
                                        <?php } ?>
                                        <!-- <td class="text-center">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </td> -->
                                    </tr>
                                <?php }  ?>
                                <!-- <tr class="">
                                    <td class="">Role List
                                        <div style="float:right;">
                                            <a class="btn btn-sm btn-icon text-primary flex-end" data-bs-toggle="tooltip" title="Edit User" href="#">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="btn btn-sm btn-icon text-danger " data-bs-toggle="tooltip" title="Delete User" href="#">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class="">Permission
                                        <div style="float:right;">
                                            <a class="btn btn-sm btn-icon text-primary flex-end" data-bs-toggle="tooltip" title="Edit User" href="#">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="btn btn-sm btn-icon text-danger " data-bs-toggle="tooltip" title="Delete User" href="#">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class="">Permission Add
                                        <div style="float:right;">
                                            <a class="btn btn-sm btn-icon text-primary flex-end" data-bs-toggle="tooltip" title="Edit User" href="#">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="btn btn-sm btn-icon text-danger " data-bs-toggle="tooltip" title="Delete User" href="#">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class="">Permission List
                                        <div style="float:right;">
                                            <a class="btn btn-sm btn-icon text-primary flex-end" data-bs-toggle="tooltip" title="Edit User" href="#">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a class="btn btn-sm btn-icon text-danger " data-bs-toggle="tooltip" title="Delete User" href="#">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox">
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <div class="text-center">
                            <a href="./admin.html" type="button" class="btn btn-primary">Save</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modals for delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Caution!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" id="deleteModalSaveBtn">Yes</button>
            </div>
            <div id="result3"></div>
        </div>
    </div>
</div>

<!-- Modals for edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Role / Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editedRolesModalName" class="form-label">Role / Permission Name</label>
                        <input type="text" class="form-control" name="editedRolesModalName" id="editedRolesModalName" aria-describedby="text" value="" placeholder="Permission Title" required>
                    </div>
                    <div class="text-start">
                        <button id="rolesModalSaveBtn" type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
                <div id="editResult"></div>
            </div>
        </div>
    </div>
</div>

<!-- Alert 1-->
<div id='generalAlert' style="position: fixed;bottom: 6%;right: 0px;" class="alert alert-left alert-success alert-dismissible fade hide mb-3" role="alert">
    <span> This is a success alert—check it out!</span>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<!-- Alert 2 -->
<div id='generalAlert2' style="position: fixed;bottom: 6%;right: 0px;" class="alert alert-left alert-danger alert-dismissible fade hide mb-3" role="alert">
    <span> This is a Danger alert—check it out!</span>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<!-- Modal for permission assignment to a role-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal2Label">Caution!</h5>
                <button type="button" class="btn-close permAssignCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to do that?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                <button type="button" id="assignOrNotBtn" class="btn btn-primary">Yes</button>
            </div>
            <div id="DelResult"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // New Permission Save Button
        $('#newPermissionSaveBtn').click(function(e) {
            e.preventDefault();

            var newPermissionName = $("#newPermissionName").val();
            console.log(newPermissionName);
            // AJAX CALL FOR INSERTING 
            $.ajax({
                url: '../functions.php',
                type: 'POST',
                data: {
                    newPermissionName: newPermissionName,
                    Function: "createPermission"
                },
                success: function(response) {
                    console.log(response);
                    if (response == "OK") {
                        $("#result").html(`<div class="alert alert-success fade show" role="alert"> Successfully saved! </div>`);
                    } else {
                        $("#result").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                    }
                    setTimeout(function() {
                        $("#result").html('');
                        window.location.reload();
                    }, 1000);

                }
            });
        });

        // New Role Button
        $('#newRoleSaveBtn').click(function(e) {
            e.preventDefault();

            var newRoleName = $("#newRoleName").val();
            console.log(newRoleName);

            // AJAX CALL FOR INSERTING 
            $.ajax({
                url: '../functions.php',
                type: 'POST',
                data: {
                    newRoleName: newRoleName,
                    Function: "createRole"
                },
                success: function(response) {
                    console.log(response);
                    if (response == "OK") {
                        $("#result2").html(`<div class="alert alert-success fade show" role="alert"> Successfully saved! </div>`);
                        // window.location.href = "home.php";
                    } else {
                        $("#result2").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                    }
                    setTimeout(function() {
                        $("#result").html('');
                        window.location.reload();
                    }, 1000);

                }
            });
        });

        // Delete Roles
        $('.roleDeleteBtn').click(function(e) {
            e.preventDefault();

            var roleId = $(this).attr('roleId');


            $('#deleteModalSaveBtn').unbind().click(function(e) {
                console.log(roleId);
                // AJAX CALL FOR INSERTING 
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        roleId: roleId,
                        Function: "deleteRole"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#result3").html(`<div class="alert alert-success fade show" role="alert"> Successfully Deleted! </div>`);
                            // window.location.href = "home.php";
                        } else {
                            $("#result3").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        }
                        setTimeout(function() {
                            $("#result").html('');
                            window.location.reload();
                        }, 1000);

                    }
                });
            });
        });

        // Delete Permissions
        $('.permissionDeleteBtn').click(function(e) {
            e.preventDefault();

            var permissionId = $(this).attr('permissionId');

            $('#deleteModalSaveBtn').unbind().click(function(e) {
                console.log(permissionId);
                // AJAX CALL FOR INSERTING 
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        permissionId: permissionId,
                        Function: "deletePermission"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#result3").html(`<div class="alert alert-success fade show" role="alert"> Successfully Deleted! </div>`);
                            // window.location.href = "home.php";
                        } else {
                            $("#result3").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        }
                        setTimeout(function() {
                            $("#result").html('');
                            window.location.reload();
                        }, 500);

                    }
                });
            });
        });

        // Delete Permissions
        $('.permissionDeleteBtn').click(function(e) {
            e.preventDefault();

            var permissionId = $(this).attr('permissionId');

            $('#deleteModalSaveBtn').unbind().click(function(e) {
                console.log(permissionId);
                // AJAX CALL FOR INSERTING 
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        permissionId: permissionId,
                        Function: "deletePermission"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#result3").html(`<div class="alert alert-success fade show" role="alert"> Successfully Deleted! </div>`);
                            // window.location.href = "home.php";
                        } else {
                            $("#result3").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        }
                        setTimeout(function() {
                            $("#result3").html('');
                            window.location.reload();
                        }, 500);

                    }
                });
            });
        });

        // Edit Permissions
        $('.editPermissionBtn').click(function(e) {
            e.preventDefault();

            var permissionId = $(this).attr('permissionId');
            var permissionName = $(this).parent().parent().children(':eq(0)').text();
            $('#editedRolesModalName').val(permissionName);

            $('#rolesModalSaveBtn').unbind().click(function(e) {
                permissionName = $('#editedRolesModalName').val();
                console.log(permissionName);
                // AJAX CALL FOR INSERTING 
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        permissionId: permissionId,
                        permissionName: permissionName,
                        Function: "editPermission"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#editResult").html(`<div class="alert alert-success fade show" role="alert"> Successfully Edited! </div>`);
                            // window.location.href = "home.php";
                        } else {
                            $("#editResult").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        }
                        setTimeout(function() {
                            $("#editResult").html('');
                            window.location.reload();
                        }, 500);

                    }
                });
            });
        });

        // edit Roles
        $('.roleEditBtn').click(function(e) {
            e.preventDefault();

            var roleId = $(this).attr('roleId');
            var roleName = $(this).parent().parent().children(':eq(0)').text();
            console.log(roleName);
            $('#editedRolesModalName').val(roleName);

            $('#rolesModalSaveBtn').unbind().click(function(e) {
                roleName = $('#editedRolesModalName').val();
                console.log(roleName);
                // AJAX CALL FOR INSERTING 
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        roleId: roleId,
                        roleName: roleName,
                        Function: "editRole"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#editResult").html(`<div class="alert alert-success fade show" role="alert"> Successfully Edited! </div>`);
                            // window.location.href = "home.php";
                        } else {
                            $("#editResult").html(`<div class="alert alert-danger fade show" role="alert"> ${response}</div>`);
                        }
                        setTimeout(function() {
                            $("#editResult").html('');
                            window.location.reload();
                        }, 500);

                    }
                });
            });
        });

        // Check box input for adding permission to roles
        $('.AssignPermissionBtn').click(function(e) {
            e.preventDefault();
            var roleId = $(this).attr('roleId');
            var permissionId = $(this).attr('permissionId');
            var functionName = $(this).is(':checked') ? 'assignPermission' : 'unAssignPermission' ;
            console.log('Role ID: ' + roleId + ' and Permission ID: ' + permissionId);
            console.log(functionName);
            $('#assignOrNotBtn').unbind().click(function(e) {
                $('.permAssignCloseBtn').click();
                // AJAX CALL FOR Assigning permission to role 
                $.ajax({
                    url: '../functions.php',
                    type: 'POST',
                    data: {
                        roleId: roleId,
                        permissionId: permissionId,
                        Function: functionName
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == "OK") {
                            $("#generalAlert").removeClass('hide');
                            $("#generalAlert").addClass('show');
                            $("#generalAlert").children(0).html(response);
                        } else {
                            $("#generalAlert2").addClass('show');
                            $("#generalAlert2").removeClass('hide');
                            $("#generalAlert2").html(response);
                        }
                        setTimeout(function() {
                            $("#generalAlert").removeClass('show');
                            $("#generalAlert").addClass('hide');
                            $("#generalAlert2").removeClass('show');
                            $("#generalAlert2").addClass('hide');
                            window.location.reload();
                        }, 500);

                    }
                });
            });


        });
    });
</script>


<?php
include('/xampp/htdocs/Intern1/Includes/Footer.php');
?>