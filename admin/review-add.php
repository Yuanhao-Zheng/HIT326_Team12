<?php
include "authentication.php";
?>

<!-- header -->
<?php
include "includes/header.php";
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Reviews</h4>

    <div class="row mt-4">

        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Add Review
                        <a href="review-view.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST">
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="">Student Id</label>
                                <?php
                                $students = "SELECT * FROM students WHERE status = '1' ";
                                $student_run = mysqli_query($connection, $students);
                                if (mysqli_num_rows($student_run) > 0) {
                                ?>
                                    <select name="student_id" class="form-select">
                                        <option value="">--Select Student Id-</option>
                                        <?php
                                        foreach ($student_run as $row) {
                                        ?>
                                            <option value="<?= $row['student_id'] ?>"><?= $row['student_id'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <h5>No Student Available</h5>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Group Number</label>

                                <?php
                                $groups = "SELECT * FROM groups WHERE status = '1' ";
                                $group_run = mysqli_query($connection, $groups);

                                if (mysqli_num_rows($group_run) > 0) {
                                ?>
                                    <select name="group_id" class="form-select">
                                        <option value="">--Select Unit-</option>
                                        <?php
                                        foreach ($group_run as $row) {
                                        ?>
                                            <option value="<?= $row['group_number'] ?>"><?= $row['group_number'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <h5>No Group Available</h5>
                                <?php
                                }

                                ?>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="criterion_1">Criterion 1:</label>
                                <input type="number" id="criterion_1" required name="criterion_1" min="1" max="99" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="criterion_2">Criterion 2:</label>
                                <input type="number" id="criterion_2" required name="criterion_2" min="1" max="99" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="criterion_3">Criterion 3:</label>
                                <input type="number" id="criterion_3" required name="criterion_3" min="1" max="99" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="criterion_4">Criterion 4:</label>
                                <input type="number" id="criterion_4" required name="criterion_4" min="1" max="99" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="submit_student_id">Submit Student Id</label>
                                <input type="text" id="submit_student_id" required name="submit_student_id" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="review_add" class="btn btn-primary">Save Review</button>
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