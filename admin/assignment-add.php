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
                    <h4>Add Assignment
                        <a href="assignment-view.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Unit Code</label>
                                <?php
                                $units = "SELECT * FROM units WHERE status = '1' ";
                                $unit_run = mysqli_query($connection, $units);

                                if (mysqli_num_rows($unit_run) > 0) {
                                ?>
                                    <select name="unit_id" class="form-select">
                                        <option value="">--Select Unit-</option>
                                        <?php
                                        foreach ($unit_run as $row) {
                                        ?>
                                            <option value="<?= $row['unit_id'] ?>"><?= $row['unit_code'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <h5>No Unit Available</h5>
                                <?php
                                }

                                ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Assignment Title</label>
                                <input type="text" name="assignment_title" required class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Navbar Status</label>
                                <input type="checkbox" name="navbar_status" width="70px" height="70px">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" width="70px" height="70px">
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="assignment_add" class="btn btn-primary">Save Assignment</button>
                            </div>
                        </div>
                    </form>




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