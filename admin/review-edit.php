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
                    <h4>Edit Review
                        <a href="review-view.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['review_id'])) {
                        $review_id = $_GET['review_id'];
                        $review_edit = "SELECT * FROM reviews WHERE review_id='$review_id' LIMIT 1";
                        $review_run = mysqli_query($connection, $review_edit);

                        if (mysqli_num_rows($review_run) > 0) {
                            foreach ($review_run as $review) {
                    ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="review_id" value="<?= $review['review_id'] ?>">
                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <label for="">Student Id</label>
                                            <input type="text" name="student_id" value="<?php
                                                                                        $query = mysqli_query($connection, "SELECT student_id From students WHERE student_id='{$review['student_id']}' ");
                                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                                            $student_id = $row['student_id'];
                                                                                            echo $student_id;
                                                                                        }
                                                                                        ?>" disabled required class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Group Id</label>
                                            <input type="text" name="group_id" value="<?php
                                                                                        $query = mysqli_query($connection, "SELECT group_id From groups WHERE group_id='{$review['group_id']}' ");
                                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                                            $group_id = $row['group_id'];
                                                                                            echo $group_id;
                                                                                        }
                                                                                        ?>" disabled required class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Criterion 1:</label>
                                            <input type="number" name="criterion_1" value="<?= $review['criterion_1'] ?>" min="1" max="99" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Criterion 2:</label>
                                            <input type="number" name="criterion_2" value="<?= $review['criterion_2'] ?>" min="1" max="99" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Criterion 3:</label>
                                            <input type="number" name="criterion_3" value="<?= $review['criterion_3'] ?>" min="1" max="99" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="">Criterion 4:</label>
                                            <input type="number" name="criterion_4" value="<?= $review['criterion_4'] ?>" min="1" max="99" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <button type="submit" name="review_update" class="btn btn-primary">Update Review</button>
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