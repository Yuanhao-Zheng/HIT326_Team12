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
                    <h4>View Joins
                        <a href="join-add.php" class="btn btn-primary float-end">Add Join</a>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="myDataTable" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>Join Id</th>
                                    <th>Unit Code</th>
                                    <th>Assignment</th>
                                    <th>Group</th>
                                    <th>Student Id</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $joins = "SELECT * FROM joins";
                                $joins_run = mysqli_query($connection, $joins);

                                if (mysqli_num_rows($joins_run) > 0) {
                                    foreach ($joins_run as $item) {
                                ?>
                                        <tr>
                                            <td><?= $item['join_id'] ?></td>
                                            <td><?php
                                                $query = mysqli_query($connection, "SELECT unit_code From units,assignments, groups 
                                        WHERE units.unit_id = assignments.unit_id 
                                        AND assignments.assignment_id = groups.assignment_id 
                                        AND groups.group_id='{$item['group_id']}' ");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $unit_code = $row['unit_code'];
                                                    echo $unit_code;
                                                }
                                                ?></td>
                                            <td><?php
                                                $query = mysqli_query($connection, "SELECT assignment_title From units,assignments, groups 
                                        WHERE units.unit_id = assignments.unit_id 
                                        AND assignments.assignment_id = groups.assignment_id 
                                        AND groups.group_id='{$item['group_id']}' ");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $assignment_title = $row['assignment_title'];
                                                    echo $assignment_title;
                                                }
                                                ?></td>
                                            <td><?php
                                                $query = mysqli_query($connection, "SELECT group_number From groups WHERE group_id='{$item['group_id']}' ");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $group_number = $row['group_number'];
                                                    echo $group_number;
                                                }
                                                ?></td>
                                            <td><?= $item['student_id'] ?></td>





                                            <td><a href="join-edit.php?join_id=<?= $item['join_id'] ?>" class="btn btn-info">Edit</td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button onClick="javascript: return confirm('Are you sure you want to delete');" href="submit" name="join_delete" value="<?= $item['join_id'] ?>" class="btn btn-danger">Delete</button>
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