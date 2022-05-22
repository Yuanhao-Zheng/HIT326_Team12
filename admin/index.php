<?php
include "authentication.php";
?>

<!-- header -->
<?php
include "includes/header.php";
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Units
                    <?php 
                        $dash_unit_query = "SELECT * from units";
                        $dash_unit_query_run = mysqli_query($connection, $dash_unit_query);

                        if($unit_total = mysqli_num_rows($dash_unit_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$unit_total.' </h4>';
                        }
                        else{
                            echo '<h4 class="mb-0">No Data</h4>';
                        }
                    
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="unit-view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Total Assignments
                <?php 
                        $dash_assignment_query = "SELECT * from assignments";
                        $dash_assignment_query_run = mysqli_query($connection, $dash_assignment_query);

                        if($assignment_total = mysqli_num_rows($dash_assignment_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$assignment_total.' </h4>';
                        }
                        else{
                            echo '<h4 class="mb-0">No Data</h4>';
                        }
                    
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="assignment-view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Total Groups
                <?php 
                        $dash_group_query = "SELECT * from groups";
                        $dash_group_query_run = mysqli_query($connection, $dash_group_query);

                        if($group_total = mysqli_num_rows($dash_group_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$group_total.' </h4>';
                        }
                        else{
                            echo '<h4 class="mb-0">No Data</h4>';
                        }
                    
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="group-view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Total Students
                <?php 
                        $dash_student_query = "SELECT * from students";
                        $dash_student_query_run = mysqli_query($connection, $dash_student_query);

                        if($student_total = mysqli_num_rows($dash_student_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$student_total.' </h4>';
                        }
                        else{
                            echo '<h4 class="mb-0">No Data</h4>';
                        }
                    
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="student-view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">Total Reviews
                <?php 
                        $dash_review_query = "SELECT * from reviews";
                        $dash_review_query_run = mysqli_query($connection, $dash_review_query);

                        if($review_total = mysqli_num_rows($dash_review_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$review_total.' </h4>';
                        }
                        else{
                            echo '<h4 class="mb-0">No Data</h4>';
                        }
                    
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="review-view.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">Total Users
                <?php 
                        $dash_user_query = "SELECT * from users";
                        $dash_user_query_run = mysqli_query($connection, $dash_user_query);

                        if($user_total = mysqli_num_rows($dash_user_query_run))
                        {
                            echo '<h4 class="mb-0"> '.$user_total.' </h4>';
                        }
                        else{
                            echo '<h4 class="mb-0">No Data</h4>';
                        }
                    
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-register.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        
    </div>





    <!-- footer -->

    <?php
    include "includes/footer.php";
    ?>

    <!-- scripts -->

    <?php
    include "includes/scripts.php";
    ?>