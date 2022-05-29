<?php
include "authentication.php";
?>

<!-- header -->
<?php
include "includes/header.php";
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Groups</h4>

    <div class="row mt-4">

        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>View Groups
                        <a href="group-add.php" class="btn btn-primary float-end">Add Group</a>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="myDataTable" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>Group Id</th>
                                    <th>Unit Code</th>
                                    <th>Assignment Title</th>
                                    <th>Group Number</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $groups = "SELECT * FROM groups";
                                $groups_run = mysqli_query($connection, $groups);

                                if (mysqli_num_rows($groups_run) > 0) {
                                    foreach ($groups_run as $item) {
                                ?>
                                        <tr>
                                            <td><?= $item['group_id'] ?></td>
                                            <!-- <td><?= $item['assignment_id'] ?></td> -->
                                            <td><?php 
                                        $query = mysqli_query($connection, "SELECT * FROM units,assignments 
                                        WHERE units.unit_id = assignments.unit_id AND assignments.assignment_id='{$item['assignment_id']}' ");
                                        while ($row = mysqli_fetch_array($query)){
                                        $unit_code = $row['unit_code'] ;
                                        echo $unit_code;
                                        }
                                        ?></td> 
                                            <td><?php 
                                        $query = mysqli_query($connection, "SELECT assignment_title From assignments WHERE assignment_id='{$item['assignment_id']}' ");
                                        while ($row = mysqli_fetch_array($query)){
                                        $assignment_title = $row['assignment_title'] ;
                                        echo $assignment_title;
                                        }
                                        ?></td> 
                                            <td><?= $item['group_number'] ?></td>
                                            <td>
                                                <?= $item['status'] == '1' ? 'Visible':'Hidden' ?>
                                            </td>
                                            <td><a href="group-edit.php?group_id=<?= $item['group_id'] ?>" class="btn btn-info">Edit</td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                <button onClick="javascript: return confirm('Are you sure you want to delete');" href="submit" name="group_delete" value="<?= $item['group_id'] ?>" class="btn btn-danger">Delete</button>
                                            </form>
                                                
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="7">No Record Found</td>
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