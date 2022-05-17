<?php
include "authentication.php";
?>

<!-- header -->
<?php
include "includes/header.php";
?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Units</h4>

    <div class="row mt-4">

        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>View Units
                        <a href="unit-add.php" class="btn btn-primary float-end">Add Unit</a>
                    </h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>Unit Id</th>
                                    <th>Unit Code</th>
                                    <th>Unit Name</th>
                                    <th>Unit Year</th>
                                    <th>Unit Semester</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $units = "SELECT * FROM units";
                                $units_run = mysqli_query($connection, $units);

                                if (mysqli_num_rows($units_run) > 0) {
                                    foreach ($units_run as $item) {
                                ?>
                                        <tr>
                                            <td><?= $item['unit_id'] ?></td>
                                            <td><?= $item['unit_code'] ?></td>
                                            <td><?= $item['unit_name'] ?></td>
                                            <td><?= $item['unit_year'] ?></td>
                                            <td>
                                                <?php
                                                if ($item['unit_semester'] == "1") {
                                                    echo 'Semester 1';
                                                } else {
                                                    echo 'Semester 2';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?= $item['status'] == '1' ? 'Hidden':'Visible' ?>
                                            </td>
                                            <td><a href="" class="btn btn-info">Edit</td>
                                            <td><a href="" class="btn btn-danger">Delete</td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="8">No Record Found</td>
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