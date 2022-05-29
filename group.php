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
                            <h1 style="text-align: center">Group <?php echo $group_item['group_number']; ?></h1>
                        </div>


                        <?php
                        $student_distinct = "SELECT student_id from joins WHERE group_id='$group_id' ";
                        $student_distinct_runs = mysqli_query($connection, $student_distinct);

                        if (mysqli_num_rows($student_distinct_runs) > 0) {
                            foreach ($student_distinct_runs as $student_distinct_item) {
                        ?>


                                <?php
                                // fetching reviews
                                $review = "SELECT * FROM reviews, joins
                                        WHERE joins.student_id='{$student_distinct_item['student_id']}' AND joins.group_id='$group_id' AND reviews.join_id=joins.join_id ";
                                $review_run = mysqli_query($connection, $review);

                                $criterion_total = "SELECT SUM(reviews.criterion_1)+SUM(reviews.criterion_2)+SUM(reviews.criterion_3)+SUM(reviews.criterion_4) as total 
                                                    FROM reviews, joins WHERE joins.student_id='{$student_distinct_item['student_id']}' AND joins.group_id='$group_id' AND reviews.join_id=joins.join_id LIMIT 1 ";
                                $criterion_total_run = mysqli_query($connection, $criterion_total);

                                $num_of_student = "SELECT joins.student_id,COUNT(DISTINCT(joins.student_id)) 
                                    as num_of_student FROM joins, reviews 
                                    WHERE reviews.join_id=joins.join_id AND joins.group_id='$group_id' LIMIT 1 ";
                                $num_of_student_run = mysqli_query($connection, $num_of_student);


                                if (mysqli_num_rows($review_run) > 0) {
                                    foreach ($criterion_total_run as $criterion_total_item) {
                                        while ($row = mysqli_fetch_assoc($num_of_student_run)) {
                                            $num_student = $row['num_of_student'];

                                ?>

                                            <div class="card-body">

                                                <h5 class="card-title">Student ID: <?php echo $student_distinct_item['student_id'] ?></h5>
                                                <p>PAF Score: <?php $finalscore = $criterion_total_item['total'] / (4 * 100);
                                                                echo $finalscore; ?>

                                                    <?php
                                                    if ($finalscore >= 1.5) {
                                                    ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo "Alarm! Team failure."; ?>
                                                </div>
                                            <?php
                                                    } elseif ($finalscore >= 1.15 && $finalscore < 1.5) {
                                            ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <?php echo "Super Leader/ Dominator?"; ?>
                                                </div>
                                            <?php
                                                    } elseif ($finalscore >= 1.05 && $finalscore < 1.15) {
                                            ?>
                                                <div class="alert alert-success" role="alert">
                                                    <?php echo "Leader"; ?>
                                                </div>
                                            <?php
                                                    } elseif ($finalscore >= 1.00 && $finalscore < 1.05) {
                                            ?>
                                                <div class="alert alert-success" role="alert">
                                                    <?php echo "Good Teamwork"; ?>
                                                </div>
                                            <?php
                                                    } elseif ($finalscore >= 0.95 && $finalscore < 1.00) {
                                            ?>
                                                <div class="alert alert-success" role="alert">
                                                    <?php echo "Acceptable Teamwork"; ?>
                                                </div>
                                            <?php
                                                    } elseif ($finalscore >= 0.85 && $finalscore < 0.95) {
                                            ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <?php echo "Social Loafer"; ?>
                                                </div>
                                            <?php
                                                    } elseif ($finalscore >= 0.75 && $finalscore < 0.85) {
                                            ?>
                                                <div class="alert alert-warning" role="alert">
                                                    <?php echo "Super Social Loafer"; ?>
                                                </div>
                                            <?php
                                                    } else {
                                            ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo "Alarm! Individual failure!"; ?>
                                                </div>
                                            <?php
                                                    }
                                            ?>


                                            </p>
                                            </div>


                                        <?php
                                        }
                                    }

                                    if (mysqli_num_rows($review_run) > 0) {
                                        ?>
                                        <div class="table-responsive">
                                            <table id="myDataTable" class="table table-bordered table-stripe">
                                                <thead>
                                                    <tr>
                                                        <th>Students ID</th>
                                                        <th>Criterion 1</th>
                                                        <th>Criterion 2</th>
                                                        <th>Criterion 3</th>
                                                        <th>Criterion 4</th>
                                                        <th>Student Responses</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    foreach ($review_run as $review_item) {
                                                    ?>

                                                        <tr>
                                                            <td><?php echo $review_item['student_id'] ?></td>
                                                            <td><?php echo $review_item['criterion_1'] ?></td>
                                                            <td><?php echo $review_item['criterion_2'] ?></td>
                                                            <td><?php echo $review_item['criterion_3'] ?></td>
                                                            <td><?php echo $review_item['criterion_4'] ?></td>
                                                            <td><?php echo $review_item['submit_id'] ?></td>
                                                        </tr>



                                                <?php

                                                    }
                                                }


                                                ?>
                                            </table>
                                        </div>




                                    <?php
                                } else {
                                    ?>
                                        <div>
                                            <div class="card card-body shadow-sm mb-4">
                                                <h5>No Review Available</h5>
                                            </div>
                                        </div>
                                <?php
                                }
                            }
                        } else {
                                ?>
                                <div>
                                    <div class="card card-body shadow-sm mb-4">
                                        <h5>No Review Available</h5>
                                    </div>
                                </div>
                            <?php
                        }
                    } else {
                            ?>
                            </tbody>
                            </table>
            </div>

            <div>
                <div class="card card-body shadow-sm mb-4">
                    <h5>No Such Group Available</h5>
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