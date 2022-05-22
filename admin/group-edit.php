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
                    <h4>Edit Groups
                        <a href="group-view.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['group_id'])) {
                        $group_id = $_GET['group_id'];
                        $group_edit = "SELECT * FROM groups WHERE group_id='$group_id' LIMIT 1";
                        $group_run = mysqli_query($connection, $group_edit);

                        if (mysqli_num_rows($group_run) > 0) {
                            foreach ($group_run as $group) {
                    ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="group_id" value="<?= $group['group_id'] ?>">
                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <label for="">Assignment Title</label>
                                            <input type="text" name="assignment_id" value="<?php
                                                $query = mysqli_query($connection, "SELECT assignment_title From assignments WHERE assignment_id='{$group['assignment_id']}' ");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $assignment_title = $row['assignment_title']; 
                                                    echo $assignment_title;   }                                            
                                                ?>" disabled required class="form-control">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Group Number</label>
                                            <select name="group_number" class="form-select">
                                                <option value="<?= $group['group_number'] ?>"><?= $group['group_number'] ?></option>
                                                
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
                                            <input type="checkbox" name="navbar_status" <?= $group['navbar_status'] == '1' ? 'checked' : '' ?> width="70px" height="70px">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" <?= $group['status'] == '1' ? 'checked' : '' ?> width="70px" height="70px">
                                            (*Checked = Visible | Unchecked = Hidden)
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="group_update" class="btn btn-primary">Update Group</button>
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