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
                                <label for="">Join Id</label>
                                <?php
                                $joins = "SELECT * FROM joins,students,groups, units, assignments 
                                WHERE students.student_id=joins.student_id 
                                AND groups.group_id=joins.group_id 
                                AND units.unit_id = assignments.unit_id 
                                AND groups.assignment_id = assignments.assignment_id ";
                                $join_run = mysqli_query($connection, $joins);
                                if (mysqli_num_rows($join_run) > 0) {
                                ?>
                                    <select name="join_id" class="form-select">
                                        <option value="">--Select Join Id-</option>
                                        <?php
                                        foreach ($join_run as $row) {
                                        ?>
                                            <option value="<?= $row['join_id'] ?>"><?= $row['unit_code'] ?> --- <?= $row['assignment_title'] ?> --- Group <?= $row['group_number'] ?> --- <?= $row['student_id'] ?></option>
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
                                <label for="submit_id">Student Submit Id</label>
                                <input type="text" id="submit_id" required name="submit_id" class="form-control">
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