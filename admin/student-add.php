<?php
include "authentication.php";
?>

<!-- header -->
<?php
include "includes/header.php";
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Students</h4>

    <div class="row mt-4">

        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Add Student
                        <a href="student-view.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST">
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="">Student Id</label>
                                <input type="text" name="student_id" placeholder="eg. s123456" required class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Student First Name</label>
                                <input type="text" name="student_firstname" required class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Student Last Name</label>
                                <input type="text" name="student_lastname" required class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" width="70px" height="70px">
                                (*Checked = Visible | Unchecked = Hidden)
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="student_add" class="btn btn-primary">Save Student</button>
                            </div>
                        </div>
                    </form>




                </div>
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