<?php
include "authentication.php";
?>

<!-- header -->
<?php
include "includes/header.php";
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Assignments</h4>

    <div class="row mt-4">

        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>View Assignments
                        <a href="assignment-add.php" class="btn btn-primary float-end">Add Assignment</a>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>Assignment Id</th>
                                    <th>Unit Code</th>
                                    <th>Assignment Title</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $assignments = "SELECT * FROM assignments";
                                $assignments_run = mysqli_query($connection, $assignments);

                                if (mysqli_num_rows($assignments_run) > 0) {
                                    foreach ($assignments_run as $item) {
                                ?>
                                        <tr>
                                            <td><?= $item['assignment_id'] ?></td>
                                            <td><?= $item['unit_id'] ?></td>
                                            <td><?= $item['assignment_title'] ?></td>
                                            <td>
                                                <?= $item['status'] == '1' ? 'Hidden':'Visible' ?>
                                            </td>
                                            <td><a href="assignment-edit.php?assignment_id=<?= $item['assignment_id'] ?>" class="btn btn-info">Edit</td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                <button href="submit" name="unit_delete" value="<?= $item['assignment_id'] ?>" class="btn btn-danger">Delete</button>
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