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
            </div>

            <div class="col-md-9">

                <?php
                if (isset($_GET['title'])) {
                    $unit_id = mysqli_real_escape_string($connection, $_GET['title']);

                    // $assignment = "SELECT assignment_id, assignment_title FROM assignments a inner JOIN units b on a.unit_id = b.unit_id WHERE unit_code = '$assignment_title' ";
                    $unit = "SELECT * FROM units WHERE unit_id='$unit_id' LIMIT 1 ";
                    $unit_run = mysqli_query($connection, $unit);

                    if (mysqli_num_rows($unit_run) > 0) {
                        $unit_item = mysqli_fetch_array($unit_run);
                        $unit_id = $unit_item['unit_id'];

                ?>
                        <div>
                            <h5><?php echo $unit_item['unit_name']; ?></h5>
                        </div>
                        <?php

                        $assignment = "SELECT * FROM assignments WHERE unit_id='$unit_id' ";
                        $assignment_run = mysqli_query($connection, $assignment);

                        if (mysqli_num_rows($assignment_run) > 0) {
                            $assignment_row = mysqli_fetch_array($assignment_run);
                            $assignment_id = $assignment_row['assignment_id'];

                            foreach ($assignment_run as $assignment_item) {
                        ?>
                                <div>
                                    <div class="card card-body shadow-sm mb-4">
                                        <h5><?php echo $assignment_item['assignment_title']; ?></h5>
                                        <?php
                                        $group = "SELECT * FROM groups WHERE assignment_id='{$assignment_item['assignment_id']}' ";
                                        $group_run = mysqli_query($connection, $group);

                                        if (mysqli_num_rows($group_run) > 0) {
                                            // $group_row = mysqli_fetch_array($group_run);
                                            // $group_id = $group_row['group_id'];
                                            // echo $group_id;

                                            foreach ($group_run as $group_item) {
                                        ?>

                                                <div class="col-md-3">
                                                    <a href="group.php?title=<?= $group_item['group_id'] ?>" class="list-group-item list-group-item-action">
                                                        Group <?php echo $group_item['group_number']; ?></a>
                                                </div>

                                            <?php

                                            }
                                        } else {
                                            ?>

                                            <div>
                                                <div class="card card-body">
                                                    <h5>No Group Available</h5>
                                                </div>
                                            </div>

                                        <?php
                                        }

                                        ?>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>


                            <div>
                                <div class="card card-body shadow-sm mb-4">
                                    <h5>No Assignment Available</h5>
                                </div>
                            </div>

                        <?php
                        }
                    } else {
                        ?>
                        <h4>No Such Unit Found</h4>

                    <?php
                    }
                } else {
                    ?>
                    <h4>No URL Found</h4>
                <?php
                }




                ?>


            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Assignment List</h4>
                    </div>
                    <div class="card-body">
                        Assignment list
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
include('includes/footer.php');
?>