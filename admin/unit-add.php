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
                    <h4>Add Unit
                        <a href="unit-view.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Unit Code</label>
                                <input type="text" name="unit_code" required class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Unit Name</label>
                                <input type="text" name="unit_name" required class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Unit Year</label>
                                <input type="text" name="unit_year" required class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Unit Semester</label>
                                <select name="unit_semester" required class="form-select">
                                    <option value="">--Select Semester--</option>
                                    <option value="1">Semester 1</option>
                                    <option value="0">Semester 2</option>
                                </select>
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
                                <button type="submit" name="unit_add" class="btn btn-primary">Save Unit</button>
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