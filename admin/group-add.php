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
                                <select name="assignment_id" required class="form-control">
                                    <option value="pick">--Select Assignment-</option>
                                    <?php 
                                        $fetch_assign_title = mysqli_query($connection, "SELECT assignment_id, assignment_title From assignments");
                                        $row = mysqli_num_rows($fetch_assign_title);
                                        while ($row = mysqli_fetch_array($fetch_assign_title)){
                                        echo "<option value='". $row['assignment_id'] ."'>" .$row['assignment_title'] ."</option>" ;
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Group Number</label>
                                <select name="group_number" required class="form-control">
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