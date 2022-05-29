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
                    <h4>View Reviews
                        <a href="review-add.php" class="btn btn-primary float-end">Add Review</a>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="myDataTable" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>Unit Code</th>
                                    <th>Assignment Title</th>
                                    <th>Group No.</th>
                                    <th>Student Id</th>
                                    <th>Student Submit Id</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $reviews = "SELECT * FROM reviews";
                                $reviews_run = mysqli_query($connection, $reviews);

                                if (mysqli_num_rows($reviews_run) > 0) {
                                    foreach ($reviews_run as $item) {
                                ?>
                                        <tr>
                                            <td><?php
                                                $query = mysqli_query($connection, "SELECT * From units,assignments,groups, joins 
                                        WHERE units.unit_id = assignments.unit_id 
                                        AND assignments.assignment_id = groups.assignment_id
                                        AND groups.group_id = joins.group_id
                                        AND joins.join_id='{$item['join_id']}' ");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $unit_code = $row['unit_code'];
                                                    echo $unit_code;
                                                }
                                                ?></td>
                                            <td><?php
                                                $query = mysqli_query($connection, "SELECT * From units,assignments,groups, joins 
                                        WHERE units.unit_id = assignments.unit_id 
                                        AND assignments.assignment_id = groups.assignment_id
                                        AND groups.group_id = joins.group_id
                                        AND joins.join_id='{$item['join_id']}' ");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $assignment_title = $row['assignment_title'];
                                                    echo $assignment_title;
                                                }
                                                ?></td>
                                            <td><?php
                                                $query = mysqli_query($connection, "SELECT * From units,assignments,groups, joins 
                                        WHERE units.unit_id = assignments.unit_id 
                                        AND assignments.assignment_id = groups.assignment_id
                                        AND groups.group_id = joins.group_id
                                        AND joins.join_id='{$item['join_id']}' ");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $group_number = $row['group_number'];
                                                    echo $group_number;
                                                }
                                                ?></td>
                                            <td><?php
                                                $query = mysqli_query($connection, "SELECT * From students, joins 
                                        WHERE students.student_id = joins.student_id
                                        AND joins.join_id='{$item['join_id']}' LIMIT 1");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $student_id = $row['student_id'];
                                                    echo $student_id;
                                                }
                                                ?></td>
                                            <td><?= $item['submit_id'] ?></td>

                                            <td><a href="review-edit.php?review_id=<?= $item['review_id'] ?>" class="btn btn-info">Edit</td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button onClick="javascript: return confirm('Are you sure you want to delete');" href="submit" name="review_delete" value="<?= $item['review_id'] ?>" class="btn btn-danger">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
                                <?php
                                }


                                ?>
                            </tbody>
                        </table>
                    </div>

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