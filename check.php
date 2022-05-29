<?php 
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h4 class="mt-4" style="text-align: center">Peer Review Assessment Form</h4>
    <?php
    if (isset($_SESSION['error'])) 
    {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>WARNING:</strong> <?= $_SESSION['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['error']);
    }
    ?>
    <div class="row mt-4">

        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Put your information</h4>
                </div>
                <div class="card-body">

                    <form action="formhandle.php" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Unit Code</label>
                                <select name="unit_id" required class="form-select">
                                    <option value="">--Select Unit--</option>
                                    <?php
                                    $units_query = "SELECT * FROM units";
                                    $units = mysqli_query($connection, $units_query);

                                    if (mysqli_num_rows($units) > 0) {
                                        foreach ($units as $unit) {
                                    ?>
                                            <option value="<?= $unit['unit_id'] ?>"><?= $unit['unit_code'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Assignment Title</label>
                                <input type="text" name="assignment_title" required class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Group Number</label>
                                <input type="text" name="group_number" required class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Student Number</label>
                                <input type="text" name="student_number" required class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="next" class="btn btn-primary">Next Page</button>
                            </div>
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include('includes/footer.php');
?> 