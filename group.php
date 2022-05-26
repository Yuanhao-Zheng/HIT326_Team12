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
                        <div class="card card-body shadow-sm mb-4">

                            <?php
                            $student_distinct = "SELECT distinct student_id from reviews";
                            $student_distinct_runs = mysqli_query($connection, $student_distinct);

                            if (mysqli_num_rows($student_distinct_runs) > 0) {
                                foreach ($student_distinct_runs as $student_distinct_item) {
                            ?>





                                    <?php
                                    // fetching reviews
                                    $review = "SELECT * FROM reviews
                                        WHERE student_id='{$student_distinct_item['student_id']}' AND group_id='$group_id' ";
                                    $review_run = mysqli_query($connection, $review);

                                    $criterion_total = "SELECT SUM(criterion_1)+SUM(criterion_2)+SUM(criterion_3)+SUM(criterion_4) as total 
                                                    FROM reviews WHERE student_id='{$student_distinct_item['student_id']}' AND group_id='$group_id' LIMIT 1 ";
                                    $criterion_total_run = mysqli_query($connection, $criterion_total);

                                    $top_criterion = "SELECT SUM(criterion_1)+SUM(criterion_2)+SUM(criterion_3)+SUM(criterion_4) as top_criterion 
                                    FROM reviews WHERE student_id='{$student_distinct_item['student_id']}' AND group_id='$group_id' LIMIT 1 ";
                                    $top_criterion_run = mysqli_query($connection, $top_criterion);


                                    if (mysqli_num_rows($criterion_total_run) > 0) {
                                        foreach ($criterion_total_run as $criterion_total_item) {
                                    ?>

                                            <div class="card-body">
                                                <h5 class="card-title">Student ID: <?php echo $student_distinct_item['student_id'] ?></h5>
                                                <p class="card-text">PAF Score: <?php echo $criterion_total_item['total'] / (4 * 100); ?></p>
                                            </div>


                                        <?php
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
                                                                <td><?php echo $review_item['submit_student_id'] ?></td>
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