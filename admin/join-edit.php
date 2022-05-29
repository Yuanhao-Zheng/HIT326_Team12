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
                    <h4>Edit Join
                        <a href="join-view.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['join_id'])) {
                        $join_id = $_GET['join_id'];
                        $join_edit = "SELECT * FROM joins WHERE join_id='$join_id' LIMIT 1";
                        $join_run = mysqli_query($connection, $join_edit);

                        if (mysqli_num_rows($join_run) > 0) {
                            foreach ($join_run as $join) {
                    ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="join_id" value="<?= $join['join_id'] ?>">
                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <label for="">Join Id</label>
                                            <input type="text" name="student_id" value="<?php
                                                                                        $query = mysqli_query($connection, "SELECT * From units,assignments, groups, joins 
                                                                                        WHERE units.unit_id = assignments.unit_id 
                                                                                        AND assignments.assignment_id = groups.assignment_id 
                                                                                        AND groups.group_id = joins.group_id 
                                                                                        AND joins.join_id ='{$join['join_id']}' ");
                                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                                            $join_id = $row['join_id'];
                                                                                            echo $join_id;
                                                                                        }
                                                                                        ?>" disabled class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Unit Code</label>
                                            <input type="text" name="student_id" value="<?php
                                                                                        $query = mysqli_query($connection, "SELECT * From units,assignments, groups, joins 
                                                                                        WHERE units.unit_id = assignments.unit_id 
                                                                                        AND assignments.assignment_id = groups.assignment_id 
                                                                                        AND groups.group_id = joins.group_id 
                                                                                        AND joins.join_id ='{$join['join_id']}' ");
                                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                                            $unit_code = $row['unit_code'];
                                                                                            echo $unit_code;
                                                                                        }
                                                                                        ?>" disabled class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Assignment Title</label>
                                            <input type="text" name="student_id" value="<?php
                                                                                        $query = mysqli_query($connection, "SELECT * From units,assignments, groups, joins 
                                                                                        WHERE units.unit_id = assignments.unit_id 
                                                                                        AND assignments.assignment_id = groups.assignment_id 
                                                                                        AND groups.group_id = joins.group_id 
                                                                                        AND joins.join_id ='{$join['join_id']}' ");
                                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                                            $assignment_title = $row['assignment_title'];
                                                                                            echo $assignment_title;
                                                                                        }
                                                                                        ?>" disabled class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Group Number</label>
                                            <input type="text" name="student_id" value="<?php
                                                                                        $query = mysqli_query($connection, "SELECT * From units,assignments, groups, joins 
                                                                                        WHERE units.unit_id = assignments.unit_id 
                                                                                        AND assignments.assignment_id = groups.assignment_id 
                                                                                        AND groups.group_id = joins.group_id 
                                                                                        AND joins.join_id ='{$join['join_id']}' ");
                                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                                            $group_number = $row['group_number'];
                                                                                            echo $group_number;
                                                                                        }
                                                                                        ?>" class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Student Id</label>
                                            <input type="text" name="student_id" value="<?php
                                                                                        $query = mysqli_query($connection, "SELECT student_id From students WHERE student_id='{$join['student_id']}' ");
                                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                                            $student_id = $row['student_id'];
                                                                                            echo $student_id;
                                                                                        }
                                                                                        ?>" class="form-control">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <button type="submit" name="join_update" class="btn btn-primary">Update Join</button>
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