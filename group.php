<?php

include('includes/header.php');
?>

<?php
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php include('message.php'); ?>

                <?php
                // fetching group
                if (isset($_GET['title'])) {
                    $group_id = mysqli_real_escape_string($connection, $_GET['title']);

                    // $assignment = "SELECT assignment_id, assignment_title FROM assignments a inner JOIN units b on a.unit_id = b.unit_id WHERE unit_code = '$assignment_title' ";
                    $group = "SELECT * FROM groups WHERE group_id='$group_id' LIMIT 1 ";
                    $group_run = mysqli_query($connection, $group);

                    if (mysqli_num_rows($group_run) > 0) {
                        $group_item = mysqli_fetch_array($group_run);
                        $group_id = $group_item['group_id'];

                ?>
                        <div>
                            <h1>Group <?php echo $group_item['group_number']; ?></h1>
                        </div>

                        <?php
                        // fetching reviews
                        $review = "SELECT * FROM reviews WHERE group_id='$group_id' ";
                        $review_run = mysqli_query($connection, $review);

                        if (mysqli_num_rows($review_run) > 0) {
                            $review_row = mysqli_fetch_array($review_run);
                            $review_id = $review_row['review_id'];
                        ?>
                            <div class="table-responsive">
                                <table id="myDataTable" class="table table-bordered table-stripe">
                                    <thead>
                                        <tr>

                                            <th>Student</th>
                                            <th>Criterion 1</th>
                                            <th>Criterion 2</th>
                                            <th>Criterion 3</th>
                                            <th>Criterion 4</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($review_run as $review_item) {
                                        ?>
                                            <?php
                                            // $student_distinct = "SELECT distinct student_id from reviews";
                                            // $student_distinct_runs = mysqli_query($connection, $student_distinct);
                                            // foreach ($student_distinct_runs as $student_distinct_item) {
                                            ?>
                                            <tr>
                                                <td><?php echo $review_item['student_id'] ?></td>
                                                <td><?php echo $review_item['criterion_1'] ?></td>
                                                <td><?php echo $review_item['criterion_2'] ?></td>
                                                <td><?php echo $review_item['criterion_3'] ?></td>
                                                <td><?php echo $review_item['criterion_4'] ?></td>
                                            </tr>

                                        <?php
                                        }


                                        ?>
                                </table>
                            </div>
            </div>
        </div>
    <?php
                        } else {
    ?>
        <div class="card card-body shadow-sm mb-4">
            <h5>No Group Available</h5>
        </div>
    <?php
                        }
                    } else {
    ?>
    </tbody>


    </table>
    </div>


</div>


<div>
    <div class="card card-body shadow-sm mb-4">
        <h5>No Group Available</h5>
    </div>
</div>

<?php
                    }
                } else {
?>
<h4>No URL Found</h4>

<?php
                }

?>







<?php
include('includes/footer.php');
?>