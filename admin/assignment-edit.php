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
                    <h4>Edit Assignments
                        <a href="assignment-view.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['assignment_id'])) {
                        $assignment_id = $_GET['assignment_id'];
                        $assignment_edit = "SELECT * FROM assignments WHERE assignment_id='$assignment_id' LIMIT 1";
                        $assignment_run = mysqli_query($connection, $assignment_edit);

                        if (mysqli_num_rows($assignment_run) > 0) {
                            foreach ($assignment_run as $assignment) {
                    ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="assignment_id" value="<?= $assignment['assignment_id'] ?>">
                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <label for="">Unit Code</label>
                                            <input type="text" name="unit_id" value="<?php
                                                $query = mysqli_query($connection, "SELECT unit_code From units WHERE unit_id='{$assignment['unit_id']}' ");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $unit_code = $row['unit_code']; 
                                                    echo $unit_code;   }                                            
                                                ?>" disabled required class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Assignment Title</label>
                                            <input type="text" name="assignment_title" value="<?= $assignment['assignment_title'] ?>" required class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Navbar Status</label>
                                            <input type="checkbox" name="navbar_status" <?= $assignment['navbar_status'] == '1' ? 'checked' : '' ?> width="70px" height="70px">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" <?= $assignment['status'] == '1' ? 'checked' : '' ?> width="70px" height="70px">
                                            (*Checked = Visible | Unchecked = Hidden)
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="assignment_update" class="btn btn-primary">Update Assignment</button>
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