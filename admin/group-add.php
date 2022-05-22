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
                    <h4>Add Group
                        <a href="group-view.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST">
                        <div class="row">
                        <div class="col-md-12 mb-3">
                                <label for="">Assignment Title</label>

                                <?php
                                $assignments = "SELECT * FROM assignments WHERE status = '1' ";
                                $assignment_run = mysqli_query($connection, $assignments);

                                if (mysqli_num_rows($assignment_run) > 0) {
                                ?>
                                    <select name="assignment_id" class="form-select">
                                        <option value="">--Select Assignments--</option>
                                        <?php
                                        foreach ($assignment_run as $row) {
                                        ?>
                                            <option value="<?= $row['assignment_id'] ?>"><?= $row['assignment_title'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <h5>No Assignment Available</h5>
                                <?php
                                }
                                ?> 
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Group Number</label>
                                <select name="group_number" required class="form-select">
                                    <option value="">--Select Group--</option>
                                    <option value="1">Group 1</option>
                                    <option value="2">Group 2</option>
                                    <option value="3">Group 3</option>
                                    <option value="4">Group 4</option>
                                    <option value="5">Group 5</option>
                                    <option value="6">Group 6</option>
                                    <option value="7">Group 7</option>
                                    <option value="8">Group 8</option>
                                    <option value="9">Group 9</option>
                                    <option value="10">Group 10</option>
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
                                <button type="submit" name="group_add" class="btn btn-primary">Save Group</button>
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