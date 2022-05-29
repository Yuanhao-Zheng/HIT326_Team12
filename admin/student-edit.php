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
                    <h4>Edit Student
                        <a href="student-view.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['student_id'])) 
                    {
                        $student_id = $_GET['student_id'];
                        $student_edit = "SELECT * FROM students WHERE student_id='$student_id' LIMIT 1";
                        $student_run = mysqli_query($connection, $student_edit);

                        if (mysqli_num_rows($student_run) > 0) {
                            foreach ($student_run as $student) {
                    ?>
                            <form action="code.php" method="POST">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="">Student Id</label>
                                        <input type="text" name="student_id" value="<?= $student['student_id'] ?>" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="">Student First Name</label>
                                        <input type="text" name="student_firstname" value="<?= $student['student_firstname'] ?>" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="">Student Last Name</label>
                                        <input type="text" name="student_lastname" value="<?= $student['student_lastname'] ?>" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" <?= $student['status'] == '1' ? 'checked':'' ?> width="70px" height="70px">
                                        (*Checked = Visible | Unchecked = Hidden)
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="student_update" class="btn btn-primary">Update Student</button>
                                    </div>
                                </div>
                            </form>
                        <?php
                        }
                        } else {
                        ?>
                            <h4>No Record Found</h4>
                    <?php
                        }
                    }
                    ?>
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