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
                    <h4>Edit Unit
                        <a href="unit-view.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['unit_id'])) 
                    {
                        $unit_id = $_GET['unit_id'];
                        $unit_edit = "SELECT * FROM units WHERE unit_id='$unit_id' LIMIT 1";
                        $unit_run = mysqli_query($connection, $unit_edit);

                        if (mysqli_num_rows($unit_run) > 0) {
                            foreach ($unit_run as $unit) {
                    ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="unit_id" value="<?= $unit['unit_id'] ?>">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="">Unit Code</label>
                                        <input type="text" name="unit_code" value="<?= $unit['unit_code'] ?>" required class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="">Unit Name</label>
                                        <input type="text" name="unit_name" value="<?= $unit['unit_name'] ?>" required class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="">Unit Year</label>
                                        <input type="text" name="unit_year" value="<?= $unit['unit_year'] ?>" required class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="">Unit Semester</label>
                                        <select name="unit_semester" required class="form-control">
                                            <option value="">--Select Role--</option>
                                            <option value="1" <?= $unit['unit_semester'] == '1' ? 'selected':'' ?>>Semester 1</option>
                                            <option value="0" <?= $unit['unit_semester'] == '0' ? 'selected':'' ?>>Semester 2</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="">Navbar Status</label>
                                        <input type="checkbox" name="navbar_status" <?= $unit['navbar_status'] == '1' ? 'checked':'' ?> width="70px" height="70px">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" <?= $unit['status'] == '1' ? 'checked':'' ?> width="70px" height="70px">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="unit_update" class="btn btn-primary">Update Unit</button>
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