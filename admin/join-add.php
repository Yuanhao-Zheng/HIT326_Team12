<?php
include "authentication.php";
?>

<!-- header -->
<?php
include "includes/header.php";
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Joins</h4>

    <div class="row mt-4">

        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Add Join
                        <a href="join-view.php" class="btn btn-danger float-end">Back</a>
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
                                $groups = "SELECT * FROM units,groups,assignments 
                                WHERE groups.assignment_id = assignments.assignment_id 
                                AND units.unit_id = assignments.unit_id AND groups.status = '1' ";

                                $group_run = mysqli_query($connection, $groups);

                                if (mysqli_num_rows($group_run) > 0) {
                                ?>
                                    <select name="group_id" class="form-select">
                                        <option value="">--Select Unit-</option>
                                        <?php
                                        foreach ($group_run as $row) {
                                        ?>
                                            <option value="<?= $row['group_id'] ?>"> <?= $row['unit_code'] ?> --- <?= $row['assignment_title'] ?>--- Group <?= $row['group_number'] ?></option>
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

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="join_add" class="btn btn-primary">Save Join</button>
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