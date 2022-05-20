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
                                <select name="student_id" required class="form-select">
                                    <option value="pick">--Select Student Id-</option>
                                    <?php
                                    $fetch_student_id = mysqli_query($connection, "SELECT student_id From students");
                                    $row = mysqli_num_rows($fetch_student_id);
                                    while ($row = mysqli_fetch_array($fetch_student_id)) {
                                        echo "<option value='" . $row['student_id'] . "'>" . $row['student_id'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Group Number</label>
                                <select name="group_id" required class="form-select">
                                    <option value="pick">--Select Group-</option>
                                    <?php
                                    $fetch_group_num = mysqli_query($connection, "SELECT group_id, group_number From groups");
                                    $row = mysqli_num_rows($fetch_group_num);
                                    while ($row = mysqli_fetch_array($fetch_group_num)) {
                                        echo "<option value='" . $row['group_id'] . "'>" . $row['group_number'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="criterion_1">Criterion 1:</label>
                                <input type="number" id="criterion_1" required name="criterion_1" min="1" max="99">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="criterion_2">Criterion 2:</label>
                                <input type="number" id="criterion_2" required name="criterion_2" min="1" max="99">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="criterion_3">Criterion 3:</label>
                                <input type="number" id="criterion_3" required name="criterion_3" min="1" max="99">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="criterion_4">Criterion 4:</label>
                                <input type="number" id="criterion_4" required name="criterion_4" min="1" max="99">
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